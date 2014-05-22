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
		$user  = $_POST['user']; 
		$pass  = $_POST['pass']; 
		$rpass = $_POST['rpass'];
		$fname  = $_POST['fname']; 
		$lname = $_POST['lname'];
		$address = $_POST['address'];
		$postcode = $_POST['postcode'];
		$city = $_POST['city'];


		//Prevent MySQL Injections 
		$user  = stripslashes($user); 
		$pass  = stripslashes($pass); 
		$rpass = stripslashes($rpass);
		$fname = stripslashes($fname); 
		$lname = stripslashes($lname); 
		$address = stripslashes($address); 
		$postcode = stripslashes($postcode); 
		$city = stripslashes($city);  

		$user  = mysqli_real_escape_string($con, $user); 
		$pass  = mysqli_real_escape_string($con, $pass); 
		$rpass = mysqli_real_escape_string($con, $rpass);
		$fname  = mysqli_real_escape_string($con, $fname); 
		$lname  = mysqli_real_escape_string($con, $lname); 
		$address  = mysqli_real_escape_string($con, $address); 
		$postcode = mysqli_real_escape_string($con, $postcode); 
		$city = mysqli_real_escape_string($con, $city); 

		//Check to see if the user left any space empty! 
		if($user == "" || $pass == "" || $rpass == ""|| $fname == "" || $lname == "" 
		|| $address == "" || $postcode == "" || $city == "") 
		{ 
			header("Location: register.php?error=1");
		} 

		else 
		{ 
			//Check too see if the user's Passwords Matches! 
			if($pass != $rpass) 
			{ 
				header("Location: register.php?error=2");
			} 

			//CHECK TO SEE IF THE USERNAME IS TAKEN, IF NOT THEN ADD USERNAME AND PASSWORD INTO THE DB 
			else 
			{ 
				//Query the DB 
				$query = mysqli_query($con,"SELECT * FROM members WHERE user = '$user'") or die("Can not query the TABLE!"); 

				//Count the number of rows. If a row exist, then the username exist! 
				$row = mysqli_num_rows($query); 
				if($row == 1) 
				{ 
					header("Location: register.php?error=3");
				} 

				//ADD THE USERNAME TO THE DB 
				else 
				{ 
					$add = mysqli_query($con,"INSERT INTO members (Password,user,fname, lname, address, postcode, city) VALUES ('".$pass."','".$user."' ,'".$fname."', '".$lname."',
					'".$address."', '".$postcode."', '".$city."')") or die("Cant insert data"); 
					
					header("Location: register.php?success=1");
				} 


			}       

		} 

	} 
?> 