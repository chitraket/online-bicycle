<?php
include("includes/db.php");
$accessories_id=$_POST['accessories_ids'];
$accessories_idss=$_POST['accessories_idss'];
$update_product="update accessories set accessories_status='$accessories_idss' where accessories_id='$accessories_id'";
mysqli_query($con,$update_product);
$update_review="update review set status='$accessories_idss' where product_id='$accessories_id'";
mysqli_query($con,$update_review);
$update_Wishlist="update wishlist set status='$accessories_idss' where product_id='$accessories_id'";
mysqli_query($con,$update_Wishlist);
echo "success";
?>