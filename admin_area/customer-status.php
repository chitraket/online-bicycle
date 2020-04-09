<?php
include("includes/db.php");
$customer_id=$_POST['customer_ids'];
$customer_idss=$_POST['customer_idss'];
$update_product="update customers set customer_status='$customer_idss' where customer_id='$customer_id'";
mysqli_query($con,$update_product);
echo "<script>window.open('view-customer.php','_self')</script>";
?>