<?php
include("includes/db.php");
$logo_id=$_POST['logo_ids'];
$logo_idss=$_POST['logo_idss'];
$update_product="update logo set logo_status='$logo_idss' where logo_id='$logo_id'";
mysqli_query($con,$update_product);
echo "success";
?>