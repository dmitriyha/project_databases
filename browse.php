
<?php 
	$page=basename(__FILE__);
	require('head.php');
?>
	</head>
	<body>
		<?php 
			require('banner.php');
			require('mainBar.php');
			setTabs(basename(__FILE__));
		?>
		<div id="text">
			<p id="text">
				<?php
					require('search_algorithm.php');
					search("",$_GET['start'],basename(__FILE__));
					
				?>
			</p>
		</div>
	</body>
</html>