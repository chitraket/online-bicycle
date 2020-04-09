<?php
include("includes/db.php");
$slider_id=$_POST['slider_ids'];
$slider_idss=$_POST['slider_idss'];
$update_product="update slider set slide_status='$slider_idss' where slide_id='$slider_id'";
mysqli_query($con,$update_product);
echo "<script>window.open('view-slider.php','_self')</script>";
?>