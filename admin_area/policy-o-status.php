<?php
include("includes/db.php");
$policy_id=$_POST['o_policy_ids'];
$policy_idss=$_POST['o_policy_idss'];
$update_product="update order_policy set o_policy_status='$policy_idss' where o_policy_id='$policy_id'";
mysqli_query($con,$update_product);
echo "success";
?>