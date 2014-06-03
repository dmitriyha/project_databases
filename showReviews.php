<?php
	function show($bookid){
		$dbh = new PDO('mysql:host='.$GLOBALS ['host'].';dbname='.$GLOBALS ['db'], $GLOBALS ['username'],$GLOBALS['password']);
		
		$stmt = $dbh->prepare("SELECT * FROM `review` WHERE `bookid` = :bookid  ORDER BY `review`.`reviewid` DESC");
		$stmt->bindParam(':bookid', $bookid);
		$stmt->execute();
		
		$i=0;
		$max=$stmt->rowCount();
		
		$pages=ceil($max/10);
		
		while($i<$max){
			$row=$stmt->fetch();
			if(0<=$i && $i<$max){
				$stmtName = $dbh->prepare("SELECT user FROM `members` WHERE `userid` = ".$row['userid']);
				$stmtName->execute();
				$name = $stmtName->fetch();
				echo '<div id="text" class="box">';
				echo '<b>User: </b>'.$name[0].'<br>';
				echo '<b>Review: </b>'.$row['Review'].'<br>';
				echo '<b>Rating: </b>'.$row['rating'].'<br>';
				
				echo '</div>';
			}
			$i++;
		}
		
		$dbh=null;
	}
?>