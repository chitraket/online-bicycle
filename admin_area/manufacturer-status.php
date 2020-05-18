<?php
include("includes/db.php");
$manufacturer_id=$_POST['manufacturer_ids'];
$manufacturer_idss=$_POST['manufacturer_idss']; 
$update_manufacturer="update manufacturers set manufacturer_status='$manufacturer_idss' where manufacturer_id='$manufacturer_id'";
mysqli_query($con,$update_manufacturer);
$delete_product = "update products set product_status='$manufacturer_idss' where manufacturer_id='$manufacturer_id'";
mysqli_query($con, $delete_product);
$select_product="select * from products where manufacturer_id='$manufacturer_id'";
$run_product=mysqli_query($con,$select_product);
while($row_product=mysqli_fetch_array($run_product))
{
    $accessories_id=$row_product['product_id'];
    $update_review="update review set status='$manufacturer_idss' where product_id='$accessories_id'";
    mysqli_query($con,$update_review);
    $update_Wishlist="update wishlist set status='$manufacturer_idss' where product_id='$accessories_id'";
    mysqli_query($con,$update_Wishlist);
}
echo "success";

?>