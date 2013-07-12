<?php

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('form');

        $this->load->model('search_model');
    }
        

    public function index(){
        $this->load->view('search_form');
    }

    public function execute_search() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('search', 'job', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('search_form');
        } else {

            $search_term = $this->input->post('search');


            $data['results'] = $this->search_model->get_results($search_term);
            


            $this->load->view('search_results', $data);
        }
    }

    }

?>