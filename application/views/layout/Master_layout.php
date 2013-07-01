<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Master Page</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" type="text/css" media="screen" >
            <?php //$this->load->view($style); ?>
            <style type="text/css" >       
                *{ margin:0px; padding: 0px; }
                body{background: #fff;}
                #navcon { background: #fff; width: 100%; height:80px}
                #nav { width: 900px; height: 56px; position: relative; color: #999; font-family:"helvatica";
                       margin:0px auto ; font-size: .9cm; }
                #nav ul {  list-style-type:none;}
                #nav ul li {float:left; position:relative;}
                #nav ul li a{ border-right: 1px solid #e9e9e9; padding:20px;display:block; text-align:center; color:#999; text-decoration: none; }

                #nav ul li a:hover {background: #12aeef; color:#fff;}

                #nav ul li ul {display : none;}

                #nav ul li:hover ul { display:block; position:absolute;}
                #nav ul li:hover ul li a {background: #6dc7ec; color:#fff; display:block; border-bottom:1px solid #f2f2f2; border-right:none; width:119px;}
                #nav ul li:hover ul li a:hover {background:#999; color:#fff;}

                .top{ border-top:1px solid #f2f2f2;}
                .first{border-left: 1px solid #f2f2f2; }      
            </style>
    </head>
    <body>
        <div id="navcon">
            <div id="nav">
                <ul>
                        <li><?php echo img('assets/img/ycr.jpg'); ?><!--<image rel="Logo" href="/assets/img/ycr.jpg" width="250px" height="80px"/>--></li>
                    <li class="first"><?php echo anchor('welcome/index', 'Home'); ?> </li>
                    <li><?php echo anchor('site/index', 'Crud'); ?></li>
                    <li class="top"><a href="#">Submit CV</a>
                        <ul>
                            <li><?php echo anchor('profile/index', 'online cv'); ?></li>
                            <li><a  href="#">Upload cv</a></li>
                            <li><a  href="#">Find job</a></li>
                        </ul>
                    </li> 
                    <li><a href="#">Contact</a> </li>
                </ul>
            </div> <!-- /nav -->
        </div> <!-- /navcon -->
        <br/>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <!--Sidebar content-->
                    <button class=" span10 btn btn-large">Personal</button>
                    <button class=" span10 btn btn-large">Menu</button>
                    <button class=" span10 btn btn-large">Menu</button>
                    <button class=" span10 btn btn-large">Menu</button>
                    <button class=" span10 btn btn-large">Menu</button>
                    <button class=" span10 btn btn-large">Menu</button>
                </div>
                <div class="span10">

                    <div >
                        <?php
                        if ($this->session->userdata('logged_in') === FALSE) {
                            echo anchor('login/index', "Login");
                        } else { // its true so..
                            echo "";
                        }
                        ?> <?php
                        if ($this->session->userdata('logged_in') === FALSE) {
                            echo "";
                        } else { // its true so..
                            echo anchor('login/logout', "Logout");
                        }//echo isset($this->session->userdata('not_set') ) ? anchor('login/logout', "Logout") : NULL; 
                        ?>
                    </div>

                    <br/>

                    <?php $this->load->view($content); ?>
                    </br>
                    <?php echo isset($info) ? $info : NULL; ?>
                </div>
            </div>
        </div>
    </body>
</html>
