<?php
include("includes/db.php");
$box_id=$_POST['box_ids'];
$box_idss=$_POST['box_idss'];
$update_product="update boxes_section set box_status='$box_idss' where box_id='$box_id'";
mysqli_query($con,$update_product);
echo "success";
?>