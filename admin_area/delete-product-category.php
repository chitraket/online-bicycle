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
    if (isset($_GET['p_cat_id'])) {
        $delete_id = $_GET['p_cat_id'];
        
        $delete_pro = "delete from product_categories where p_cat_id='$delete_id'";
        
        $run_delete = mysqli_query($con, $delete_pro);
        
        if ($run_delete) {
            echo "<script>alert('One of your categories has been Deleted')</script>";
            
            echo "<script>window.open('view-product-category.php','_self')</script>";
        }
    } ?>
<?php
 } 
?>