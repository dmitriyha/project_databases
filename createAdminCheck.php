<?php
	require("config.php");
	session_start();  //Session start
	
	if((isset($_SESSION['username']) &&isset($_SESSION['type']) && isset($_POST['name of post field']) && $_POST['name of post field'] !=""){
	if($_SESSION['type']=="admin"){
		
		$dbh = new PDO('mysql:host='.$GLOBALS['host'].';dbname='.GLOBALS['members'], $GLOBALS ['username'], $GLOBALS['password']);
		$stmt=$dbh->prepare("INSERT INTO members(
							Password, user, fname, lname, address, postcode, city, user_type)
							VALUES (:user, :fname, :lname, :address, :postcode, :city, )
							")
		$stmt->bindParam(':user',$_POST['user']);
		$stmt->bindParam(':fname',$_POST['fname']);
		$stmt->bindParam(':lname',$_POST['lname']);
		$stmt->bindParam(':address',$_POST['address']);
		$stmt->bindParam(':postcode',$_POST['postcode']);
		$stmt->bindParam(':city',$_POST['city']);
		$stmt->bindParam(':user_type',$_POST['User_Type']);
		
		$query = mysqli_query($con,"SELECT * FROM members WHERE user = '$user'") or die("Can not query the TABLE!"); 
		
		
		if ($_POST['user']== "" || $_POST['fname']=="" || $_POST['lname']=="" || $_POST['address'] || $_POST['postcode'] || $_POST['city']){
		
		header("location: createAdmin.php?error=1");
		
		}else if ($_POST['pass'] != $_POST['rpass']){
					header("location: createAdmin.php?error=2");

				}
		else {$query = mysqli_query($con,"SELECT * FROM members WHERE user = '$user'") or die("Can not query the TABLE!"); 
				$row = mysqli_num_rows($query);
				if ($row == 1){
				header("location: createAdmin.php?error=3")
		}
?>