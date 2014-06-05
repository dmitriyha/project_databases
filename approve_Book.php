

	<?php 
		require('config.php');
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
				<?php
					require('showApproveable.php');
					show($_GET['start'],$page);
				?>
			</p>
		</div>
	</body>
</html>