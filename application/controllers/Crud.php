<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crud extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bio_model');
        if($this->session->userdata('status') != "login") {
            redirect('login');
        }
    }

    public function index() 
    {       
        $data = array(
            'popups' => '',
            'get_ref' => '',
        'datafl' => $this->load->view('components/dataset', ['graph' => $this->Bio_model->chart()]));
        $this->load->view('welcome_message', $data);
    }

    /*
    HANDLER SYSTEM EDIT
    */

    public function ubah() 
    {
     
        $data = array(
            'user' => $this->Bio_model->gets_data('bio', str_replace('=', '', $this->encrypt->decode($_GET['id']))),
            'popups' => 'components/v_edit',
            'datafl' => '',
            'get_ref' => 'ch');
        $user = $data['user'];

        $this->load->view('welcome_message', $data);
    }
    public function ubah_data_Bio()
    {
        $nama = $this->input->post('nama', true);
        $tanggal_lahir = $this->input->post('tanggal_lahir', true);
        $umur = $this->input->post('umur', true);
        $id = $this->input->post('id', true);
        $data = array(
            'nama' => $nama,
            'tanggal_lahir' => $tanggal_lahir,
            'umur' => $umur
        );
        $this->Bio_model->update_data('bio', $id, $data);
        redirect('crud');
    }
    /*
    HANDLER SYSTEM HAPUS
    */
    public function hapus()
    {
        $this->Bio_model->drop_data('bio', $_GET['id']);
        redirect('crud');
    }

    public function uploaders()
    {
        $data = array(
            'popups' => 'components/v_uploads',
            'get_ref' => 'up',
            'datafl' => '',
            'user' => array('error' => ''),
        );
        $this->load->view('welcome_message', $data);
    }
    public function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('userfile')) {
            $err = array('error' => '<strong class="subtitle">[ERROR] :</strong>'.$this->upload->display_errors());
            $data = array(
                'popups' => 'components/v_uploads',
                'get_ref' => 'up',
                'datafl' => '',
                'user' => $err,
            );
            $this->load->view('welcome_message', $data);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('components/upload_success', $data);
        }
    }

    public function logout_session() {
        $log = array(
            'heads' => 'KELUAR',
            'desc' => 'Apakah yakin ingin keluar ?', // TODO dialog form
        );
        $data = array(
            'popups' => 'components/dialog',
            'get_ref' => 'out',
            'datafl' => '',
            'user' => $log
        );
        $this->load->view('welcome_message', $data);
    }
    
   
}