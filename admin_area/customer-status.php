<?php
include("includes/db.php");
$customer_id=$_POST['customer_ids'];
$customer_idss=$_POST['customer_idss'];

$update_product="update customers set customer_status='$customer_idss' where customer_id='$customer_id'";
mysqli_query($con,$update_product);
$customer_email='';
        $select_customer="select * from customers where customer_id='$customer_id'";
        $run_customer=mysqli_query($con,$select_customer);
        while($row_customer=mysqli_fetch_array($run_customer))
        {
            $customer_email=$row_customer['customer_email'];
            
        }
       
        $delete_customer="update review set status='$customer_idss' where customer_email='$customer_email'";
        mysqli_query($con,$delete_customer);
echo "<script>window.open('view-customer.php','_self')</script>";
?>