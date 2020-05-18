<?php
include("includes/db.php");
$p_cat_id=$_POST['p_cat_ids'];
$p_cat_idss=$_POST['p_cat_idss'];
$update_p_cat="update product_categories set p_cat_status='$p_cat_idss' where p_cat_id='$p_cat_id'";
mysqli_query($con,$update_p_cat);
$delete_product = "update products set product_status='$p_cat_idss' where p_cat_id='$p_cat_id'";
mysqli_query($con, $delete_product);
$select_product="select * from products where p_cat_id='$p_cat_id'";
$run_product=mysqli_query($con,$select_product);
while($row_product=mysqli_fetch_array($run_product))
{
    $accessories_id=$row_product['product_id'];
    $update_review="update review set status='$p_cat_idss' where product_id='$accessories_id'";
    mysqli_query($con,$update_review);
    $update_Wishlist="update wishlist set status='$p_cat_idss' where product_id='$accessories_id'";
    mysqli_query($con,$update_Wishlist);
}
echo "success";
?>