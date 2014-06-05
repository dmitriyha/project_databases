<?php
	require("config.php");
	session_start();  //Session start
	
	if(isset($_SESSION['username'])){ 
		if($_SESSION['type']=="pub"){
			if($_POST['isbn']!=""&& $_POST['title']!=""&&
				$_POST['author']!=""&&$_POST['category']!=""&&
				$_POST['year']!=""&&$_POST['price']!=""&&
				$_POST['abstract']!=""&&$_POST['description']){
								
				$dbh = new PDO('mysql:host='.$GLOBALS ['host'].';dbname='.$GLOBALS ['db'], $GLOBALS ['username'],$GLOBALS['password']);
				$stmt=$dbh->prepare("INSERT INTO `book`(`ISBN`, `Title`, `Author`,`Publisher` ,`Category`, `Year`, `Price`, `Abstract`, `Description`) 
				VALUES (:isbn,:title,:author,:pub,:category,:year,:price,:abstract,:description)");
				
				$stmt->bindParam(':isbn', $_POST['isbn']);
				$stmt->bindParam(':title',$_POST['title']);
				$stmt->bindParam(':author',$_POST['author']);
				$stmt->bindParam(':pub',$_SESSION['username']);
				$stmt->bindParam(':category',$_POST['category']);
				$stmt->bindParam(':year',$_POST['year']);
				$stmt->bindParam(':price',$_POST['price']);
				$stmt->bindParam(':abstract',$_POST['abstract']);
				$stmt->bindParam(':description',$_POST['description']);
				$stmt->execute();
				header("location: book.php?success=1");
			}else{ header("location: book.php?error=1");}
		} 
		
		else{header("location: ."); }
	}else{header("location: ."); }
?>