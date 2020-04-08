<?php
include("includes/db.php");
$cat_id=$_POST['category_ids'];
$cat_idss=$_POST['category_idss'];
$update_cat="update categories set cat_status='$cat_idss' where cat_id='$cat_id'";
mysqli_query($con,$update_cat);
$delete_product = "update products set product_status='$cat_idss' where cat_id='$cat_id'";
mysqli_query($con, $delete_product);
echo "<script>window.open('view-category.php','_self')</script>";
?>