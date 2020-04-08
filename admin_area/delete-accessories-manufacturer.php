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
    if (isset($_GET['accessories_id'])) {
        $delete_id = $_GET['accessories_id'];
        
        $delete_pro = "update  accessories_brand set accessories_brand_status='delete' where accessories_brand_id='$delete_id'";
        
        $run_delete = mysqli_query($con, $delete_pro);
        
        $delete_product = "update  accessories set accessories_status='delete'  where accessories_brand='$delete_id'";
        
        mysqli_query($con, $delete_product);
        
        if ($run_delete) {
            echo "<script>window.open('view-accessories-manufacturer.php?m=1','_self')</script>";
        }
    } ?>
<?php
 } 
?>