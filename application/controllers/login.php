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
    function login_success(){
        $data['content'] = 'login/login_success';
        $this->load->view('layout/master_layout', $data);
    }

    
    function reset_password()
    {
       $data['content'] = 'login/resetpassword_form';
       $this->load->view('layout/master_layout', $data); 
    }
    
    
    function validate_credentials() {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_lenth[5]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_lenth[5]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            //initial checks on data are okay now check if credentials is valid
            $query = $this->membership_model->login_user();

            switch ($query) {
                case 'logged_in' :
                    //authentication complete, sent to loggedin homepage
//                    if (isset($_SERVER['HTTP_REFERER'])) {
//                        $redirect_to = str_replace(base_url(), '', $_SERVER['HTTP_REFERER']);
//                    } else {
//                        $redirect_to = $this->uri->uri_string();
//                    }
                    redirect('login/login_success');
//                    redirect('login/index?redirect=' . $redirect_to);
                    break;
                case 'incorrect_password' :
                    $this->index();
                    break;
//        case 'not_activated' :
//            $this->index();
//            break;
                case 'username_not_found' :
                    $this->index();
                    break;
            }
        }
        //  $this->load->model('membership_model');
//        $query = $this->membership_model->validate();
//
//        if ($query) {//if users credentials validated...
//            $data = array(
//                'username' => $this->input->post('username'),
//                'is_logged_in' => true
//                
//            );
//
//            $this->session->set_userdata($data);
//            redirect('site/index');
//        } else {
//            $this->index();
//        }
    }

    function signup() {
        $data['content'] = 'login/signup_form';
        $this->load->view('layout/master_layout', $data);
    }

    function create_member() {
        //validation
        //field name, error message, validation rules
        $this->form_validation->set_rules('id_number', 'Id Number', 'trim|required|exact_length[13]|is_unique[membership.id_number]');
        $this->form_validation->set_rules('first_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('last_name', ' Last name', 'trim|required');
        $this->form_validation->set_rules('email_address', 'please input a valid Email Address', 'trim|required|is_unique[membership.email]|valid_email');
        $this->form_validation->set_rules('cell-phone_number', 'cell-phone_number', 'trim|required|exact_length[10]');

        $this->form_validation->set_rules('username', 'username', 'trim|required|callback_username_check|min_length[5]|is_unique[membership.username]');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $this->signup();
        } else {
            //  $this->load->model('membership_model');
            if ($query = $this->membership_model->create_member()) {
                $data['content'] = 'login/signup_succesful';
                $data['firstname'] = $query;
                $this->load->view('layout/master_layout', $data);
            } else {
                echo 'Sorry, there is a problem with the website. contact renierdbruyn@hotmail.com and let us know.';
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

    function logout() {
        $this->session->sess_destroy();
        redirect('welcome/index');
    }

}
