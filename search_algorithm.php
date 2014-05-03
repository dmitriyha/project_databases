<?php
	function search($search,$start){
		$dbh = new PDO('mysql:host=localhost;dbname=proj_databases', "root");
		
		$stmt = $dbh->prepare("SELECT * FROM `book` WHERE `Title` REGEXP :title");
		if($serch==null){
			$stmt = $dbh->prepare("SELECT * FROM `book`");
		}
		$stmt->bindParam(':title', $search);
		$stmt->execute();
		
		$i=0;
		$max=$stmt->rowCount();
		$finalResult=$start+10;
		$pages=ceil($max/10);
		
		while($i<$max){
			$row=$stmt->fetch();
			if($start<=$i && $finalResult>$i){
				echo '<div id="text" class="box">';
				echo '<b>Title: </b>'.$row['Title'].'<br>';
				echo '<b>Publisher: </b>'.$row['Publisher'].'<br>';
				echo '<b>Author: </b>'.$row['Author'].'<br>';
				echo '<b>Category: </b>'.$row['Category'].'<br>';
				echo '<b>ISBN: </b>'.$row['ISBN'].'<br>';
				echo '<b>Year: </b>'.$row['Year'].'<br>';
				echo '<b>Price: </b>'.$row['Price'].' e<br>';
				echo '</div>';
			}
			$i++;
		}
		echo '<div id="text" class="searchNav">';
		
		if($start>0){
			echo '<a href="search.php?search='.$search.'&start='.($start-10).'">&ltPrev</a>';
		}
		
		$i=1;
		while($i<=$pages){
			if(!((($start/10)+1) == $i)){
				echo '<a href="search.php?search='.$search.'&start='.(($i-1)*10).'">'. $i .'</a>';
			}
			else{
				echo '<a>'.$i.'</a>';
			}
			$i++;
		}
		
		if(!(($start+10)>$max)){
			echo '<a href="search.php?search='.$search.'&start='.($start+10).'">Next&gt</a>';
		}
		
		echo '</div>';
		
		$dbh=null;
	}
?>