<?php 
	function acf_block_treehouse_portfolio_callback() { ?>
		<?php 
			$what_is_your_treehouse_name = get_field('what_is_your_treehouse_name');
		?>
		<div class="treehouse-portfolio-container">
			<div class="loading-screen"><div></div><div></div><div></div></div>
		</div>
		<script>
			let userName = "<?php echo $what_is_your_treehouse_name;?>";

			jQuery.get( `https://teamtreehouse.com/${userName}.json`, (data) => {
				console.log('you connected');
				console.log(data);
				const gatherPoints = () => {
					const treeHousePoints = data.points;
					for (const [key, value] of Object.entries(treeHousePoints)) {
							let html = `<div class="point-portfolio-container"> ${key} ${value} </div>`;
							jQuery(".treehouse-portfolio-container").append(html);
					}
				}
				gatherPoints();

			}).fail(function() {
				throw Error( "error" );
			});

		</script>
	<?php } 
?>