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
        
        $delete_pro = "update product_categories set p_cat_status='delete' where p_cat_id='$delete_id'";
        
        $run_delete = mysqli_query($con, $delete_pro);

        $delete_product = "update  products set product_status='delete' where p_cat_id='$delete_id'";
        
        mysqli_query($con, $delete_product);

        
        if ($run_delete) {
            echo "<script>window.open('view-product-category.php?m=1','_self')</script>";
        }
    } ?>
<?php
 } 
?>