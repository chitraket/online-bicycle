<?php
function opass($opass)
{
    if(empty($opass))
    {
        return true;
    }
    else
    {
      return false;
    }
}
function firstname($txtName)
{ 
    if(empty($txtName) || !preg_match("/^[A-Za-z]*$/",$txtName))
    {
        return true;
    }
    else
    {
      return false;
    } 
}
function lastname($lastname)
{
    if(empty($lastname) || !preg_match("/^[A-Za-z]*$/",$lastname))
    {
        return true;
    }
    else
    {
      return false;
    }
}
function images($image)
{
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $extensions= array("jpeg","jpg","png"); 
    if(!empty($image) && in_array($ext,$extensions)==false)
    {
      return true;   
    }
    else{
      return false;
    }
}
function email($email)
{
    if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    else
    {
      return false;
    }
}
function pass($pass)
{
    if(empty($pass) || !preg_match("/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/",$pass))
    {
        return true;
    }
    else
    {
      return false;
    }
}
function c_pass($c_pass)
{
    if(empty($c_pass))
    {
        return true;
    }
    else
    {
      return false;
    }
}
function state($state)
{
    if(empty($state) || !preg_match("/^[A-Za-z]*$/",$state))
    {
        return true;
    }
    else
    {
      return false;
    }
}
function otp($otp)
{
    if(empty($otp) || !preg_match("/^[0-9]{4}$/",$otp))
    {
        return true;
    }
    else
    {
      return false;
    }
}
function city($city)
{
    if(empty($city) || !preg_match("/^[A-Za-z]*$/",$city))
    {
        return true;
    }
    else
    {
      return false;
    }
}
function contact($contact)
{
    if(empty($contact) || !preg_match("/^[9876][0-9]{9}$/",$contact))
    {
        return true;
    }
    else
    {
      return false;
    }
}
function contacte($contactss,$employee_ids)
{
  global $con;
  $select_contacts="select * from customers where not customer_email='$employee_ids' and customer_contact='$contactss'";
  $row_contacts=mysqli_query($con,$select_contacts);
  $num_contacts=mysqli_num_rows($row_contacts);
    if(empty($contactss) || !preg_match("/^[9876][0-9]{9}$/",$contactss) || $num_contacts!=0)
    {
        return true;
    }
    else
    {
      return false;
    }
}
function address($address)
{
    if(empty($address))
    {
        return true;
    }
    else
    {
      return false;
    }
}
function pincode($pincode)
{
    if(empty($pincode) || !preg_match("/^[1-9][0-9]{5}$/",$pincode))
    {
        return true;
    }
    else
    {
      return false;
    }
}
?>