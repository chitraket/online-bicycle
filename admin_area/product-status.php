<?php
include("includes/db.php");
$product_id=$_POST['product_ids'];
$product_idss=$_POST['product_idss'];

$update_product="update products set product_status='$product_idss' where product_id='$product_id'";
mysqli_query($con,$update_product);
echo "success";
?>