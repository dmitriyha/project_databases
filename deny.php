<?php
	require("config.php");
	session_start();  //Session start
	if(isset($_SESSION['type'])){
		if($_SESSION['type']=="admin"){
			$dbh = new PDO('mysql:host='.$GLOBALS ['host'].';dbname='.$GLOBALS ['db'], $GLOBALS ['username'],$GLOBALS['password']);
			
			$stmt=$dbh->prepare("DELETE FROM `book` WHERE bookid = :bookid");
			
			
			
			$stmt->bindParam(':bookid',$_POST['bookid']);
			$stmt->execute();
			header('location:approve_Book.php?start=0');
		}else{header('location:.');}
	}else{header('location:.');}
	
?>