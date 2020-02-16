<?php
session_start();
session_destroy();
echo"<script>window.open('auth-login.php','_self')</script>"; 
?>