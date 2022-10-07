<?php
session_start(); 
session_destroy(); // destroy session
header("location: /epn/login.php"); 
?>

