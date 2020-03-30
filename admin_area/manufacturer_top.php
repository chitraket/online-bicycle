<?php
include("includes/db.php");
$code = $_POST['code'];
$checkboxs=$_POST['checkboxs'];
            
              $update_p_cat = "update manufacturers set manufacturer_top='$checkboxs' where manufacturer_id='$code'";
              
              $run_p_cat = mysqli_query($con,$update_p_cat);
              
              if($run_p_cat){
                  
                  echo "<script>alert('Your Product Category Has Been Updated')</script>";
                  
                  echo "<script>window.open('view-manufacturer.php','_self')</script>";
                  
              } 
?>