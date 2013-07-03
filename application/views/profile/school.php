<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css" />
        <script src="<?php echo base_url();?>assets/js/jquery-1.10.1.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/school.js"></script>
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
                        $schoolnameProp=array(
                            'class'=>'span7',
                            'name'=>'school_name',
                            'placeholder'=>'Qhakaza High School'
                        );
                        echo form_input($schoolnameProp, set_value('School_name'));
                    ?>
                </div>
                <br>
                <div class="input-prepend">
                    <span class="add-on">Reference name</span>
                    <?php
                        $referenceNameProp=array(
                            'class'=>'span7',
                            'name'=>'reference_name',
                            'placeholder'=>'Patric Johnson'
                        );
                        
                        echo form_input($referenceNameProp, set_value('reference_name'));
                    ?>
                </div>
                <br>
                <div class="clearfix" style="color:red;">

                <?php echo form_error('reference_phone'); ?>

            </div>
                <div class="input-prepend">
                    <span class="add-on">Reference phone</span>
                    <?php
                        $referencePhoneProp=array(
                            'class'=>'span7',
                            'name'=>'reference_phone',
                            'placeholder'=>'0743109227'
                        );
                        
                        echo form_input($referencePhoneProp, set_value('reference_phone'));
                    ?>
                </div>
                <br>
                <div class="clearfix" style="color:red;">

                <?php echo form_error('grade'); ?>

            </div>
                <div class="input-prepend">
                    <span class="add-on">Highest level obtained</span>
                    <select name="grade" id="grade" class="span7" onchange="decide()">
                    	<option value="null" <?php echo set_select('grade', 'null', true);?>>Select a grade</option>
                    	<option value="Grade 10" <?php echo set_select('grade', 'Grade 10', true);?>>Grade 10</option>
                    	<option value="Grade 11" <?php echo set_select('grade', 'Grade 11', true);?>>Grade 11</option>
                    	<option value="Grade 12" <?php echo set_select('grade', 'Grade 12', true);?>>Grade 12</option>
                    </select>
                </div>
                <br>
                <div id="matricType" class="input-prepend">
                    <span class="add-on">Matric type</span>
                    <?php
                        $matric= array(
                            'null'=>'Select a matric type',
                            'NC'=>'NC',
                            'NSC'=>'NSC',
                            'IEB'=>'IEB'
                        );
                        
                        $matricProp=" 'class'='span7',                            
                            'id'='matric'";
                        
                        echo form_dropdown('matric', $matric,$this->input->post('matric'), $matricProp)."<br>";
                    ?>
                </div>
                <br>
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