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
                    $this->load->helper('form');
                    echo form_open();
                ?>
                <div class="input-prepend">
                    <span class="add-on">School name</span>
                    <?php
                        $schoolnameProp=array(
                            'class'=>'span7',
                            'name'=>'school name',
                            'placeholder'=>'Qhakaza High School'
                        );
                        echo form_input($schoolnameProp);
                    ?>
                </div>
                <br>
                <div class="input-prepend">
                    <span class="add-on">Reference name</span>
                    <?php
                        $referenceNameProp=array(
                            'class'=>'span7',
                            'name'=>'school name',
                            'placeholder'=>'Patric Johnson'
                        );
                        
                        echo form_input($referenceNameProp);
                    ?>
                </div>
                <br>
                <div class="input-prepend">
                    <span class="add-on">Reference phone</span>
                    <?php
                        $referencePhoneProp=array(
                            'class'=>'span7',
                            'name'=>'reference_phone',
                            'placeholder'=>'0743109227'
                        );
                        
                        echo form_input($referencePhoneProp);
                    ?>
                </div>
                <br>
                <div class="input-prepend">
                    <span class="add-on">Highest level obtained</span>
                    <select name="grade" id="grade" class="span7" onchange="decide()">
                    	<option value="">Select a grade</option>
                    	<option value="Grade 10">Grade 10</option>
                    	<option value="Grade 11">Grade 11</option>
                    	<option value="Grade 12">Grade 12</option>
                    </select>
                </div>
                <br>
                <div id="matricType" class="input-prepend">
                    <span class="add-on">Matric type</span>
                    <?php
                        $matric= array(
                            ''=>'Select a matric type',
                            'NC'=>'NC',
                            'NSC'=>'NSC',
                            'IEB'=>'IEB'
                        );
                        
                        $matricProp=array(
                            'class'=>'span7',
                            'name'=>'matric',
                            'id'=>'matric'
                        );
                        
                        echo form_dropdown($matricProp, $matric, 'Select a matric type')."<br>";
                    ?>
                </div>
                <br>
                <div>
                    <input class="span2 btn-success" id="schoolButton" type="submit" value="Save Data">
                </div>
                <?php
                    echo form_close();
                ?>
              </div>
            </div>
        </div>
    </body>
</html>