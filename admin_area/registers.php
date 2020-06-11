<?php
include("includes/db.php");
if(isset($_POST['phone']))
{
 $phone=$_POST['phone'];   
$select_customer = "select * from admins where admin_contact='$phone'";   
$run_customer = mysqli_query($con, $select_customer);
$check_customer = mysqli_num_rows($run_customer);
echo $check_customer;
}
if(isset($_POST['email']))
{
    $email=$_POST['email'];   
    $select_customers = "select * from admins where admin_email='$email'";   
    $run_customers = mysqli_query($con, $select_customers);
    $check_customers = mysqli_num_rows($run_customers);
    echo $check_customers;
}
if(isset($_POST['emails']) && isset($_POST['product_ids']))
{
    $email=$_POST['emails']; 
    $product_ids=$_POST['product_ids'];  
    $select_customers = "select * from admins where not admin_id='$product_ids' and admin_email='$email'";   
    $run_customers = mysqli_query($con, $select_customers);
    $check_customers = mysqli_num_rows($run_customers);
    echo $check_customers;
}
if(isset($_POST['phones']) && isset($_POST['product_idss']))
{
 $phones=$_POST['phones']; 
 $product_idss=$_POST['product_idss'];  
$select_customer = "select * from admins where not admin_id='$product_idss' and admin_contact='$phones'";   
$run_customer = mysqli_query($con, $select_customer);
$check_customer = mysqli_num_rows($run_customer);
echo $check_customer;
}
?>