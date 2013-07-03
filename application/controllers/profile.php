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
        $data['personal'] = $query = $this->db->get_where('personal', array('id_number' => $this->session->userdata('id_number')))->result();
        $data['content'] = 'profile/personal';
        $this->load->view('layout/master_layout', $data);
    }

    function school() {
        $data['content'] = 'profile/school';
        $this->load->view('layout/master_layout', $data);
    }

    function add_school() {
        $this->form_validation->set_rules('school_name', 'School name', 'trim|required');
        $this->form_validation->set_rules('reference_name', 'Reference Name', 'trim');
        $this->form_validation->set_rules('reference_phone', 'Reference phone', 'trim|is_numeric');
        $this->form_validation->set_rules('grade', 'Grade', 'required|callback_select_validate');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = 'profile/school';
            $this->load->view('layout/master_layout', $data);
        } else {
            if ($this->profile_model->school()) {
                $data['content'] = 'profile/school';
                $data['info'] = '<script> alert(details saved!) </script>';
                $this->load->view('layout/master_layout', $data);
            } else {
                $data['content'] = 'profile/school';
                //   $data['info'] = 'An error occured please try again';
                $this->load->view('layout/master_layout', $data);
            }
        }
    }

    function skill() {
        $data['skill'] = $query = $this->db->get_where('skills', array('id_number' => $this->session->userdata('id_number')))->result();
        $data['content'] = 'profile/skills';
        $this->load->view('layout/master_layout', $data);
    }

    function add_skill() {
        $id = $this->input->post('id_number');
        $sql = "SELECT id_number FROM skills WHERE id_number ='{$id}' LIMIT 1 ";
        $result=  $this->db->query($sql);
        $this->form_validation->set_rules('skill_name', 'skill name', 'required|callback_select_validate');
        $this->form_validation->set_rules('skill_level', 'skilllevel', 'required|callback_select_validate');
        $this->form_validation->set_rules('experience', 'experience', 'required|callback_select_validate');

        if ($this->form_validation->run() == FALSE) {
            $data['skill'] = $query = $this->db->get_where('skills', array('id_number' => $this->session->userdata('id_number')))->result();
            $data['content'] = 'profile/skills';
            //$data['info'] = 'Hello';
            $this->load->view('layout/master_layout', $data);
        } else {
            if ($result->num_rows === 1) {

                $this->profile_model->edit_skill();
                $data['skill'] = $query = $this->db->get_where('skills', array('id_number' => $this->session->userdata('id_number')))->result();
                $data['content'] = 'profile/skills';
                $this->load->view('layout/master_layout', $data);
            } else {

                $this->profile_model->skill();
                $data['skill'] = $query = $this->db->get_where('skills', array('id_number' => $this->session->userdata('id_number')))->result();
                $data['content'] = 'profile/skills';
                $this->load->view('layout/master_layout', $data);
            }
        }
    }

    function select_validate($selectValue) {
        // 'null' is the first option and the text says something like "-Choose one-"
        if ($selectValue == 'null') {
            $this->form_validation->set_message('select_validate', 'Please pick one.');
            return false;
        } else { // user picked something
            return true;
        }
    }

    function add_personal() {
        $id = $this->input->post('id_number');
        $sql = "SELECT id_number FROM personal WHERE id_number ='{$id}' LIMIT 1 ";
        $result=  $this->db->query($sql);
        
        $this->form_validation->set_rules('fullAddress', 'Full Address', 'trim|required');
        $this->form_validation->set_rules('street', 'Street', 'trim|required');
        $this->form_validation->set_rules('suburb', 'Suburb', 'trim|required');
        $this->form_validation->set_rules('code', 'Postal Code', 'trim|required|is_numeric|exact_length[4]');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('licence', ' License', 'required|callback_select_validate');
        $this->form_validation->set_rules('self_description', 'self_description', 'trim|required');
        $this->form_validation->set_rules('gender', 'gender', 'required|callback_select_validate');
        $this->form_validation->set_rules('relocate', 'relocate', 'required|callback_select_validate');
        $this->form_validation->set_rules('minimum_salary', 'minimum_salary', 'trim|required');
        $this->form_validation->set_rules('prefered_salary', 'prefered_salary', 'trim|required');
        $this->form_validation->set_rules('contract_type', 'contract type', 'required|callback_select_validate');

        if ($this->form_validation->run() == FALSE) {
            $data['personal'] = $query = $this->db->get_where('personal', array('id_number' => $this->session->userdata('id_number')))->result();
            $data['content'] = 'profile/personal';
            //$data['info'] = 'Hello';
            $this->load->view('layout/master_layout', $data);
        } else {
            if ($result->num_rows === 1) {

                $this->profile_model->edit_personal();
                $data['personal'] = $query = $this->db->get_where('personal', array('id_number' => $this->session->userdata('id_number')))->result();
                $data['content'] = 'profile/personal';
                $this->load->view('layout/master_layout', $data);
            } else {

                $this->profile_model->personal();
                $data['personal'] = $query = $this->db->get_where('personal', array('id_number' => $this->session->userdata('id_number')))->result();
                $data['content'] = 'profile/personal';
                $this->load->view('layout/master_layout', $data);
            }

//            if () {
//                $data['content'] = 'profile/personal';
//                $data['info'] = 'Details captured successfully';
//                $this->load->view('layout/master_layout', $data);
//            } else {
//                $data['content'] = 'profile/personal';
//                //   $data['info'] = 'An error occured please try again';
//                $this->load->view('layout/master_layout', $data);
//            }
        }
    }

}

