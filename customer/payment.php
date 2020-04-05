<?php
session_start();
if(isset($_GET['amount'],$_GET['o_id']))
{
$_SESSION['ORDER_IDS']="ORDS" . rand(10000,99999999);
$_SESSION['TXN_AMOUNTS']=$_GET['amount'];
$_SESSION['CUST_IDS']=$_GET['o_id'];
$_SESSION['CHANNEL_IDS']="WEB";
$_SESSION['INDUSTRY_TYPE_IDS']="Retail";
echo"<script>window.open('pgRedirects.php','_self');</script>";
}
?>