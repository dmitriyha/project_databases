
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
					<form name="review" method="post" action="reviewDBScript.php">
					<td>

					<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

					<tr>
					<td colspan="3"><strong><center>Review Form </center></strong></td>
					</tr>

					<tr>
					<td width="294"><input name="bookid" type="hidden" id="bookid" value="<?php echo $_POST['bookid'];?>"></td>
					</tr>

					<tr>
					<td>Review:</td>
					<td>:</td>
					<td><input name="review" type="text" id="review"></td>
					</tr>
					
					<tr>
					<td>Rating:</td>
					<td>:</td>
					<td><select name="rating">
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						</select> </td>
					</tr>
					
					
					<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="submit" value="Submit"></td>
					</tr>
					<?php
						if(isset($_GET['error'])){
							if($_GET['error']==1){
								echo'<td colspan="3"><strong><center>Book already reviewed. </center></strong></td>';
							}
							else if($_GET['error']==2){
								echo'<td colspan="3"><strong><center>Review feild empty </center></strong></td>';
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