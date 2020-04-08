<?php
include("includes/db.php");
$p_cat_id=$_POST['p_cat_ids'];
$p_cat_idss=$_POST['p_cat_idss'];
$update_p_cat="update product_categories set p_cat_top='$p_cat_idss' where p_cat_id='$p_cat_id'";
mysqli_query($con,$update_p_cat);
echo "<script>window.open('view-product-category.php','_self')</script>";
?>