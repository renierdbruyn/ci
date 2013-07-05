<?php

class profile_model extends CI_Model {

    function personal() {
        $address = $this->input->post('fullAddress');
        $city = $this->input->post('city');
        $licence = $this->input->post('licence');
        $self_description = $this->input->post('self_description');
        $id_number = $this->input->post('id_number');
        $gender = $this->input->post('gender');
        $relocate = $this->input->post('relocate');
        $minimum_salary = $this->input->post('minimum_salary');
        $prefered_salary = $this->input->post('prefered_salary');
        $contract_type = $this->input->post('contract_type');

        $sql = "INSERT INTO personal(
            address,
            city, 
            licence, 
            self_description,
            id_number,
            gender, 
            relocate, 
            minimum_salary, 
            prefered_salary, 
            contract_type)
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

            return true;
        } else {
            return FALSE;
        }
    }

    function edit_personal(){

        $data = array(
            'address' => $this->input->post('fullAddress'),
            'city' => $this->input->post('city'),
            'licence' => $this->input->post('licence'),
            'self_description' => $this->input->post('self_description'),
            'id_number' => $this->input->post('id_number'),
            'gender' => $this->input->post('gender'),
            'relocate' => $this->input->post('relocate'),
            'minimum_salary' => $this->input->post('minimum_salary'),
            'prefered_salary' => $this->input->post('prefered_salary'),
            'contract_type' => $this->input->post('contract_type'),
    
        );
        $this->db->where('id_number', $this->session->userdata('id_number'));
        $this->db->update('personal', $data);
    }

    function school() {
        $school_name = $this->input->post('school_name');
        $reference_name = $this->input->post('reference_name');
        $reference_phone = $this->input->post('reference_phone');
        $grade = $this->input->post('grade');
        $matric = $this->input->post('matric');
        $id_number = $this->session->userdata('id_number');

        $sql = "INSERT INTO school(id_number,
                                    school_name,
                                    ref_name,
                                    ref_number,
                                    matric_type,
                                    highest_level)
            VALUES(
                    '{$id_number}',
                    '{$school_name}',
                    '{$reference_name}',
                    '{$reference_phone}',
                    '{$matric}',
                    '{$grade}')";

        $query = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {

            return true;
        } else {
            return FALSE;
        }
    }
    
    function edit_school(){
         $data = array(
            'id_number' => $this->input->post('id_number'),
            'school_name' => $this->input->post('school_name'),
            'ref_name' => $this->input->post('reference_name'),
            'ref_number' => $this->input->post('reference_phone'), 
             'ref_number' => $this->input->post('reference_phone'),
             'matric_type' => $this->input->post('matric'),
             'highest_level' => $this->input->post('grade'),
        );
        $this->db->where('id_number', $this->session->userdata('id_number'));
        $this->db->update('school', $data);
    }

    function skill() {
        $skillname = $this->input->post('skillname');
        $skill_level = $this->input->post('skill_level');
        $experience = $this->input->post('experience');
        $id_number = $this->session->userdata('id_number');

        $sql = "INSERT INTO skills( skill_name,
                                    skill_level,
                                    experience,
                                    id_number
                                    )
            VALUES(
                    '{$skillname}',
                    '{$skill_level}',
                    '{$experience}',
                    '{$id_number}'
                    )";

        $query = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {

            return true;
        } else {
            return FALSE;
        }
    }
    
    function edit_skill()
    {
        $data = array(
            'skill_name' => $this->input->post('skill_name'),
            'skill_level' => $this->input->post('skill_level'),
            'experience' => $this->input->post('experience'),
            'id_number' => $this->input->post('id_number'),    
        );
        $this->db->where('id_number', $this->session->userdata('id_number'));
        $this->db->update('skills', $data);
    }

}
