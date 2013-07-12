<?php

class profile_model extends CI_Model {

    function personal() {
        $address = $this->input->post('fullAddress');
        $city = $this->input->post('city');
        $licence = $this->input->post('licence');
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
            id_number,
            gender, 
            relocate, 
            minimum_salary, 
            prefered_salary, 
            contract_type)
                VALUES('{$address}',
                       '{$city}',
                       '{$licence}',
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

    function edit_personal() {

        $data = array(
            'address' => $this->input->post('fullAddress'),
            'city' => $this->input->post('city'),
            'licence' => $this->input->post('licence'),
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
        $grade = $this->input->post('grade');
        $matric = $this->input->post('matric');
        $id_number = $this->session->userdata('id_number');

        $sql = "INSERT INTO school(id_number,
                                    school_name,
                                    matric_type,
                                    highest_level)
            VALUES(
                    '{$id_number}',
                    '{$school_name}',
                    '{$matric}',
                    '{$grade}')";

        $query = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {

            return true;
        } else {
            return FALSE;
        }
    }

    function edit_school() {
        $data = array(
            'id_number' => $this->input->post('id_number'),
            'school_name' => $this->input->post('school_name'),
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

    function edit_skill() {
        $data = array(
            'skill_name' => $this->input->post('skill_name'),
            'skill_level' => $this->input->post('skill_level'),
            'experience' => $this->input->post('experience'),
            'id_number' => $this->input->post('id_number'),
        );
        $this->db->where('id_number', $this->session->userdata('id_number'));
        $this->db->update('skills', $data);
    }

    function school_subject() {
//$subject = $this->input->post('my_list');
////         First create an array of individually escaped values with quotes added
//        $deds = array();
//        foreach ($subject as $subj) {
//            $deds[] = "'" . mysql_real_escape_string($subj) . "'";
//        }
//
//// Now join them together in an SQL syntax
//        $subj_joined = join('), (', $deds);
//
//// Now they can safely be used in the query
//        $sql = "INSERT INTO school_subject (school_subject_name) VALUES ('{$subj_joined}')";
//        $query = $this->db->query($sql);
////        $sql = array();
////        $id_number = $this->session->userdata('id_number');
////        $subjects = $this->input->post('my_list');
////        foreach ($subjects as $row) {
////            $sql[] = "('{$row['subject']}', '{$row['mark']}')";
////}
////mysql_query("INSERT INTO table school_subject VALUES '{$id_number}' ".implode(',', $sql));
$id_number = $this->session->userdata('id_number');
        foreach ($_POST['subject_list'] as $row) {
            
            $subject = $row->subject;
            $mark = $row->mark;
            
        }
        $sql = "INSERT INTO school_subject( id_number,
                                    school_subject_name,
                                    school_subject_mark
                                    )
            VALUES(
                    '{$id_number}',
                    '{$subject}',
                    '{$mark}',
                    
                    )";

        $query = $this->db->query($sql);
        
    }

    function edit_school_subject() {
        foreach ($_POST['subject_list'] as $row) {
            
            $subject = $row->subject;
            $mark = $row->mark;
            
        }
        $data = array(
            'id_number' => $this->input->post('id_number'),
            'school_subject_name' => $subject,
            'school_subject_mark' => $mark,
        );
        $this->db->where('id_number', $this->session->userdata('id_number'));
        $this->db->update('school_subject', $data);
    }

}

