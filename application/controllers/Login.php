<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('Bio_model');
        
    }

    public function index() 
    {

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('username', 'Username', 'trim|callback_username_check');
        $this->form_validation->set_rules('password', 'Password', 'trim|callback_password_check');
   
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => MD5($password)
        );
        $access = $this->db->get_where('admin', $where)->row();
        
        if ($access > 0) {
                
            $set_message = array(
                'nama' => $access->nama,
                'status' => 'login'
            );
            $this->session->set_userdata($set_message);
            
            redirect('crud');
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('components/v_login');
            }
        }


        if($this->session->userdata('status') == "login") {
            redirect(base_url('crud'));
        }
    }
  
    public function username_check($str)
    {

        $access = $this->db->get_where('admin', $this->session->userdata('nama'))->row();
        if($str == "") {

            $this->form_validation->set_message('username_check', '{field} tidak boleh kosong');
            return FALSE;
        }
        else if ($str != $access->username)
        {
            $this->form_validation->set_message('username_check', '{field} salah, mohon periksa kembali');
            return FALSE;
        }
        else
        {
            $this->form_validation->set_message('username_check', '{field} valid');
            return TRUE;
        }
    }

    public function password_check($str)
    {

        $access = $this->db->get_where('admin', $this->session->userdata('nama'))->row();
        
        if($str == "") {

            $this->form_validation->set_message('password_check', '{field} tidak boleh kosong');
            return FALSE;
        }
        else if ($str != $access->password)
        {
            $this->form_validation->set_message('password_check', '{field} salah, mohon periksa kembali');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    public function del() {
        $this->Bio_model->drop_data('admin', $_GET['id']);
        // $this->Bio_model->modify();
        redirect('login');
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}