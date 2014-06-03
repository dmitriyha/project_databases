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
	
	
	
	
	
	
	
	/*
	
	
	// Round to the nearest 0.5
	function roundToNearestHalf($number){
		return round($number * 2) / 2;  
	}

	// Instantiate database connection
	$db = new mysqli('localhost', 'root', 'password', 'rating');

	// Check that the connection worked
	if($db->connect_errno > 0){
		error('Unable to connect to database [' . $db->connect_error . ']');
	}

	// Verify that we have enough post items
	if(count($_POST) > 1){
		error('Too many post items received.');
	}

	// Check that the rating was entered
	if(!isset($_POST['rating']) || $_POST['rating'] == ''){
		error('No rating value provided.');
	}

	// Valid the rating amount that was entered.
	if(!preg_match("/[0-5](?:\.5)/", $_POST['rating']) && $_POST['rating'] < 0 && $_POST['rating'] > 5){
		error('Invalid rating provided.');
	}

	// Check if the user has rated before
	$sql = "
		
	"

	if(!$result = $db->query($sql)){
		error('There was an error running the query [' . $db->error . ']');
	}

	// Tell the user that they have voted already.
	if($result->num_rows){
		error('That book has been reviewed.');
	}

	// Store the user's rating.
	$rating = $db->escape_string($_POST['rating']);
	
	//TODO change this shit
	

	if(!$db->query($sql)){
		error('Unable to insert rating to database [' . $db->error . ']');
	}

	// Get the average rating
	$sql = <<<SQL
		SELECT AVG(`rating`) AS `rating`
		FROM `review`
	SQL;

	if(!$result = $db->query($sql)){
		error('There was an error running the query [' . $db->error . ']');
	}

	// Fetch the average rating
	$data = $result->fetch_assoc();

	$rating = $data['rating'];*/
?>