<?php
include("includes/db.php");
$accessories_id=$_POST['accessories_ids'];
$accessories_idss=$_POST['accessories_idss'];
$update_product="update accessories_category set accessories_category_status='$accessories_idss' where accessories_category_id='$accessories_id'";
mysqli_query($con,$update_product);
$update_product="update accessories set accessories_status='$accessories_idss' where accessories_category='$accessories_id'";
mysqli_query($con,$update_product);
$select_product="select * from accessories where accessories_category='$accessories_id'";
$run_product=mysqli_query($con,$select_product);
while($row_product=mysqli_fetch_array($run_product))
{
    $accessories_ids=$row_product['accessories_id'];
    $update_review="update review set status='$accessories_idss' where product_id='$accessories_ids'";
    mysqli_query($con,$update_review);
    $update_Wishlist="update wishlist set status='$accessories_idss' where product_id='$accessories_ids'";
    mysqli_query($con,$update_Wishlist);
}
echo "success";
?>