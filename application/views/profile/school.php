<?php
foreach ($school as $row) {
    $school_name = $row->school_name;
    $ref_name = $row->ref_name;
    $ref_number = $row->ref_number;
    $highest_level = $row->highest_level;
    $matric_type = $row->matric_type; 
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css" />
        <script src="<?php echo base_url();?>assets/js/jquery-1.10.1.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/school.js"></script>
        <style>
            span
            {
                font-size: 20px;
                height: 60px;
                font-weight: normal;
                padding-bottom: 10px;
                margin-bottom: 10px;
            }
            .input-prepend .add-on{
                width: 300px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="hero-unit">
                    <center><h1>School Information</h1></center>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
              <div class="span2">
                <!--Sidebar content-->
                
              </div>
              <div class="span10">
                <!--Body content-->
                <?php
                   // $this->load->helper('form');
                    echo form_open('profile/add_school');
                ?>
                 <div class="clearfix" style="color:red;">

                <?php echo form_error('school_name'); ?>

            </div>
                <div class="input-prepend">
                    <span class="add-on">School name</span>
                    <?php
//                        $schoolnameProp=array(
//                            'class'=>'span7',
//                            'name'=>'school_name',
//                            'placeholder'=>'Qhakaza High School'
//                        );
//                        echo form_input($schoolnameProp, set_value('School_name'));
                    ?>
                    <input type="text" name="school_name" placeholder="Qhakaza High School" class="span7" style="width: 240px;" value="<?php echo isset($school_name) ? $school_name : set_value('school_name'); ?>" >
                </div>
                <br>
                <div class="input-prepend">
                    <span class="add-on">Reference name</span>
                    <?php
//                        $referenceNameProp=array(
//                            'class'=>'span7',
//                            'name'=>'reference_name',
//                            'placeholder'=>'Patric Johnson'
//                        );
//                        
//                        echo form_input($referenceNameProp, set_value('reference_name'));
                    ?>
                    <input type="text" name="reference_name" placeholder="Patric" class="span7" style="width: 240px;" value="<?php echo isset($ref_name) ? $ref_name : set_value('reference_name'); ?>" >
                </div>
                <br>
                <div class="clearfix" style="color:red;">

                <?php echo form_error('reference_phone'); ?>

            </div>
                <div class="input-prepend">
                    <span class="add-on">Reference phone</span>
                    <?php
//                        $referencePhoneProp=array(
//                            'class'=>'span7',
//                            'name'=>'reference_phone',
//                            'placeholder'=>'0743109227'
//                        );
//                        
//                        echo form_input($referencePhoneProp, set_value('reference_phone'));
                    ?>
                    <input type="text" name="reference_phone" placeholder="0743109227" class="span7" style="width: 240px;" value="<?php echo isset($ref_number) ? $ref_number : set_value('reference_phone'); ?>" >
                </div>
                <br>
                <div class="clearfix" style="color:red;">

                <?php echo form_error('grade'); ?>

            </div>
                <div class="input-prepend">
                    <span class="add-on">Highest level obtained</span>
                    <select name="grade" id="grade" class="span7" style="width: 240px;" onchange="decide()">
                        <?php
                    if (isset($highest_level) && !empty($highest_level)) {
                        echo "<option value='$highest_level'" . set_select('grade', $highest_level) . " > " . $highest_level . "</option>";
                    }
                    else
                        "<option value='null'" . set_select('grade', 'null') . ">- Select One -</option>";
                    ?>
                    	<option value="null" <?php echo set_select('grade', 'null');?> >Select a grade</option>
                    	<option value="Grade 10" <?php echo set_select('grade', 'Grade 10');?>>Grade 10</option>
                    	<option value="Grade 11" <?php echo set_select('grade', 'Grade 11');?>>Grade 11</option>
                    	<option value="Grade 12" <?php echo set_select('grade', 'Grade 12');?>>Grade 12</option>
                    </select>
                </div>
                <br>
                <div id="matricType" class="input-prepend">
                    <span class="add-on">Matric type</span>
                    <?php
//                        $matric= array(
//                            'null'=>'Select a matric type',
//                            'NC'=>'NC',
//                            'NSC'=>'NSC',
//                            'IEB'=>'IEB'
//                        );
//                        
//                        $matricProp=" 'class'='span7',                            
//                            'id'='matric'";
//                        
//                        echo form_dropdown('matric', $matric,$this->input->post('matric'), $matricProp)."<br>";
                    ?>
                    <select name="matric" id="matric" class="span7" style="width: 240px;" onchange="decide()">
                        <?php
                    if (isset($matric_type) && !empty($matric_type )) {
                        echo "<option value='$matric_type'" . set_select('grade', $matric_type ) . " > " . $matric_type . "</option>";
                    }
                    else
                        "<option value='null'" . set_select('grade', 'null') . ">- Select One -</option>";
                    ?>
                    	<option value="null" <?php echo set_select('matric', 'null');?>>Select a matric type</option>
                    	<option value="NC" <?php echo set_select('matric', 'NC' );?>>NC</option>
                    	<option value="NSC" <?php echo set_select('matric', 'NSC' );?>>NSC</option>
                    	<option value="IEB" <?php echo set_select('matric', 'IEB');?>>IEB</option>
                    </select>
                </div>
                <br>
                <?php echo form_hidden("id_number",$this->session->userdata('id_number')); ?>
                <?php echo isset($info) ? $info : NULL; ?>
                <div>
                    <input class="btn btn-success" id="schoolButton" type="submit" value="Save Data">
                </div>
                <?php
                    echo form_close();
                ?>
                <?php //echo validation_errors('<p class ="error">'); ?>
              </div>
            </div>
        </div>
    </body>
</html>