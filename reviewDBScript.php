<?php
	require("config.php");
	session_start();  //Session start
	
	if(isset($_SESSION['username']) && isset($_POST['bookid']) && $_POST['review'] !=""){ 
		$dbh = new PDO('mysql:host='.$GLOBALS ['host'].';dbname='.$GLOBALS ['db'], $GLOBALS ['username'],$GLOBALS['password']);
		$stmt=$dbh->prepare("SELECT userid FROM `review` WHERE userid = 
							(select userid from members where user=:user) 
							and bookid=:bookid ");
		
		$stmt->bindParam(':user', $_SESSION['username']);
		$stmt->bindParam(':bookid',$_POST['bookid']);
		$stmt->execute();
		
		$results =$stmt->fetch(PDO::FETCH_ASSOC);
		
		if(empty($results)){
			$stmt = $dbh->prepare("insert into review (bookid,userid,review,rating) 
			values (:bookid,(select `userid` from members where user=:user),:review,:rating);");
			
			$stmt->bindParam(':bookid',$_POST['bookid']);
			$stmt->bindParam(':user', $_SESSION['username']);
			$stmt->bindParam(':review',$_POST['review']);
			$stmt->bindParam(':rating',$_POST['rating']);
			$stmt->execute();
			
			$stmt = $dbh->prepare("update book
			set avgRating=
				(select AVG(rating) from
					(select rating 
					from review 
					where bookid=:bookid) 
				as z) 
			where bookid=:bookid"); 
			$stmt->bindParam(':bookid',$_POST['bookid']);
			$stmt->execute();
		}
		else{header("location: review.php?error=1"); }
	} 
	
	else{header("location: review.php?error=2"); }
	
?>