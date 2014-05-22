
<?php 


require "config.php"; //Connection Script

//Check to see if the user is logged in. 


$page=basename(__FILE__);
require('head.php');

 

?> 
	
	<body>
		<?php 
			require('banner.php');
			require('mainBar.php');
			setTabs(basename(__FILE__));
		?>
		<div id="text">
			<p id="text">
				<div id="text" class="box">
					<table width="300" align="center" cellpadding="0" cellspacing="1" border="1px solid black">

					<tr>
					<form name="register" method="post" action="loginCheck.php">
					<td>

					<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

					<tr>
					<td colspan="3"><strong><center>Login </center></strong></td>
					</tr>

					<tr>
					<td width="78">Username</td>
					<td width="6">:</td>
					<td width="294"><input name="user" type="text" id="user"></td>
					</tr>

					<tr>
					<td>Password</td>
					<td>:</td>
					<td><input name="pass" type="password" id="pass"></td>
					</tr>

					<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="submit" value="Login"></td>
					</tr>
					<?php
						if(isset($_GET['error'])){
							if($_GET['error']==1){
								echo'<td colspan="3"><strong><center>Fill all fields please </center></strong></td>';
							}
							else if($_GET['error']==2){
								echo'<td colspan="3"><strong><center>Username or password wrong </center></strong></td>';
							}
						}
					?>
					</table>
					</td>
					</form>
					</tr>
					</table> 
				</div>
			</p>
		</div>
	</body>
</html>