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

        $tmpl = array(
            'table_open' => '<table border="0" cellpadding="4" cellspacing="0">',
            'heading_row_start' => '<tr>',
            'heading_row_end' => '</tr>',
            'heading_cell_start' => '<th>',
            'heading_cell_end' => '</th>',
            'row_start' => '<tr>',
            'row_end' => '</tr>',
            'cell_start' => '<td>',
            'cell_end' => '</td>',
            'row_alt_start' => '<tr>',
            'row_alt_end' => '</tr>',
            'cell_alt_start' => '<td>',
            'cell_alt_end' => '</td>',
            'table_close' => '</table>'
        );

        $this->table->set_template($tmpl);
    }

    function index() {
        $data['personal'] = $query = $this->db->get_where('personal', array('id_number' => $this->session->userdata('id_number')))->result();
        $data['content'] = 'profile/personal';
        $this->load->view('layout/master_layout', $data);
    }

    function school() {
        $data['school'] = $query = $this->db->get_where('school', array('id_number' => $this->session->userdata('id_number')))->result();
        $data['content'] = 'profile/school';
        $this->load->view('layout/master_layout', $data);
    }

    function add_school() {
        $id = $this->input->post('id_number');
        $sql = "SELECT id_number FROM school WHERE id_number ='{$id}' LIMIT 1 ";
        $result = $this->db->query($sql);
        $this->form_validation->set_rules('school_name', 'School name', 'trim|required');
        $this->form_validation->set_rules('grade', 'Grade', 'required|callback_select_validate');

        if ($this->form_validation->run() == FALSE) {
            $data['school'] = $query = $this->db->get_where('school', array('id_number' => $this->session->userdata('id_number')))->result();
            $data['content'] = 'profile/school';
            //$data['info'] = 'Hello';
            $this->load->view('layout/master_layout', $data);
        } else {
            if ($result->num_rows === 1) {

                $this->profile_model->edit_school();
                $data['school'] = $query = $this->db->get_where('school', array('id_number' => $this->session->userdata('id_number')))->result();
                $data['info'] = "<script> alert('School Details updated'); </script>";

                $data['content'] = 'profile/school';
                $this->load->view('layout/master_layout', $data);
            } else {

                $this->profile_model->school();
                $data['school'] = $query = $this->db->get_where('school', array('id_number' => $this->session->userdata('id_number')))->result();
                $data['info'] = "<script> alert('School Details saved'); </script>";
                $data['content'] = 'profile/school';
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
        $result = $this->db->query($sql);
        $this->form_validation->set_rules('skill_name', 'skill name', 'required|callback_select_validate');
        $this->form_validation->set_rules('skill_level', 'skilllevel', 'required|callback_select_validate');
        $this->form_validation->set_rules('experience', 'experience', 'required|callback_select_validate');
        if ($this->form_validation->run() == FALSE) {
            $data['skill'] = $query = $this->db->get_where('skills', array('id_number' => $this->session->userdata('id_number')))->result();
            $data['content'] = 'profile/skills';
            //$data['info'] = 'Hello';
            $this->load->view('layout/master_layout', $data);
        } else {
//<<<<<<< HEAD
            if ($result->num_rows === 1) {

                $this->profile_model->edit_skill();
                $data['skill'] = $query = $this->db->get_where('skills', array('id_number' => $this->session->userdata('id_number')))->result();
                $data['info'] = "<script> alert('Skills Details updated'); </script>";
                $data['content'] = 'profile/skills';
                $this->load->view('layout/master_layout', $data);
            } else {

                $this->profile_model->skill();
                $data['skill'] = $query = $this->db->get_where('skills', array('id_number' => $this->session->userdata('id_number')))->result();
                $data['info'] = "<script> alert('Skills Details saved'); </script>";
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
        $result = $this->db->query($sql);

        $this->form_validation->set_rules('fullAddress', 'Full Address', 'trim|required');
        $this->form_validation->set_rules('street', 'Street', 'trim|required');
        $this->form_validation->set_rules('suburb', 'Suburb', 'trim|required');
        $this->form_validation->set_rules('code', 'Postal Code', 'trim|required|is_numeric|exact_length[4]');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('licence', ' License', 'required|callback_select_validate');
        $this->form_validation->set_rules('gender', 'gender', 'required|callback_select_validate');
        $this->form_validation->set_rules('relocate', 'relocate', 'required|callback_select_validate');
        $this->form_validation->set_rules('minimum_salary', 'minimum_salary', 'trim|required');
        $this->form_validation->set_rules('prefered_salary', 'prefered_salary', 'trim|required');
        $this->form_validation->set_rules('contract_type', 'contract type', 'required|callback_select_validate');

        if ($this->form_validation->run() == FALSE) {
            $data['personal'] = $query = $this->db->get_where('personal', array('id_number' => $this->session->userdata('id_number')))->result();
            $data['content'] = 'profile/personal';
            //$data['info'] = '';
            $this->load->view('layout/master_layout', $data);
        } else {
            if ($result->num_rows === 1) {

                $this->profile_model->edit_personal();
                $data = array(
                    'personal' => $query = $this->db->get_where('personal', array('id_number' => $this->session->userdata('id_number')))->result(),
                    'info' => "<script> alert('Personal Details updataed'); </script>",
                    'content' => 'profile/personal',
                );
                $this->load->view('layout/master_layout', $data);
            } else {

                $this->profile_model->personal();
                $data = array(
                    'personal' => $query = $this->db->get_where('personal', array('id_number' => $this->session->userdata('id_number')))->result(),
                    'info' => "<script> alert('Personal Details saved'); </script>",
                    'content' => 'profile/personal',
                );

                $this->load->view('layout/master_layout', $data);
            }
        }
    }

    function school_subject() {
        // $config['enable_query_strings'] = TRUE;

        $data = array(
            'matric_type' => $query = $this->db->get_where('school', array('id_number' => $this->session->userdata('id_number')))->result(),
            'school_subject' => $query = $this->db->get_where('school_subject', array('id_number' => $this->session->userdata('id_number')))->result(),
            'info' => "<script> alert('school subject updated'); </script>",
            'content' => 'profile/schoolSubjects',
        );
        $this->load->view('layout/master_layout', $data);
    }

    function add_school_subject() {
        if (isset($this->input->post('add'))) {
            echo"<tr class=\"prototype\">
                                        <td><input type='hidden' name='id' value='0' class='id' /></td>
                                        <td><select id='list' name='subject'></select></td>
                                        <td><input type='text' name='mark'  /></td>
                                        <td><button class='remove btn btn-danger' name='remove' type='button'>Remove</button>
                                    </tr>";
        } elseif (isset($this->input->post('add'))) {
            
        }
        // $config['enable_query_strings'] = TRUE;
        $id = $this->input->post('id_number');
        $sql = "SELECT id_number FROM school_subject WHERE id_number ='{$id}' LIMIT 1 ";
        // $sql1 = "SELECT matric_type FROM school WHERE id_number ='{$id}' LIMIT 1 ";
        $result = $this->db->query($sql);
        // $result1 = $this->db->query($sql1);
//        $this->form_validation->set_rules('subject_list[][subject]', 'Subject', 'required|callback_select_validate');
//        $this->form_validation->set_rules('subject_list[][mark]', 'Subject', 'required|is_numeric|less_than[100]|is_natural_no_zero');
//
//
//
//        if ($this->form_validation->run() == FALSE) {
//            $data['matric_type'] = $query = $this->db->get_where('school', array('id_number' => $this->session->userdata('id_number')))->result();
//            $data['school_subject'] = $query = $this->db->get_where('school_subject', array('id_number' => $this->session->userdata('id_number')))->result();
//            $data['content'] = 'profile/schoolSubjects';
//            //$data['info'] = '';
//            $this->load->view('layout/master_layout', $data);
//        } else {
        if ($result->num_rows === 1) {

            $this->profile_model->edit_school_subject();
            $data = array(
                'matric_type' => $query = $this->db->get_where('school', array('id_number' => $this->session->userdata('id_number')))->result(),
                'school_subject' => $query = $this->db->get_where('school_subject', array('id_number' => $this->session->userdata('id_number')))->result(),
                'info' => "<script> alert('school subject updated'); </script>",
                'content' => 'profile/schoolSubjects',
            );
            $this->load->view('layout/master_layout', $data);
        } else {

            $this->profile_model->school_subject();
            $data = array(
                'matric_type' => $query = $this->db->get_where('school', array('id_number' => $this->session->userdata('id_number')))->result(),
                'school_subject' => $query = $this->db->get_where('school_subject', array('id_number' => $this->session->userdata('id_number')))->result(),
                'info' => "<script> alert('school subject saved'); </script>",
                'content' => 'profile/schoolSubjects',
            );

            $this->load->view('layout/master_layout', $data);
        }
//        }
    }

}