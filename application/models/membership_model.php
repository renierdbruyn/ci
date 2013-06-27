<?php

class membership_model extends CI_Model {
<<<<<<< HEAD
  
    function validate(){
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));
       $query = $this->db->get('membership');
        
       if($query->num_rows ==1){
           return true;
       }
    }
    
    function create_member(){
        $new_member_insert_data = array(
            'id_number' => $this->input->post('id_number'),
            'firstname' => $this->input->post('first_name'),
            'lastname' => $this->input->post('last_name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email_address'),
            'phone' => $this->input->post('cell-phone_number'),
            'password' => md5($this->input->post('password1'))
        );
        $insert = $this->db->insert('membership', $new_member_insert_data);
        return $insert;
    }
=======

    function validate() {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password',sha1($this->config->item('salt').$this->input->post('password1')));
        $query = $this->db->get('membership');

        if ($query->num_rows == 1) {
            return true;
            
        }
    }

    function create_member() {
//        $new_member_insert_data = array(
//            'id_number' => $this->input->post('id_number'),
//            'firstname' => $this->input->post('first_name'),
//            'lastname' => $this->input->post('last_name'),
//            'username' => $this->input->post('username'),
//            'email' => $this->input->post('email_address'),
//            'phone' => $this->input->post('cell-phone_number'),
//            'password' => sha1($this->config->item('salt') . $this->input->post('password1') . $this->config->item('salt'))
//        );
//             $insert = $this->db->insert('membership', $new_member_insert_data);
            $id_number = $this->input->post('id_number');
            $firstname = $this->input->post('first_name');
            $lastname = $this->input->post('last_name');
            $username = $this->input->post('username');
            $email = $this->input->post('email_address');
            $phone = $this->input->post('cell-phone_number');
            $password = sha1($this->config->item('salt').$this->input->post('password1'));
    
            $sql = "INSERT INTO membership (id_number, firstname, lastname, username, email, phone, password)
                            VALUES(" . $id_number . ",
                                   " . $this->db->escape($firstname) . ",
                                   " . $this->db->escape($lastname) . ",
                                   " . $this->db->escape($username) . ",
                                   '" . $email . "',
                                   '" . $phone . "',
                                   '" . $password . "')";
            $query = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            $this->set_session($firstname, $lastname,$username ,$email, $phone );
//            print_r($this->session->all_userdata());
            return $firstname;
        } else {
            $this->load->library('email');
            $this->email->from('techno206@gmail.com', 'Admin of site');
            $this->email->to('renierdbruyn@hotmail.com');
            $this->email->subject('Problem inserting user into db');

            if (isset($email)) {
                $this->email->message("Unable to Register and isert user with the the email of $email to the database");
            } else {
                $this->email->message("unable to register and insert user into the database");
            }
            $this->email->send();
            return FALSE;
        }
    }
    
    function set_session($firstname, $lastname,$username ,$email, $phone){
        $sql = "SELECT id_number FROM membership WHERE email = '". $email ."' LIMIT 1 ";
        $query = $this->db->query($sql);
        $row = $query->row();
        $session_data = array(
                'id_number' => $row->id_number,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'username' => $username,
                'email' => $email,
                'phone' => $phone,
                'is_logged_in' => 0
                );
        
        $this->session->set_userdata($session_data);
    }

>>>>>>> master
}

?>
