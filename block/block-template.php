<?php 
	function acf_block_treehouse_portfolio_callback() { ?>
		<?php 
			$what_is_your_treehouse_name = get_field('what_is_your_treehouse_name');
			echo  "<span class='username' style='display:none;'>$what_is_your_treehouse_name</span>";
		?>
		<div class="treehouse-portfolio-container">
			<div class="treehouse-portfolio-user">
				<div class="loading-screen"><div></div><div></div><div></div></div>
			</div>
			<div class="treehouse-portfolio-content">
				<div class="treehouse-portfolio-points-container">
					<h2></h2>
					<ul class="treehouse-portfolio-points"></ul>
				</div>
				<div class="loading-screen"><div></div><div></div><div></div></div>
			</div>
			<div class="treehouse-portfolio-badges">
				<div class="loading-screen"><div></div><div></div><div></div></div>
			</div>
		</div>
		<?php 
			$myScript =  plugins_url( 'js/badgecalls.js', dirname(__FILE__) );
		?>
		<script type="text/javascript" src="<?php echo $myScript; ?>"></script>
	<?php } 
?>