<?php
	function setTitle($file){
		echo '<title>';
		if($file == 'index.php'){
			echo 'Home - Review-a-book';
		}
		else{
			echo ucfirst(substr($file, 0, strpos($file, "."))).' - Review-a-book';
		}
		echo '</title>';
	}
?>