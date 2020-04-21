<?php
include("includes/db.php");
$policy_id=$_POST['policy_ids'];
$policy_idss=$_POST['policy_idss'];
$update_product="update policy set policy_status='$policy_idss' where policy_id='$policy_id'";
mysqli_query($con,$update_product);
echo "<script>window.open('view-policy.php','_self')</script>";
?>