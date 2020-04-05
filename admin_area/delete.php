<?php
include("includes/db.php");
$order_id=$_GET['del_id'];
$order_status=$_GET['status'];
$update_p_cat = "update customer_orders set order_status='$order_status' where order_id=$order_id"; 
$run_p_cat = mysqli_query($con,$update_p_cat);
if($run_p_cat){
    echo "<script>window.open('view-order.php','_self')</script>";   
}      
?>