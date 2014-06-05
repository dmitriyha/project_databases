<?php 
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
					<table class="table1" width="300" align="center" cellpadding="0" cellspacing="1" border="1px solid black"> 

					<tr> 
					<form name="register" method="post" action="submitBook.php"> 
					<td> 

					<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF"> 

					<tr> 
					<td colspan="3"><strong><center>Submit a book</center></strong></td> 
					</tr>  

					<tr> 
					<td width="78">Title</td> 
					<td width="6">:</td> 
					<td width="294"><input name="title" type="text" id="title"></td> 
					</tr> 
					
					<tr> 
					<td width="78">ISBN</td> 
					<td width="6">:</td> 
					<td width="294"><input name="isbn" type="text" id="isbn"></td> 
					</tr> 
					
					<tr> 
					<td>Author</td> 
					<td>:</td> 
					<td><input name="author" type="text" id="author"></td> 
					</tr> 

					<tr> 
					<td>Category</td> 
					<td>:</td> 
					<td><input name="category" type="text" id="category"></td> 
					</tr> 

					<tr> 
					<td>Year</td> 
					<td>:</td> 
					<td><input name="year" type="text" id="year"></td> 
					</tr> 



					<tr> 
					<td>Price</td> 
					<td>:</td> 
					<td><input name="price" type="text" id="price"></td> 
					</tr> 

					<tr> 
					<td>Abstract</td> 
					<td>:</td> 
					<td><input name="abstract" type="text" id="abstract"></td> 
					</tr> 

					<tr> 
					<td>Description</td> 
					<td>:</td> 
					<td><input name="description" type="text" id="description"></td> 
					</tr> 

					<tr> 
					<td></td> 
					<td></td> 
					<td><input type="submit" name="submit" value="Submit"></td> 
					</tr> 
					
					<?php
						if(isset($_GET['error'])){
							if($_GET['error']==1){
								echo'<td colspan="3"><strong><center>Fill all fields please </center></strong></td>';
							}
							
						}
						else if(isset($_GET['success'])){
							echo'<td colspan="3"><strong><center>Successfully submitted a book!!! </center></strong></td>';
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