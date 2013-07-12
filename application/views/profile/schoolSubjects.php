<?php
foreach ($matric_type as $row) {
    $matric_type = $row->matric_type;
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/bootstrap.css" />
        <script src="<?php echo base_url(); ?>/js/school.js"></script>
        <script>
           
        </script>
    </head>
    <body onload="get_syllabus();">
        <div class="container">
            <div class="row">
                <div class="hero-unit">
                    <center><h1>School Subjects Information</h1></center>
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
                    <form name="school_subjects" action='add_school_subject' method='POST'>
                        <div id="top">

                            <select id="syllabus" name="syllabus" style=" width: 240px" disabled >
                                <?php
                                if (isset($matric_type) && !empty($matric_type)) {
                                    echo "<option value='$matric_type'" . set_select('syllabus', $matric_type) . " > " . $matric_type . "</option>";
                                }
                                else
                                    "<option value='null'" . set_select('contract_type', 'null') . ">- Select One -</option>";
                                ?>
                                <option value="null" >Please select a syllabus</option>
                                <option value="National Senior Certificate" >National Senior Certificate</option>
                                <option value="Independent Education Board" >Independent Education Board</option>
                                <option value="Senior Certificate" >Senior Certificate</option>
                            </select>	
                        </div>
                        <?php
// $this->load->helper('form');
//                    $selected = array(
//                        'English', 'Afrikaans'
//                    );
//
//                    $js = 'id="subjects" ondblclick="add_subject();"';
//                    echo form_dropdown('subjects', $sc, $selected, $js, 'style="color: red;"');
                        ?>

                        <script>

                        </script>
                        <script>
//                            window.onbeforeunload = function(e) {
//                                e = e || window.event;
//// For IE and Firefox prior to version 4
//                                if (e) {
//                                    e.returnValue = 'Sure?';
//                                }
//
//// For Safari
//                                return 'Sure?';
//                            };
                        </script>
                        <style>
                            .dynatable {
                                border: 0; 
                                border-collapse: collapse;
                            }
                            .dynatable th,
                            .dynatable td {
                                border: 0; 
                                padding: 2px 10px;
                                width: 170px;
                                text-align: center;
                            }
                            .dynatable .prototype {
                                display:none;
                            }
                        </style>
                        </head>
                        <body>
                            <table class="dynatable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Subject</th>
                                        <th>Mark</th>
                                        <th><button class="add btn btn-info" name='add'>Add</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="prototype">
                                        <td><input type="hidden" name="subject_list['id']" value="0" class="id" /></td>
                                        <td><select id="list" name="subject_list['subject']"></select></td>
                                        <td><input type="text" name="subject_list['mark']" value="<?php set_value('subject_list[mark]');?>" /></td>
                                        <td><button class="remove btn btn-danger" type="button">Remove</button>
                                    </tr>
                            </table>
                            <?php echo form_hidden("id_number", $this->session->userdata('id_number')); ?>
                            <button class="remove btn btn-success" type="submit" name='remove'>Save Subjects</button>
                    </form>
                    </body>
                    </html>