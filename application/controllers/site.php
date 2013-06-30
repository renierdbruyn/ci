<?php

class site extends CI_Controller {

     private $logged_in;

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('logged_in')) {
            $this->logged_in = true;
        } else {
            $this->logged_in = false;
            redirect('login/index');
        }
    }

    function members_area() {
        $data['content'] = 'site/home';
        $this->load->view('layout/master_layout', $data);
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != TRUE) {
            echo 'You need to login in to see this page. <a href="../login">Login</a>';
            die();
        }
    }

    function index() {
        $data = array();
        $data['content'] = 'site/home';
        //  $this->load->view('layout/master_layout', $data);
        if ($query = $this->site_model->get_records()) {
            $data['records'] = $query;
        }
        $this->load->view('layout/master_layout', $data);
    }

    function add() {
        $data['content'] = 'site/add';
        $this->load->view('layout/master_layout', $data);
        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'number' => $this->input->post('number')
            );

            $this->site_model->add_record($data);
            // $this->index();
        }
    }

    function edit($id = 0) {
//        $query = $this->site_model->get();
//        $data['fid']['value'] = $query['id'];

        $data['content'] = 'site/edit';
        $this->load->view('layout/master_layout', $data);

        if (isset($_POST['submit'])) {
            $data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'number' => $this->input->post('number')
            );
            $this->site_model->edit_record($data);
        }
    }

    function delete() {
        $this->site_model->delete_record();
        $this->index();
    }

}

