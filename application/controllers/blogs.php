<?php
class Blogs extends CI_Controller {
	
    public function __construct()
    {
        parent:: __construct();
        $this->load->model("Blogmodel");
        $this->load->model("profile_model");
    }
    
    public function index()
    {
        $username=$this->session->userdata('username');
        $id=$this->session->userdata('advert_id');
        $data['username']=$username;
        if ($this->session->userdata('logged_in'))
        {
            $this->logged_in=TRUE;
        }
        else
        {
            $this->logged_in=false;
            redirect('login/index');
        }
        
        
        $this->load->model('Blogmodel');
        
        if ($this->input->post('act')=='create_post')
        {
            $this->Blogmodel->insert_entry();
        }
        
        $data['blogs']=$this->Blogmodel->get_last_ten_entries();
       
        
        $data['content'] = 'blogs';
        $this->load->view('layout/master_layout',$data);
        
    }
}
	

