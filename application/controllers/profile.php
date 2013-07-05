<?php

class profile extends CI_Controller {

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

//    function members_area() {
//        $data['content'] = 'profile/personal';
//        $this->load->view('layout/master_layout', $data);
//    }
//
//    function is_logged_in() {
//        $is_logged_in = $this->session->userdata('is_logged_in');
//        if (!isset($is_logged_in) || $is_logged_in != TRUE) {
//            echo 'You need to login in to see this page. <a href="../login">Login</a>';
//            die();
//        }
//    }

    function index() {
        $data['content'] = 'profile/personal';
        $this->load->view('layout/master_layout', $data);
    }

    function add_personal() {
        $this->form_validation->set_rules('fullAddress', 'Full Address', 'trim');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('licence', ' License', 'trim|required');
        $this->form_validation->set_rules('self_description', 'self_description', 'trim|required');
        $this->form_validation->set_rules('gender', 'gender', 'trim|required');

        $this->form_validation->set_rules('relocate', 'relocate', 'trim|required');
        $this->form_validation->set_rules('minimum_salary', 'minimum_salary', 'trim|required');
        $this->form_validation->set_rules('prefered_salary', 'prefered_salary', 'trim|required');
        $this->form_validation->set_rules('contract_type', 'contract type', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            if ($query = $this->profile_model->personal()) {
                $data['content'] = 'profile/personal';
                $data['info'] = 'Details captured successfully';
                $this->load->view('layout/master_layout', $data);
            } else {
                $data['content'] = 'profile/personal';
                $data['info'] = 'An error occured please try again';
                $this->load->view('layout/master_layout', $data);
            }
        }
    }

}

