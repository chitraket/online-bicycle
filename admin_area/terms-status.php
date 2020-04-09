<?php
include("includes/db.php");
$terms_id=$_POST['terms_ids'];
$terms_idss=$_POST['terms_idss'];
$update_product="update terms set term_status='$terms_idss' where term_id='$terms_id'";
mysqli_query($con,$update_product);
echo "<script>window.open('view-terms.php','_self')</script>";
?>