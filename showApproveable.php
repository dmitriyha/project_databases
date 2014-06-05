<?php
	function show($start,$file){
		if(isset($_SESSION['type'])){
			if($_SESSION['type']=="admin"){
				$dbh = new PDO('mysql:host='.$GLOBALS ['host'].';dbname='.$GLOBALS ['db'], $GLOBALS ['username'],$GLOBALS['password']);
				
				
				$stmt = $dbh->prepare("SELECT * FROM `book` WHERE approved=0 ");
				
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
						
						echo '<table cellpadding="5" cellspacing="1"><tr><td>';
						echo '<form name="review" method="post" action="approve.php">
							<input name="bookid" type="hidden" id="bookid" value="'.$row['bookid'].'">
							<input type="submit" name="submit" value="Approve">
							</form>';
						
						echo '</td>';
						echo '<td><form name="review" method="post" action="deny.php">
							<input name="bookid" type="hidden" id="bookid" value="'.$row['bookid'].'">
							<input type="submit" name="submit" value="Deny">
							</form></td>';
						
						echo '</table></tr>';
						echo '</div>';
					}
					$i++;
				}
				echo '<div id="text" class="searchNav">';
				
				if($start>0){
					echo '<a href="'.$file.'?start='.($start-10).'">&ltPrev</a>';
				}
				
				$i=1;
				while($i<=$pages){
					if(!((($start/10)+1) == $i)){
						echo '<a href="'.$file.'?start='.(($i-1)*10).'">'. $i .'</a>';
					}
					else{
						echo '<a>'.$i.'</a>';
					}
					$i++;
				}
				
				if(!(($start+10)>$max)){
					echo '<a href="'.$file.'&start='.($start+10).'">Next&gt</a>';
				}
				
				echo '</div>';
				
				$dbh=null;
			}
		}
	}
?>