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
					require('showReviews.php');
					show($_POST['bookid']);
					
				?>
			</p>
		</div>
	</body>
</html>