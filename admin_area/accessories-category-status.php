<?php
include("includes/db.php");
$accessories_id=$_POST['accessories_ids'];
$accessories_idss=$_POST['accessories_idss'];
$update_product="update accessories_category set accessories_category_status='$accessories_idss' where accessories_category_id='$accessories_id'";
mysqli_query($con,$update_product);
$update_product="update accessories set accessories_status='$accessories_idss' where accessories_category='$accessories_id'";
mysqli_query($con,$update_product);

echo "<script>window.open('view-accessories-category.php','_self')</script>";
?>