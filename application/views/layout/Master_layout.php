<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<<<<<<< HEAD
<head>
    <title>Master Page</title>
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
    <li class="first"><a href="membership.html">Home </a>   </li>
    <li><a href="#">About Me</a></li>
   <li class="top"><a href="#">Portfolio</a>
            <ul>
                <li><a  href="#">Print</a></li>
                <li><a  href="#">Web</a></li>
                <li><a  href="#">Tutorials</a></li>
            </ul>
    </li> 
    <li><a href="#">Contact</a> </li>
</ul>
</div> <!-- /nav -->
</div> <!-- /navcon -->
<br/>
<div style="background: #B1B1B1; border-radius:5px; z-index:-3; border: 1px solid black; width:94%; height:40px; position:relative; right:3%; left:3%; ">

</div>
<br/>

<?php $this->load->view($content); ?>

</body>
=======
    <head>
        <title>Master Page</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" type="text/css" media="screen" >
            <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.1.min.js"></script>
            
            <?php //$this->load->view($style); ?>
            <style type="text/css" >       
                *{ margin:0px; padding: 0px; }
                body{background: #fff;}
                #navcon { background: #fff; width: 100%; height:80px}
                #nav { width: 900px; height: 56px; position: relative; color: #999; font-family:"helvatica";
                       margin:0px auto ; font-size: .9cm; padding-right: 1000%;}
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
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <!--Sidebar content-->
                    <?php echo img('assets/img/ycr.jpg'); ?><!--<image rel="Logo" href="/assets/img/ycr.jpg" width="250px" height="80px"/>-->
                    <?php
                    if ($this->session->userdata('logged_in') === FALSE) {
                        echo "";
                    } else { // its true so..      
                        //
                        ?>
                        </br>
                        </br>
                        </br>
                        </br>
                        </br>
                        </br>
                        </br>
                        </br>
                        <ul class="nav nav-list well">
                            <li class="nav-header">Update Profile</li>
                            <li><a href="../profile/index">Personal Details</a></li>
                            <li><a href="../profile/school">School Details</a></li>
                            <li><a href="../profile/skill">Skills</a></li>
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                        <!--                    <a href="../profile/index" class="btn btn-info" type="button" >Personal</a></br>
                                                               <a href="../profile/school" class="btn btn-info" type="button" >School</a> </br>  
                                                                <a href="../profile/skill" class="btn btn-info" type="button" >Skill</a>  </br> 
                                                                 <a href="../profile/index" class="btn btn-info" type="button" >Personal</a>   
                                                                  <a href="../profile/index" class="btn btn-info" type="button" >Personal</a>   -->
                        <?php
//                        echo "<ul class='nav nav-list'>";
//                        echo "<li class='nav-header'>Profile</li>";
//                        echo"<li  >";
//                        echo anchor('profile/index', 'Personal Details');
//                        echo"    </li>";
//                        echo"  <li  >";
//                        echo anchor('profile/school', 'School Details');
//                        echo" </li>";
//                        echo" <li>";
//                        echo anchor('profile/skill', 'Skills');
//                        echo"</li>";
//                        echo"</ul>";
                    }
                    ?>

                </div>
                <div class="span10">
                    <div id="nav">                    
                        <ul>   


                            <li class="first"><?php echo anchor('welcome/index', 'Home'); ?> </li>
                            <!--<li><?php //echo anchor('site/index', 'Crud');                     ?></li>-->
                            <?php
//                            if ($this->session->userdata('logged_in') === FALSE) {
//                                echo "";
//                            } else {
                            ?>
                            <!--                                <li><?php // echo anchor('profile/index', 'online cv');     ?>
                                                                <ul>
                                                                    <li><?php // echo anchor('profile/index', 'Personal Details');     ?></li>
                                                                    <li><?php // echo anchor('profile/school', 'School Details');     ?></li>
                                                                    <li><?php // echo anchor('profile/skill', 'Skills');     ?></li>
                                                                </ul>
                                                            </li>-->
                            <?php
//                            }
                            ?>
                            <li class="top"><a href="#">Submit CV</a>
                                <ul>                           
                                    <li><a  href="#">Upload cv</a></li>
                                    <li><a  href="#">Find job</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Contact</a> </li>
                        </ul>
                    </div> <!-- /nav -->

                    </br>
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

<<<<<<< HEAD
                    <br/>
=======
<?php $this->load->view($content);
echo isset($info ) ? $info : NULL; 
?>
>>>>>>> origin/Nelly

                    <?php $this->load->view($content); ?>
                    </br>
                    <?php echo isset($info) ? $info : NULL; ?>
                </div>
            </div>
        </div>
    </body>
>>>>>>> master
</html>
