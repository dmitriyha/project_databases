<?php
	require("config.php");
	
	$dbh = new PDO('mysql:host='.$GLOBALS ['host'].';dbname='.$GLOBALS ['db'], $GLOBALS ['username'],$GLOBALS['password']);
	
	
	
	
	$stmt=$dbh->prepare("SELECT userid,user,banned,user_type FROM `members`");
	$stmt->execute();
	
	
	
	echo'<table width="400" align="center" cellpadding="0" cellspacing="1" border="1px solid black">
					
	<tr>
	<form name="users" method="post" action="createAdminCheck.php">
	<td>
	
	<table width="100%" border="1" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
		<tr><td>Name</td>
		<td>User Type</td>
		<td>Status</td>
		<td>Action</td>
		';
	;
	for($i=0;$i<$stmt->rowCount();$i++){
		$row=$stmt->fetch();
		if($row['banned']){
			$status="banned";
			$action='<a href="ban.php?userid='.$row['userid'].'&type=unban">unban</a>';
		}
		else{
			$status="not banned";
			$action='<a href="ban.php?userid='.$row['userid'].'&type=ban">ban</a>';
		}
		
		
		echo '<tr><td>'.$row['user'].'</td>
		<td>'.$row['user_type'].'</td>
		<td>'.$status.'</td>
		<td>'.$action.'</td>
		';
		
		echo '</tr>';
	}
	echo'
	</table>
		
	</td> 
	</form> 
	</tr> 
	</table> ';

?>