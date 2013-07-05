<?php

class contact extends CI_Controller {
public function index()
{
    
	
        $this->load->library('form_validation');
	$this->form_validation->set_rules('name', 'Naam', 'trim|required');
	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	$this->form_validation->set_rules('content', 'Bericht', 'trim|required|xss_clean');

	if($this->form_validation->run() == FALSE) {
		
            $data['content']='contact/contact';
            $this->load->view('layout/master_layout', $data);
	} else {
			$this->load->library('email');
			$this->email->from($this->session->userdata('email'), $this->session->userdata('firstname'));
			$this->email->to('recipient@email.com');
			$this->email->subject('Contact form');
			$this->email->message($this->input->post('content'));
			$this->email->send();
                        
	}
}

function submission() {

$data['content']='contact/submission';
$this->load->view('layout/master_layout', $data);

}

}
?>


