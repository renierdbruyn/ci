<?php
   echo validation_errors();
echo form_open('search/execute_search');

    echo form_input(array('name'=>'search'));
    echo form_submit('search_submit','Search');



?>


