
<?php 


require "config.php"; //Connection Script

//Check to see if the user is logged in. 


$page=basename(__FILE__);
require('head.php');

 

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
      echo "Please fill in all the information!"; 
   } 
    
   //Check to see if the username AND password MATCHES the username AND password in the DB 
   else 
   { 
      $query = mysqli_query($con,"SELECT * FROM members WHERE fname = '$user' and password = '$pass'") or die("Can't reach DB."); 
      $count = mysqli_num_rows($query); 
       
      if($count == 1){ 
         //YES WE FOUND A MATCH! 
         $_SESSION['username'] = $user; //Create a session for the user! 
		 header("Location: .");
      } 
       
      else{ 
         echo "Username and Password do not match, please try again"; 
      } 
   } 
    
} 

?> 

	</head>
	
	<body>
		<?php 
			require('banner.php');
			require('mainBar.php');
			setTabs(basename(__FILE__));
		?>
		<div id="text">
			<p id="text">
				<div id="text" class="box">
					<table width="300" align="center" cellpadding="0" cellspacing="1" border="1px solid black">

					<tr>
					<form name="register" method="post" action="login.php">
					<td>

					<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

					<tr>
					<td colspan="3"><strong><center>Login </center></strong></td>
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
					<td></td>
					<td></td>
					<td><input type="submit" name="submit" value="Login"></td>
					</tr>

					</table>
					</td>
					</form>
					</tr>
					</table> 
				</div>
			</p>
		</div>
	</body>
</html>