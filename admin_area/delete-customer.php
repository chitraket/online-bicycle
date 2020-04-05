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
    if (isset($_GET['customer_id'])) {
        $delete_id = $_GET['customer_id'];
        
        $delete_pro = "delete from customers where customer_id='$delete_id'";
        
        $run_delete = mysqli_query($con, $delete_pro);
        
        if ($run_delete) {
            echo "<script>window.open('view-customer.php?m=1','_self')</script>";
        }
    } ?>
<?php
 } 
?>