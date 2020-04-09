<?php
include("includes/db.php");
$output='';
$country=$_POST['countryid'];
$sql="select * from city where country_id='$country'";
$result=mysqli_query($con,$sql);
$output ='<option value="">select City</option>';
while($row=mysqli_fetch_array($result))
{
    $output .='<option value="'.$row["city_id"].'">'.$row["city_name"].'</option>';
}
echo $output;
?>
