<?php 


require "config.php"; //Connection Script
session_start(); 

if(isset($_POST['submit'])) 
{ 
   //Variables from the table 
   $user  = $_POST['user']; 
   $pass  = $_POST['pass']; 
       
   //Prevent MySQL Injections 
   $user  = stripslashes($user); 
   $pass  = stripslashes($pass); 
    
   $user  = mysqli_real_escape_string($con, $user); 
   $pass  = mysqli_real_escape_string($con, $pass); 
    
   //Check to see if the user left any space empty! 
   if($user == "" || $pass == "") 
   { 
      header("Location: login.php?error=1");
   } 
    
   //Check to see if the username AND password MATCHES the username AND password in the DB 
   else 
   { 
      $query = mysqli_query($con,"SELECT * FROM members WHERE user = '$user' and password = '$pass'") or die("Can't reach DB."); 
      $count = mysqli_num_rows($query); 
      $row = mysqli_fetch_row($query);
	  echo $row[3];
      if($count == 1){ 
         //YES WE FOUND A MATCH! 
         $_SESSION['username'] = $user; //Create a session for the user! 
		 $_SESSION['type']=$row[3];
		 //header("Location: .");
      } 
       
      else{ 
        header("Location: login.php?error=2");
      } 
   } 
    
} 

?> 