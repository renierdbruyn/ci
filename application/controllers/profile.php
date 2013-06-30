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
        $this->form_validation->set_rules('fullAddress', 'Full Address');
        $this->form_validation->set_rules('city', 'City');
        $this->form_validation->set_rules('license', ' License');
        $this->form_validation->set_rules('self_description', 'self_description');
        $this->form_validation->set_rules('gender', 'gender');

        $this->form_validation->set_rules('relocate', 'relocate');
        $this->form_validation->set_rules('minimum_salary', 'minimum_salary');
        $this->form_validation->set_rules('prefered_salary', 'prefered_salary');
        $this->form_validation->set_rules('contract_type', 'contract_type');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $query = $this->profile_model->personal();

            if ($query) {
                echo 'addad details successfully';
                $this->index();
            }
        }
    }

}

