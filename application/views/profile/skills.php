<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/bootstrap.css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="hero-unit">
                    <center><h1>Skills Information</h1></center>
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
                    <span class="add-on">Skill name</span>
                    <?php
                        $skillname= array(
                            ''=>'Select skills',
                            'Using a computer'=>'Using a computer',
                            'Microsoft office suite'=>'Microsoft office suite',
                            'Using email'=>'Using email',
                            'Using internet'=>'Using internet',
                            'Installing software'=>'Installing software',
                            'Understand computer directory'=>'Understand computer directory',
                            'Configure a program'=>'Configure a program',
                            'Programming'=>'Programming',
                            'Understand data security'=>'Understand data security',
                            'Fixing software'=>'Fixing software',
                            'Repairing computer hardware'=>'Repairing computer hardware'
                        );
                        
                        $skillnameProp=array(
                            'class'=>'span7',
                            'name'=>'skill name'
                        );
                        
                        echo form_dropdown($skillnameProp, $skillname, 'Select skills');
                    ?>
                    
                </div>
                <br>
                <div class="input-prepend">
                    <span class="add-on">Skill level</span>
                    <?php
                        $skilllevel= array(
                            ''=>'Skills level',
                            'Bigginer'=>'Bigginer',
                            'Advanced'=>'Advanced',
                            'Expert'=>'Expert'
                        );
                        
                        $skilllevelProp=array(
                            'class'=>'span7',
                            'name'=>'skill level'
                        );
                        
                        echo form_dropdown($skilllevelProp, $skilllevel, 'Skills level');
                    ?>
                </div>
                <br>
                <div class="input-prepend">
                    <span class="add-on">Experience</span>
                    <?php
                        $experience= array(
                            ''=>'Experience in years',
                            '1'=>'1',
                            '2'=>'2',
                            '3'=>'3',
                            '4'=>'4',
                            '5'=>'5',
                            '6'=>'6',
                            '7'=>'7',
                            '8'=>'8',
                            '9'=>'9',
                            'more'=>'More'
                        );
                        
                        $experienceProp=array(
                            'class'=>'span7',
                            'name'=>'experience'
                        );
                        
                        echo form_dropdown($experienceProp, $experience, 'Experience in years');
                    ?>
                </div>
                <br>
                <div>
                    <input class="span2 btn-success" id="prependedInput" type="submit" value="Save Data">
                </div>
                <?php
                    echo form_close();
                ?>
              </div>
            </div>
        </div>
    </body>
</html>