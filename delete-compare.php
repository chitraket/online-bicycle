<?php
session_start();
if(isset($_GET['p_id']) && isset($_GET['p_name']))
{
    $p_id=base64_decode($_GET['p_id']);
    $p_name=base64_decode($_GET['p_name']);
    foreach($_SESSION["compare"] as $keys => $values)  
    {  
        if($values["item_id"] == $p_id && $values['item_name']== $p_name)  
        { 
            unset($_SESSION["compare"][$keys]);
            echo "<script>window.open('compare?m=1','_self')</script>";
        }
    }
}
else{
    echo "<script>window.open('home','_self')</script>";
}
?>