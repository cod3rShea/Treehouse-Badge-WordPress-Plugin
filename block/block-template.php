<?php 
	function acf_block_treehouse_portfolio_callback() { ?>
		<?php 
			$what_is_your_treehouse_name = get_field('what_is_your_treehouse_name');
		?>
		<div class="treehouse-portfolio-container">
			<div class="treehouse-portfolio-user">
				<div class="loading-screen"><div></div><div></div><div></div></div>
			</div>
			<div class="treehouse-portfolio-content">
				<div class="loading-screen"><div></div><div></div><div></div></div>
			</div>
		</div>
		<script>
			let userName = "<?php echo $what_is_your_treehouse_name;?>";

			jQuery.get( `https://teamtreehouse.com/${userName}.json`, (data) => {
				console.log('you connected');
				console.log(data);

				const gatherUser = () => {
					let userName = data.name;
					let userImg = data.gravatar_url;
					let userURL = data.profile_url;

					let html = `<img src="${userImg}"> <a href="${userURL}" target="_BLANK"><h2> ${userName}</h2></a>`;
					jQuery(".treehouse-portfolio-user").append(html);
				}

				const gatherPoints = () => {
					const treeHousePoints = data.points;
					console.log(treeHousePoints[1]);
					for (const [key, value] of Object.entries(treeHousePoints).sort(([,a],[,b]) => b-a)) {
							let html = `<div class="point-portfolio-container"> ${key} ${value} </div>`;
							jQuery(".treehouse-portfolio-content").append(html);
					}
				}

				jQuery('.loading-screen').remove();
				gatherUser();
				gatherPoints();

			}).fail(function() {
				throw Error( "error" );
			});

		</script>
	<?php } 
?>