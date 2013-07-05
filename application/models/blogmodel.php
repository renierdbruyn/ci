<?php
class Blogmodel extends CI_Model {
	
	function __construct()
        {
            parent:: __construct();
	}
        
        public function insert_entry()
        {
            $this->timestamp=time();
            $this->title=$this->input->post('job_title');
            $this->body=$this->input->post('job_description');
            $this->username=$this->session->userdata('username');
            $this->date=date("Y-m-d");
            $this->db->insert('job_advert',$this);
        }
        
        public function get_last_ten_entries()
        {
            $this->db->order_by('start_date','DESC');
            $query=$this->db->get('job_advert',10);
            return $query->result();
        }
	
	
}
