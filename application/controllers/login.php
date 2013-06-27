<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('membership_model');
    }

    function index() {
        $data['style'] = 'login/login_style';
        $data['content'] = 'login/login_form';
        $this->load->view('layout/master_layout', $data);
    }

    function validate_credentials() {
        //  $this->load->model('membership_model');
        $query = $this->membership_model->validate();

        if ($query) {//if users credentials validated...
            $data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => true
            );

            $this->session->set_userdata($data);
            redirect('site/index');
        } else {
            $this->index();
        }
    }

    function signup() {
        $data['content'] = 'login/signup_form';
        $this->load->view('layout/master_layout', $data);
    }

    function create_member() {
        //validation
        //field name, error message, validation rules
        $this->form_validation->set_rules('id_number', 'Id Number', 'trim|required|min_length[13]|max_length[13]|is_unique[membership.id_number]');
        $this->form_validation->set_rules('first_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('last_name', ' Last name', 'trim|required');
        $this->form_validation->set_rules('email_address', 'please input a valid Email Address', 'trim|required|is_unique[membership.email]|valid_email');
        $this->form_validation->set_rules('cell-phone_number', 'cell-phone_number', 'trim|required|min_length[10]|max_length[10]');

        $this->form_validation->set_rules('username', 'username', 'trim|required|callback_username_check|min_length[4]|is_unique[membership.username]');
        $this->form_validation->set_rules('password1', 'Password', 'trim|trim|required|min_length[5]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $this->signup();
        } else {
            //  $this->load->model('membership_model');
            if ($query = $this->membership_model->create_member()) {
                $data['content'] = 'login/signup_succesful';
                $data['firstname'] = $query;
                $this->load->view('layout/master_layout', $data);
            } else {
                echo 'Sorry, there is a problem with the website. contact renierdbruyn@hotmil.com and let us know.';
            }
        }
    }

    function validate_email($email_addres, $email_code) {
        $email_code = trim($email_code);
        $validated = $this->membership_model->validate_email($email_addres, $email_code);

        if ($validated === true) {
            $data['content'] = 'login/email_validation';
            $data['firstname'] = $query;
            $this->load->view('layout/master_layout', $data);
        } else {
            //this should never happen
            echo "ERROR giving email activated page. Please contact " . $this->config->item('admin_email');
        }
    }

}
