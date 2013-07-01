
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
        <title><?php echo $title; ?></title>
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
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/address.js"></script>
        <script>
            function get()
            {
                var street = document.getElementById("street").value;
                var suburb = document.getElementById("suburb").value;
                var code = document.getElementById("code").value;
                var address = street + ", " + suburb + ", " + code;
                document.getElementById("fullAddress").value = address;
            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="hero-unit">
                    <center><h1>Personal Information</h1></center>
                </div>
            </div>
        </div>



        <div class="span10">
            <!--Body content-->
            <?php
            // $this->load->helper('form');
            echo form_open('profile/add_personal');
            ?>
            <div class="clearfix" style="color:red;">

                <?php echo form_error('fullAddress'); ?>

            </div>
            <div class="input-prepend">

                <label class="add-on ">Address</label>
                <input class="span7" id="fullAddress" name="fullAddress" readonly type="text" placeholder="55 milarina, Newlands west, 4037" value="<?php set_value('fullAddress', 'Full Address'); ?>" style="cursor:pointer; width: 300px">
            </div>

            <br>
            <div id="addressForm" class="input-prepend">
                <label class="add-on">Street</label>
                <input class="span7" name="street" id="street" type="text" placeholder="55 Milarina dr">
                <br>
                <label class="add-on">Suburb</label>
                <input class="span7" id="suburb" type="text" placeholder="Newlands west">
                <br>
                <label class="add-on">Postal code</label>
                <input class="span7" id="code" type="text" placeholder="4037">
                <br>
                <?php
                $js = 'id="addressButton" onclick="get()"';
                echo form_button('addressButton', 'Save address', $js)
                ?>
            </div>
            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('city'); ?>
            </div>
            <div class="input-prepend">

                <label class="add-on">City</label>
                <input class="span7" id="city" name="city" type="text" placeholder="Durban" >


            </div>
            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('licence'); ?>
            </div>
            <div class="input-prepend">

                <label class="add-on">License</label>
                <?php
                $optlicense = array(
                    'A1' => 'A1',
                    'A' => 'A',
                    'B' => 'B',
                    'EB' => 'EB',
                    'C1' => 'C1',
                    'C' => 'C',
                    'EC1' => 'EC1',
                    'EC' => 'EC',
                );
                $licenseProp = array(
                    'class' => 'span7',
                    'name' => 'license',
                    'style' => 'width:300px'
                );
                // echo form_dropdown($licenseProp, $optlicense, 'A1');            
                ?>
                <select name="licence" class="span7" style=" width: 300px">
                    <option value ="A1"  <?php echo set_select('select', 'A1', true); ?>>A1</option>
                    <option value ="A"   <?php echo set_select('select', 'A'); ?>>A</option>
                    <option value ="B"   <?php echo set_select('select', 'B'); ?>>B</option>
                    <option value ="EB"  <?php echo set_select('select', 'EB'); ?>>EB</option>
                    <option value ="C1"  <?php echo set_select('select', 'C1'); ?>>C1</option>
                    <option value ="C"   <?php echo set_select('select', 'C'); ?>>C</option>
                    <option value ="EC1" <?php echo set_select('select', 'EC1'); ?>>EC1</option>
                    <option value ="EC"  <?php echo set_select('select', 'EC'); ?>>EC</option>
                </select>

            </div>
            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('gender'); ?>
            </div>
            <div class="input-prepend">

                <label class="add-on">Gender</label>
                <?php
                $optgender = array(
                    'male' => 'Male',
                    'female' => 'Female',
                );
                $genderProp = array(
                    'class' => 'span7',
                    'name' => 'gender'
                );

                //echo form_dropdown($genderProp, $optgender, 'male');
                ?>
                <select name="gender" class="span7">
                    <option value ="Male" <?php echo set_select('select', 'male', true); ?>>Male</option>
                    <option value ="Female"<?php echo set_select('select', 'female'); ?>>Female</option>
                </select>

            </div>
            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('minimum_salary'); ?>
            </div>
            <div class="input-prepend">

                <label class="add-on">Minimum salary per month </label>
                <input class="span7" name="minimum_salary" type="text" placeholder="5 000 ">

            </div>
            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('prefered_salary'); ?>
            </div>
            <div class="input-prepend">

                <label class="add-on">Prefered salary per month</label>
                <input class="span7" name="prefered_salary"  type="text" placeholder="15 000 ">
            </div>

            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('relocate'); ?>
            </div>
            <div class="input-prepend">

                <label class="add-on">relocate</label> 
                <?php
                $relocate = array(
                    'name' => 'relocate',
                    'value' => 'Yes'
                );

                $optrelocate = array(
                    'yes' => 'Yes',
                    'no' => 'No',
                );
                // echo form_dropdown($relocate,$optrelocate, 'no');
                ?>
                <select name="relocate" class="span7">
                    <option value ="Yes">Yes</option>
                    <option value ="No" selected>No</option>
                </select>
            </div>

            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('contract_type'); ?>
            </div>
            <div class="input-prepend">

                <label class="add-on">Prefered Contract Type</label> 

                <select name="contract_type" class="span7">
                    <option value ="permanent">Permanent</option>
                    <option value ="temporary" >Temporary</option>
                    <option value ="contract" >Contract</option>
                </select>
            </div>

            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('self_description'); ?>
            </div>
            <div class="input-prepend">
                <label class="add-on">Describe yourself briefly</label> 

                <textarea rows="5"  class="span7" name="self_description"></textarea>
            </div>

            <div>
                <button class="btn btn-success"  type="submit">Save Data</button>
                <?php
                //echo form_button(array('class'=>'span2 btn btn-success', 'name'=>'personal', 'content'=>'Save Data'));
                echo form_close();
                ?>
            </div>
            <?php //echo validation_errors('<p class ="error">'); ?>
        </div>
    </div>
</div>

</body>
</html>