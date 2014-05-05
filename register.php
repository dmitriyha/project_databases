
<?php 


session_start();  //Session start

require "config.php"; //Connection Script

//Check to see if the user is logged in. 


if(isset($_SESSION['username'])){ 
   header("location: members.php"); 
} 

//Check to see if the user click the button 
if(isset($_POST['submit'])) 
{ 
   //Variables from the table
	$id = $_POST['id'];
   $user  = $_POST['user']; 
   $pass  = $_POST['pass']; 
   $rpass = $_POST['rpass']; 
    
   //Prevent MySQL Injections 
   $id  = stripslashes($id); 
   $user  = stripslashes($user); 
   $pass  = stripslashes($pass); 
   $rpass = stripslashes($rpass); 
   
   $id  = mysqli_real_escape_string($con, $id);  
   $user  = mysqli_real_escape_string($con, $user); 
   $pass  = mysqli_real_escape_string($con, $pass); 
   $rpass = mysqli_real_escape_string($con, $rpass); 
    
   //Check to see if the user left any space empty! 
   if($id == "" || $user == "" || $pass == "" || $rpass == "") 
   { 
      echo "Please fill in all the information!"; 
   } 
    
   else 
   { 
      //Check too see if the user's Passwords Matches! 
      if($pass != $rpass) 
      { 
         echo "Passwords do not match! Try Again"; 
      } 
       
      //CHECK TO SEE IF THE USERNAME IS TAKEN, IF NOT THEN ADD USERNAME AND PASSWORD INTO THE DB 
      else 
      { 
         //Query the DB 
         $query = mysqli_query($con,"SELECT * FROM members WHERE username = '$user'") or die("Can not query the TABLE!"); 
          
         //Count the number of rows. If a row exist, then the username exist! 
         $row = mysqli_num_rows($query); 
         if($row == 1) 
         { 
            echo "Sorry, but the username is already taken! Try again."; 
         } 
          
         //ADD THE USERNAME TO THE DB 
         else 
         { 
            $add = mysqli_query($con,"INSERT INTO members (id, username, password) VALUES ('$id', '$user' , '$pass') ") or die("Can't                Insert! "); 
			
            echo "Successful! <a href='members.php'> Click Here </a> to log In."; 
         } 
          
          
      }       

   } 
    
} 
?> 

<html> 
<table width="300" align="center" cellpadding="0" cellspacing="1" border="1px solid black"> 

<tr> 
<form name="register" method="post" action="register.php"> 
<td> 

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF"> 

<tr> 
<td colspan="3"><strong><center>Registration</center></strong></t
d> 
</tr> 
"
<tr> 
<td width="78">Uid</td> 
<td width="6">:</td> 
<td width="294"><input name="id" type="text" id="id"></td> 
</tr> 

<tr> 
<td width="78">Username</td> 
<td width="6">:</td> 
<td width="294"><input name="user" type="text" id="user"></td> 
</tr> 

<tr> 
<td>Password</td> 
<td>:</td> 
<td><input name="pass" type="password" id="pass"></td> 
</tr> 

<tr> 
<td>Repeat Password</td> 
<td>:</td> 
<td><input name="rpass" type="password" id="rpass"></td> 
</tr> 

<tr> 
<td></td> 
<td></td> 
<td><input type="submit" name="submit" value="Register"></td> 
</tr> 

</table> 
</td> 
</form> 
</tr> 
</table> 

</html> 