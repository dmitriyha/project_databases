
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php 
			require('pageTitle.php');
			setTitle($GLOBALS['page']);
			session_start(); 
		
		
			if(isset($_SESSION['username']) && ($GLOBALS['page']=='login.php' || $GLOBALS['page']=='register.php'||$GLOBALS['page']=='users.php'||$GLOBALS['page']=='createAdmin.php')){ 
				if($_SESSION['type']!='admin' && ($GLOBALS['page']=='users.php'||$GLOBALS['page']=='createAdmin.php')){
					header("Location: .");
				}
				else if($GLOBALS['page']=='login.php' || $GLOBALS['page']=='register.php'){
					header("Location: ."); //isset check to see if a variables has been 'set' 
				}
			}
			if(!isset($_SESSION['username']) && ($GLOBALS['page']=='review.php'||$GLOBALS['page']=='users.php'||$GLOBALS['page']=='createAdmin.php')){ 
			   header("Location: ."); //isset check to see if a variables has been 'set' 
			}
			
		?>
		<?php require('style.css');?>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
	</head>