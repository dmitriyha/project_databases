 
<?php 
	//Information to connect to your MySQL Server AND DB 
	$host="localhost"; 
	$username="root"; 
	$password =""; 
	$db="proj_databases"; 
	 
	//Connect to MySQL Server 
	$con = mysqli_connect($host,$username,$password,$db) or die("Error conecting to server."); 
	 
 ?> 
 