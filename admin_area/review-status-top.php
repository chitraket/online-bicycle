<?php
include("includes/db.php");
$review_id=$_POST['review_ids'];
$review_idss=$_POST['review_idss'];
$update_product="update review set status_top='$review_idss' where review_id='$review_id'";
mysqli_query($con,$update_product);
echo "success";
?>