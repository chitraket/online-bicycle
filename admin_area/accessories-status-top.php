<?php
include("includes/db.php");
$accessories_id=$_POST['accessories_ids'];
$accessories_idss=$_POST['accessories_idss'];
$update_product="update accessories set accessories_status_top='$accessories_idss' where accessories_id='$accessories_id'";
mysqli_query($con,$update_product);
echo "<script>window.open('view-accessories.php','_self')</script>";
?>