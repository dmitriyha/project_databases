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
					<?php require ('showUsers.php');?>
				</div>
			</p>
		</div>
	</body>
</html>