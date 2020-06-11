<?php
include("includes/db.php");
if(isset($_POST['phone']) && isset($_POST['product_id']))
{
 $phone=$_POST['phone'];  
 $product_id=$_POST['product_id']; 
$select_customer = "select * from customers where not customer_email='$product_id' and customer_contact='$phone'";   
$run_customer = mysqli_query($con, $select_customer);
$check_customer = mysqli_num_rows($run_customer);
echo $check_customer;
}

?>