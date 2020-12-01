<?php 
	function acf_block_treehouse_portfolio_callback() { ?>
		<?php 
			$what_is_your_treehouse_name = get_field('what_is_your_treehouse_name');
			echo $what_is_your_treehouse_name;
		?>
		<div class="treehouse-portfolio-container">
			<div class="loading-screen"><div></div><div></div><div></div></div>
		</div>
	<?php } 
?>