<?php

class create extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Bio_model');

    }

    public function index()
    {
        $nama = $this->input->post('nama', true);
        $jenis_kelamin = $this->input->post('jenis_kelamin', true);
        $tanggal_lahir = $this->input->post('tanggal_lahir', true);
        $umur = $this->input->post('umur', true);
        $data = array(
            'nama' => $nama == NULL ? NULL : $nama,
            'jenis_kelamin' => $jenis_kelamin == NULL ? NULL : $jenis_kelamin,
            'tanggal_lahir' => $tanggal_lahir == NULL ? NULL : $tanggal_lahir,
            'umur' => $umur == NULL ? NULL : $umur
        );

        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[18]|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'required|trim');
        $this->form_validation->set_rules('umur', 'Umur', 'required|max_length[3]|trim');
        
        $this->form_validation->set_message('required', '{field} Tidak boleh kosong');
        $this->form_validation->set_message('max_length', '{field} harus kurang dari {param} karakter');

        if ($this->form_validation->run() == FALSE) {
            $set = array(
                'popups' => 'components/v_input',
                'get_ref' => 'reg',
                'datafl' => '',
                'user' => array(
                    'success' => ''
                ));
            $this->load->view('welcome_message', $set);
        } else {
            $text = '<div id="success">Data berhasil di registrasi <i class="fa fa-check"></i></div>';
            $set = array(
                'popups' => 'components/v_input',
                'get_ref' => 'reg',
                'datafl' => '',
                'user' => array(
                    'success' => $text
                )
            );
            $this->load->view('welcome_message', $set);
            $this->Bio_model->input_data('bio', $data);
        }
    }

}