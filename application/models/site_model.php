<?php

class site_model extends CI_Model {

    function get_records() {
        $query = $this->db->get('applicant');
        return $query->result();
    }

    function add_record($data) {
        $this->db->insert('applicant', $data);
        return;
    }

//    function get() {
//        $this->load->database();
//        $query = $this->db->get('applicant');
//        $this->db->where('id', $this->uri->segment(3));
//        return $query->row_array();
//    }

    function edit_record($data) {

        //  $where = "id = '".mysql_real_escape_string($this->uri->segment(3))."'"; 
        //  $this->db->update_string('applicant', $data, $where);
        $this->db->where('id', $this->uri->segment(3));
        $this->db->update('applicant', $data);
    }

    function delete_record() {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('applicant');
    }

}