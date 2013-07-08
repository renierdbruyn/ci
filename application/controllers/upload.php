<?php

class Upload extends CI_Controller {

     private $logged_in;

    function __construct() {
        parent::__construct();
        $this->load->model('profile_model');

        if ($this->session->userdata('logged_in')) {
            $this->logged_in = true;
        } else {
            $this->logged_in = false;
            redirect('login/index');
        }
    }

    function index() {
        $data['error'] = ' ';
        $data['content'] = 'upload/upload_form';
        $this->load->view('layout/master_layout', $data);
    }

    function do_upload() {      
        $config['upload_path'] = 'http://itstudents.dut.ac.za/201308/uploads';
        //$config['upload_path'] = 'C:/wamp/www/ci/uploads/';
        $config['allowed_types'] = 'gif|jpg|pdf|docx|dotx';
        $config['max_size'] = '200';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();

            $data['content'] = 'upload/upload_form';
            $this->load->view('layout/master_layout', $data);
        } else {
            $data = array(//'upload_data' => $this->upload->data(),
                'content' => 'upload/upload_success'
            );

            $this->load->view('layout/master_layout', $data);
        }
    }

}
?>

