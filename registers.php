<?php
include("includes/db.php");
if(isset($_POST['phone']))
{
 $phone=$_POST['phone'];   
$select_customer = "select * from customers where customer_contact='$phone'";   
$run_customer = mysqli_query($con, $select_customer);
$check_customer = mysqli_num_rows($run_customer);
echo $check_customer;
}
if(isset($_POST['email']))
{
    $email=$_POST['email'];   
    $select_customers = "select * from customers where customer_email='$email'";   
    $run_customers = mysqli_query($con, $select_customers);
    $check_customers = mysqli_num_rows($run_customers);
    echo $check_customers;
}
?>