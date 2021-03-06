<?php
	function search($search,$start,$file){
		$dbh = new PDO('mysql:host='.$GLOBALS ['host'].';dbname='.$GLOBALS ['db'], $GLOBALS ['username'],$GLOBALS['password']);
		
		$stmt = $dbh->prepare("SELECT * FROM `book` WHERE `Title` REGEXP :title AND `approved`=1");
		if($search==null){
			$stmt = $dbh->prepare("SELECT * FROM `book` WHERE approved=1 ");
		}
		$stmt->bindParam(':title', $search);
		$stmt->execute();
		
		$i=0;
		$max=$stmt->rowCount();
		$finalResult=$start+10;
		$pages=ceil($max/10);
		
		
		while($i<$finalResult){
			$row=$stmt->fetch();
			if($start<=$i && $finalResult>$i && $i<$max ){
				echo '<div id="text" class="box">';
				echo '<b>Title: </b>'.$row['Title'].'<br>';
				echo '<b>Publisher: </b>'.$row['Publisher'].'<br>';
				echo '<b>Author: </b>'.$row['Author'].'<br>';
				echo '<b>Category: </b>'.$row['Category'].'<br>';
				echo '<b>ISBN: </b>'.$row['ISBN'].'<br>';
				echo '<b>Year: </b>'.$row['Year'].'<br>';
				echo '<b>Price: </b>'.$row['Price'].' &#8364<br>';
				if($row['avgRating']>0){
					echo '<b>Average Raring: </b>'.$row['avgRating'].'<br>';
				}
				echo '<table cellpadding="5" cellspacing="1"><tr><td>';
				echo '<form name="review" method="post" action="view_Reviews.php">
					<input name="bookid" type="hidden" id="bookid" value="'.$row['bookid'].'">
					<input type="submit" name="submit" value="View Reviews">
					</form>';
				
				echo '</td>';
				if(isset($_SESSION['username'])){
					echo '<td><form name="review" method="post" action="review.php">
					<input name="bookid" type="hidden" id="bookid" value="'.$row['bookid'].'">
					<input type="submit" name="submit" value="Review">
					</form></td>';
				}
				echo '</table></tr>';
				echo '</div>';
			}
			$i++;
		}
		echo '<div id="text" class="searchNav">';
		
		if($start>0){
			echo '<a href="'.$file.'?search='.$search.'&start='.($start-10).'">&ltPrev</a>';
		}
		
		$i=1;
		while($i<=$pages){
			if(!((($start/10)+1) == $i)){
				echo '<a href="'.$file.'?search='.$search.'&start='.(($i-1)*10).'">'. $i .'</a>';
			}
			else{
				echo '<a>'.$i.'</a>';
			}
			$i++;
		}
		
		if(!(($start+10)>$max)){
			echo '<a href="'.$file.'?search='.$search.'&start='.($start+10).'">Next&gt</a>';
		}
		
		echo '</div>';
		
		$dbh=null;
	}
?>