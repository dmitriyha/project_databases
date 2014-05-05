
<?php 

session_start(); 
require "config.php"; 
session_destroy(); 

echo "You have successfully logged out. <a href='login.php'> Click here </a> to login again"; 

?> 