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
					<form name="createAdmin" method="post" action="createAdminCheck.php">
					<td>
					
					<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
					
						<tr>
						<td colspan="3"><strong><center>Create a new admin or publisher</center></strong></td>
						</tr>
						
						<tr> 
						<td width="78">Username</td> 
						<td width="6">:</td> 
						<td width="294"><input name="user" type="text" id="user"></td> 
						</tr> 
						
						<tr> 
						<td width="78">Fist Name</td> 
						<td width="6">:</td> 
						<td width="294"><input name="fname" type="text" id="fname"></td> 
						</tr> 
						
						<tr> 
						<td>Last Name</td> 
						<td>:</td> 
						<td><input name="lname" type="text" id="lname"></td> 
						</tr> 
						
						<tr> 
						<td>Password</td> 
						<td>:</td> 
						<td><input name="pass" type="password" id="pass"></td> 
						</tr> 
						
						<tr> 
						<td>Repeat Password</td> 
						<td>:</td> 
						<td><input name="rpass" type="password" id="rpass"></td> 
						</tr> 
						
						<tr> 
						<td>Address</td> 
						<td>:</td> 
						<td><input name="address" type="text" id="address"></td> 
						</tr> 

						<tr> 
						<td>ZIP code/Post Code</td> 
						<td>:</td> 
						<td><input name="postcode" type="text" id="postcode"></td> 
						</tr> 

						<tr> 
						<td>City</td> 
						<td>:</td> 
						<td><input name="city" type="text" id="city"></td> 
						</tr> 
						
						<tr>
						<td>User Type</td>
						<td>:</td>
						<td><select name="User_Type">
							<option value="admin">Administrator</option>
							<option value="pub">Publisher</option>
						</td>
						</tr>
						
						<tr> 
						<td></td> 
						<td></td> 
						<td><input type="submit" name="submit" value="Make Admin"></td> 
						</tr>
						
						<?php
							if(isset($_GET['error'])){
								if($_GET['error']==1){
									echo'<td colspan="3"><strong><center>Not all Fields are filled in</center></strong></td>';
								}
								else if($_GET['error']==2){
									echo'<td colspan="3"><strong><center>Passwords did not match </center></strong></td>';
								}
								else if($_GET['error']==3){
									echo'<td colspan="3"><strong><center>Username not found</center></strong></td>';
								}
							}
							else if(isset($_GET['success'])){
								echo'<td colspan="3"><strong><center>Successfully made a new admin Click <a href=login.php>here</a> to login </center></strong></td>';
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