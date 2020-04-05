<?php
 session_start();
 include("includes/db.php");
 if(!isset($_SESSION['admin_email']))
 {
     echo "<script>window.open('auth-login.php','_self')</script>";
 } 
 else{
     ?>
<?php
    if (isset($_GET['term_id'])) {
        $term_id = $_GET['term_id'];
        
        $delete_pro = "delete from terms where term_id='$term_id'";
        
        $run_delete = mysqli_query($con, $delete_pro);
        
        if ($run_delete) {
            
            echo "<script>window.open('view-terms.php?m=1','_self')</script>";
        }
    } ?>
<?php
 } 
?>