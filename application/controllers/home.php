<?php

class home extends CI_Controller {

    private $logged_in;

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('logged_in')) {
            $this->logged_in = true;
        } else {
            $this->logged_in = false;
        }
    }
    
    public function index(){
        $data['content'] = 'home/home';
        $data['logged_in'] = $this->logged_in;
        $this->load->view('layout/master_layout',$data );
    }

}