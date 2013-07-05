<?php

class profile_model extends CI_Model {

    function personal() {
        $address = $this->input->post('fullAddress');
        $city = $this->input->post('city');
        $licence = $this->input->post('license');
        $self_description = $this->input->post('self_description');
        $id_number = $this->session->userata('id_number');
        $gender = $this->input->post('gender');
        $relocate = $this->input->post('relocate');
        $minimum_salary = $this->input->post('minimum_salary');
        $prefered_salary = $this->input->post('prefered_salary');
        $contract_type = $this->input->post('contract_type');

        $sql = "INSERT INTO personal(address, city, licence, self_description, id_number, gender, relocate, mimimum_salary, prefered_salary, contract type)
                VALUES('{$address}',
                       '{$city}',
                       '{$licence}',
                       '{$self_description}',
                       '{$id_number}',
                       '{$gender}',
                       '{$relocate}',
                       '{$minimum_salary}',
                       '{$prefered_salary}',
                       '{$contract_type}')";
                    
        $query = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {

            return 'success';
        } else {
            return 'failed';
        }
    }

}
