<?php
include("includes/db.php");
$manufacturer_id=$_POST['accessories_ids'];
$manufacturer_idss=$_POST['accessories_idss']; 
$update_manufacturer="update accessories_brand set accessories_brand_status='$manufacturer_idss' where accessories_brand_id='$manufacturer_id'";
mysqli_query($con,$update_manufacturer);
$delete_product = "update accessories set accessories_status='$manufacturer_idss' where accessories_brand='$manufacturer_id'";
mysqli_query($con, $delete_product);
echo "success";
?>