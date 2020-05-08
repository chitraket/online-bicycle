<?php
include("includes/db.php");
$accessories_id=$_POST['accessories_ids'];
$accessories_idss=$_POST['accessories_idss'];
$update_product="update accessories_brand set accessories_brand_top='$accessories_idss' where accessories_brand_id='$accessories_id'";
mysqli_query($con,$update_product);
echo "success";
?>