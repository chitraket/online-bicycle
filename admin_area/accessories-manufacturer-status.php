<?php
include("includes/db.php");
$manufacturer_id=$_POST['accessories_ids'];
$manufacturer_idss=$_POST['accessories_idss']; 
$update_manufacturer="update accessories_brand set accessories_brand_status='$manufacturer_idss' where accessories_brand_id='$manufacturer_id'";
mysqli_query($con,$update_manufacturer);
$delete_product = "update accessories set accessories_status='$manufacturer_idss' where accessories_brand='$manufacturer_id'";
mysqli_query($con, $delete_product);
$select_product="select * from accessories where accessories_brand='$manufacturer_id'";
$run_product=mysqli_query($con,$select_product);
while($row_product=mysqli_fetch_array($run_product))
{
    $accessories_id=$row_product['accessories_id'];
    $update_review="update review set status='$manufacturer_idss' where product_id='$accessories_id'";
    mysqli_query($con,$update_review);
    $update_Wishlist="update wishlist set status='$manufacturer_idss' where product_id='$accessories_id'";
    mysqli_query($con,$update_Wishlist);
}
echo "success";
?>