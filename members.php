
<?php 


//IF THE USER IS LOGGED IN THEN TELL THE USER, ELSE TELL THE USER TO LOG IN! 
session_start(); 
require "config.php"; 

//Check to see if the user is logged in. 
if(isset($_SESSION['username'])){ 
   echo "Hello ".$_SESSION['username'].", you are logged in. <br /> This is the member's page! Nothing here :(. <a href='logout.php'>Click Here </a>to log out.";
} 

else{ 
   echo "Please <a href='login.php'>Log In </a>  or <a href='register.php'>register </a> to view the content on this page!"; 
} 

?> 