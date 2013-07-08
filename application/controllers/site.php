<?php

//<<<<<<< HEAD    
    
//=======
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
    
    function index(){
        $data= array();  
    }
    function members_area() {
//>>>>>>> master
        $data['content'] = 'site/home';
       //  $this->load->view('layout/master_layout', $data);
        if($query = $this->site_model->get_records()){
            $data['records'] = $query;
        }
         $this->load->view('layout/master_layout', $data);
       
       
        
    }
    
    function add(){
//        $data1['content'] = 'site/add';
//        $this->load->view('layout/master_layout', $data1);
        $data = array(
            'name' => $this->input->post('name'),
            'number' => $this->input->post('number')
        );
        
        $this->site_model->add_record($data);
        $this->index();
    }
    function edit(){
        $data = array(
            'name' => $this->input->post('name'),
            'number' => $this->input->post('number')
        );
        
        $this->site_model->edit_record($data);
    }
        function delete(){
            $this->site_model->delete_record();
            $this->index();
        }
    }
  

 
