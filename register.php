
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
   $lname = $_POST['lname'];
   $address = $_POST['address'];
   $postcode = $_POST['postcode'];
   $city = $_POST['city'];

    
   //Prevent MySQL Injections 
   $id  = stripslashes($id); 
   $user  = stripslashes($user); 
   $pass  = stripslashes($pass); 
   $rpass = stripslashes($rpass);
   $lname = stripslashes($lname); 
   $address = stripslashes($address); 
   $postcode = stripslashes($postcode); 
   $city = stripslashes($city);  
   
   $id  = mysqli_real_escape_string($con, $id);  
   $user  = mysqli_real_escape_string($con, $user); 
   $pass  = mysqli_real_escape_string($con, $pass); 
   $rpass = mysqli_real_escape_string($con, $rpass);
   $lname  = mysqli_real_escape_string($con, $lname); 
   $address  = mysqli_real_escape_string($con, $address); 
   $postcode = mysqli_real_escape_string($con, $postcode); 
   $city = mysqli_real_escape_string($con, $city); 
    
   //Check to see if the user left any space empty! 
   if($id == "" || $user == "" || $pass == "" || $rpass == "" || $lname == "" 
      || $address == "" || $postcode == "" || $city == "") 
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
            $add = mysqli_query($con,"INSERT INTO members (id, username, password, lname, address, postcode, city) VALUES ('$id', '$user' , '$pass', '$lname',
            '$address', '$postcode', '$city')") or die("Cant insert data"); 
			
            echo "Successful! <a href='members.php'> Click Here </a> to log In."; 
         } 
          
          
      }       

   } 
    
} 
?> 

<html> 
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="cuerpo">



<table class="table1" width="300" align="center" cellpadding="0" cellspacing="1" border="1px solid black"> 

<tr> 
<form name="register" method="post" action="register.php"> 
<td> 

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF"> 

<tr> 
<td colspan="3"><strong><center>Registration</center></strong></t
d> 
</tr> 

<tr> 
<td width="78">UserID/*For testing purposes only*/</td> 
<td width="6">:</td> 
<td width="294"><input name="id" type="text" id="id"></td> 
</tr> 

<tr> 
<td width="78">Username/First Name</td> 
<td width="6">:</td> 
<td width="294"><input name="user" type="text" id="user"></td> 
</tr> 

<tr> 
<td>Last Name</td> 
<td>:</td> 
<td><input name="lname" type="text" id="lname"></td> 
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
<td>Address</td> 
<td>:</td> 
<td><input name="address" type="text" id="address"></td> 
</tr> 

<tr> 
<td>ZIP code/Post Code</td> 
<td>:</td> 
<td><input name="postcode" type="text" id="postcode"></td> 
</tr> 

<tr> 
<td>City</td> 
<td>:</td> 
<td><input name="city" type="text" id="city"></td> 
</tr> 

<tr> 
<td></td> 
<td></td> 
<td><input type="submit" name="submit" value="Register"></td> 
</tr> 

</table> 

<div class="divImg">
   
   <img src="http://www.lesscakemorefrosting.com/wp-content/uploads/2012/03/OpenBook800.jpg" />
 

</div>

</td> 
</form> 
</tr> 
</table> 

</body>

</html> 