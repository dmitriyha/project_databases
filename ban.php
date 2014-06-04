<?php
	require("config.php");
	session_start();  //Session start
	if(isset($_SESSION['type'])){
		if($_SESSION['type']=="admin"){
			$dbh = new PDO('mysql:host='.$GLOBALS ['host'].';dbname='.$GLOBALS ['db'], $GLOBALS ['username'],$GLOBALS['password']);
			if($_GET['type']=="ban"){
				$stmt=$dbh->prepare("UPDATE `members` SET `banned` = '1' WHERE `userid` = :userid;");
			}
			else{
				$stmt=$dbh->prepare("UPDATE `members` SET `banned` = '0' WHERE `userid` = :userid;");
			}
			$stmt->bindParam(':userid',$_GET['userid']);
			$stmt->execute();
			header('location:users.php');
		}else{header('location:.');}
	}else{header('location:.');}
	
?>