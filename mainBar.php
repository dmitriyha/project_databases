<?php
	
	function setTabs($file){
		echo'<div id="mainBar"><ul>';
		
		if($file =='home.php'){
			echo '<li><a href="home.php" class="active">Home</a></li>';
		}
		else{
			echo '<li><a href="home.php">Home</a></li>';
		}
		
		if($file =='browse.php'){
			echo '<li><a href="browse.php" class="active">Browse</a></li>';
		}
		else{
			echo '<li><a href="browse.php">Browse</a></li>';
		}
		if($file =='about.php'){
			echo '<li><a href="about.php" class="active">About</a></li>';
		}
		else{
			echo '<li><a href="about.php">About</a></li>';
		}
		echo'</ul></div>';
	}
	
?>