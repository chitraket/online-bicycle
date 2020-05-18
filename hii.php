<?php 
session_start();
if (isset($_SESSION["compare"])) {
    print_r($_SESSION["compare"]);
}
?>