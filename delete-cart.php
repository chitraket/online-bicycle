<?php
session_start();
if(isset($_GET['p_id']) && isset($_GET['p_name']))
{
    $p_id=base64_decode($_GET['p_id']);
    $p_name=base64_decode($_GET['p_name']);
    unset($_SESSION[$p_name.$p_id]);
    echo "<script>window.open('cart?m=1','_self')</script>";
}
else{
    echo "<script>window.open('home','_self')</script>";
}
?>