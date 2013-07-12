<div>
 
<ul>
    <?php foreach ($results as $val){
     $nego = $val['negotiable']; ?>
     <li><h1><?php echo $val ['job_title'];?></h1></li>
     <strong> <?php echo " START DATE: ", $val['start_date'];?></strong>
     <strong><?php echo " END DATE: ", $val['end_date'];?></strong>
   <strong> <?php echo " SALARY: ",  $val['salary_offered'];?></strong>
   <strong> <?php echo "BENEFITS: ", $val['benefits'];?></strong>
   <br> <?php echo"DESCRIPTION: ", $val['job_description'];?> </br>
   <strong><br> <?php if(isset($nego) == '1'){ 
       echo "NEGOTIABLE: NO";
       
   }else echo "NEGOTIABLE: NO"
    
           ?> </br></strong>
    <?php }
 ?>

  
    </ul>
     


   
<div>
