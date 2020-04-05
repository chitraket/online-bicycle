<?php
session_start();
foreach ($_SESSION as $product) {
    print_r($product);
    
}
?>