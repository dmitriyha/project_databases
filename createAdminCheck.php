<?php
	require("config.php");
	session_start();  //Session start
	
	if(isset($_SESSION['username']) &&isset($_SESSION['type']) ){
		if($_SESSION['type']=="admin"){
			if ($_POST['user']== "" || $_POST['fname']=="" || $_POST['lname']=="" || $_POST['address']=="" || $_POST['postcode']=="" || $_POST['city']==""){
			
				header("location: createAdmin.php?error=1");
			
			}else if ($_POST['pass'] != $_POST['rpass']){
				header("location: createAdmin.php?error=2");

			}
			else{
				$dbh = new PDO('mysql:host='.$GLOBALS ['host'].';dbname='.$GLOBALS ['db'], $GLOBALS ['username'],$GLOBALS['password']);
				$stmt=$dbh->prepare("INSERT INTO members(
									Password, user, fname, lname, address, postcode, city, user_type)
									VALUES (:pass,:user, :fname, :lname, :address, :postcode, :city,:user_type )
									");
				$stmt->bindParam(':user',$_POST['user']);
				$stmt->bindParam(':fname',$_POST['fname']);
				$stmt->bindParam(':pass',$_POST['pass']);
				$stmt->bindParam(':lname',$_POST['lname']);
				$stmt->bindParam(':address',$_POST['address']);
				$stmt->bindParam(':postcode',$_POST['postcode']);
				$stmt->bindParam(':city',$_POST['city']);
				$stmt->bindParam(':user_type',$_POST['User_Type']);
				
				$stmt->execute(); 
				header("location: .");
			}
		}else{header("location: .");}
	}else{header("location: .");}
?>