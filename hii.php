<?php 
session_start();
foreach($_SESSION as $p)
{
    print_r($p);
}
?>