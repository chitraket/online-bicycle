<?php
include("includes/db.php");
$manufacturer_id=$_POST['manufacturer_ids'];
$manufacturer_idss=$_POST['manufacturer_idss']; 
$update_manufacturer="update manufacturers set manufacturer_top='$manufacturer_idss' where manufacturer_id='$manufacturer_id'";
mysqli_query($con,$update_manufacturer);
echo "<script>window.open('view-manufacturer.php','_self')</script>";
?>