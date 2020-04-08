<?php
include("includes/db.php");
$manufacturer_id=$_POST['manufacturer_ids'];
$manufacturer_idss=$_POST['manufacturer_idss']; 
$update_manufacturer="update manufacturers set manufacturer_status='$manufacturer_idss' where manufacturer_id='$manufacturer_id'";
mysqli_query($con,$update_manufacturer);
$delete_product = "update products set product_status='$manufacturer_idss' where manufacturer_id='$manufacturer_id'";
mysqli_query($con, $delete_product);
echo "<script>window.open('view-manufacturer.php','_self')</script>";
?>