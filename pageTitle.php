<?php
	function setTitle($file){
		echo '<title>';
		if($file == 'index.php'){
			echo 'Home - How was IT?';
		}
		else{
			echo str_replace("_"," ",ucfirst(substr($file, 0, strpos($file, ".")))).' - How was IT?';
		}
		echo '</title>';
	}
?>