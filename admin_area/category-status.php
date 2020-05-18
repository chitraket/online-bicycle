<?php
include("includes/db.php");
$cat_id=$_POST['category_ids'];
$cat_idss=$_POST['category_idss'];
$update_cat="update categories set cat_status='$cat_idss' where cat_id='$cat_id'";
mysqli_query($con,$update_cat);
$delete_product = "update products set product_status='$cat_idss' where cat_id='$cat_id'";
mysqli_query($con, $delete_product);
$select_product="select * from products where cat_id='$cat_id'";
$run_product=mysqli_query($con,$select_product);
while($row_product=mysqli_fetch_array($run_product))
{
    $accessories_id=$row_product['product_id'];
    $update_review="update review set status='$cat_idss' where product_id='$accessories_id'";
    mysqli_query($con,$update_review);
    $update_Wishlist="update wishlist set status='$cat_idss' where product_id='$accessories_id'";
    mysqli_query($con,$update_Wishlist);
}
echo "success";
?>