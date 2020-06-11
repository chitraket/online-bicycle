<?php 
function image($image)
{
  $ext = pathinfo($image, PATHINFO_EXTENSION);
  $extensions= array("jpeg","jpg","png"); 
  if(empty($image) || in_array($ext,$extensions)==false)
  {
    return true;   
  }
  else{
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
function emaila($email)
{ 
  global $con;
  $select_email="select * from admins where admin_email='$email'";
  $row_email=mysqli_query($con,$select_email);
  $num_email=mysqli_num_rows($row_email);
    if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL) || $num_email!=0)
    {
        return true;
    }   
  else
    {
      return false;
    }
}
function emailua($email,$admin_id)
{ 
  global $con;
  $select_email="select * from admins where not admin_id='$admin_id' and admin_email='$email'";
  $row_email=mysqli_query($con,$select_email);
  $num_email=mysqli_num_rows($row_email);
    if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL) || $num_email!=0)
    {
        return true;
    }   
  else
    {
      return false;
    }
}
function emailca($email,$admin_id)
{ 
  global $con;
  $select_email="select * from customers where not customer_id='$admin_id' and customer_email='$email'";
  $row_email=mysqli_query($con,$select_email);
  $num_email=mysqli_num_rows($row_email);
    if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL) || $num_email!=0)
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
function contacta($contacts)
{
  global $con;
  $select_contacts="select * from admins where admin_contact='$contacts'";
  $row_contacts=mysqli_query($con,$select_contacts);
  $num_contacts=mysqli_num_rows($row_contacts);
    if(empty($contacts) || !preg_match("/^[9876][0-9]{9}$/",$contacts) || $num_contacts!=0)
    {
        return true;
    }
    else
    {
      return false;
    }
}
function contactua($contacts,$admin_id)
{
  global $con;
  $select_contacts="select * from admins where not admin_id='$admin_id' and admin_contact='$contacts'";
  $row_contacts=mysqli_query($con,$select_contacts);
  $num_contacts=mysqli_num_rows($row_contacts);
    if(empty($contacts) || !preg_match("/^[9876][0-9]{9}$/",$contacts) || $num_contacts!=0)
    {
        return true;
    }
    else
    {
      return false;
    }
}
function contactca($contacts,$admin_id)
{
  global $con;
  $select_contacts="select * from customers where not customer_id='$admin_id' and customer_contact='$contacts'";
  $row_contacts=mysqli_query($con,$select_contacts);
  $num_contacts=mysqli_num_rows($row_contacts);
    if(empty($contacts) || !preg_match("/^[9876][0-9]{9}$/",$contacts) || $num_contacts!=0)
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
function price($contact)
{
    if(!preg_match("/^[0-9]*$/",$contact))
    {
        return true;
    }
    else
    {
      return false;
    }
}
function color($color)
{
if(!preg_match("/^[A-Za-z]*$/",$color))
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