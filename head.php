
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php 
			require('pageTitle.php');
			setTitle($GLOBALS['page']);
			session_start(); 
		
		
			if(isset($_SESSION['username']) && $GLOBALS['page']==login.php){ 
			   header("Location: ."); //isset check to see if a variables has been 'set' 
			   echo'was here';
			}
		?>
		<?php require('style.css');?>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
	