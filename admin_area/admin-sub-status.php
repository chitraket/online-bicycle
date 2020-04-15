<?php
include("includes/db.php");
$admin_id=$_POST['admin_ids'];
$admin_idss=$_POST['admin_idss'];
$update_cat="update admins set admin_status='$admin_idss' where admin_id='$admin_id'";
mysqli_query($con,$update_cat);
echo "<script>window.open('view-sub-user.php','_self')</script>";
?>