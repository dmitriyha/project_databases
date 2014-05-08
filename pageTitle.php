<?php
	require ("members.php");
	function setTitle($file){
		echo '<title>';
		if($file == 'index.php'){
			echo 'Home';
		}
		else if($file == 'browse.php'){
			echo 'Browse';
		}
		else if($file == 'search.php'){
			echo 'Search';
		}
		else if($file == 'about.php'){
			echo 'About';
		}
		else{
			echo 'Enter a proper page title';
		}
		echo '</title>';
		
		
	}
?>