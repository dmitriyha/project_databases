<?php
	
	function setTabs($file){
		echo'<div id="mainBar"><ul>';
		
		if($file =='index.php'){
			echo '<li><a href="." class="active">Home</a></li>';
		}
		else{
			echo '<li><a href=".">Home</a></li>';
		}
		
		if($file =='browse.php'){
			echo '<li><a href="browse.php?start=0" class="active">Browse</a></li>';
		}
		else{
			echo '<li><a href="browse.php?start=0">Browse</a></li>';
		}
		if($file =='about.php'){
			echo '<li><a href="about.php" class="active">About</a></li>';
		}
		else{
			echo '<li><a href="about.php">About</a></li>';
		}
		
		
		if (!isset($_SESSION['username']) && !isset($_SESSION['type'])){
			if($file =='login.php'){
				echo '<li><a href="about.php" class="active">Log In</a></li>';
			}
			else{
				echo '<li><a href="login.php">Log In</a></li>';
			}
			if($file =='register.php'){
				echo '<li><a href="register.php" class="active">Register</a></li>';
			}
			else{
				echo '<li><a href="register.php">Register</a></li>';
			}
		}
		else{
			if($_SESSION['type']=="admin"){
				if($file =='createAdmin.php'){
					echo '<li><a href="createAdmin.php" class="active">Create special user</a></li>';
				}
				else{
					echo '<li><a href="createAdmin.php">Create special user</a></li>';
				}
				if($file =='users.php'){
					echo '<li><a href="users.php" class="active">User Control</a></li>';
				}
				else{
					echo '<li><a href="users.php">User Control</a></li>';
				}
			}
			echo '<li><a href="logout.php">Log Out</a></li>';
			
		}
		echo'</ul></div>';
		
	}
	
?>