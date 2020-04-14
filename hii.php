<?php
session_start();
foreach($_SESSION as $value)
{
  print_r($value);
}
?>