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
?>