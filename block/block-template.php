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
				<div class="treehouse-portfolio-points"></div>
				<div class="loading-screen"><div></div><div></div><div></div></div>
			</div>
			<div class="treehouse-portfolio-badges">
				<div class="loading-screen"><div></div><div></div><div></div></div>
			</div>
		</div>
		<script>
			let userName = "<?php echo $what_is_your_treehouse_name;?>";

			jQuery.get( `https://teamtreehouse.com/${userName}.json`, (data) => {
				console.log('you connected');
				// console.log(data.badges);
				
				const gatherUser = () => {
					let userName = data.name;
					let userImg = data.gravatar_url;
					let userURL = data.profile_url;
					let html = `<img src="${userImg}"> <a href="${userURL}" target="_BLANK"><h2> ${userName}</h2></a>`;

					jQuery(".treehouse-portfolio-user").append(html);
				}

				const gatherPoints = () => {
					const treeHousePoints = data.points;
					let i = 0;
					for (const [key, value] of Object.entries(treeHousePoints).sort(([,a],[,b]) => b-a)) {
						let html = `<div class="point-portfolio-container"> ${key} ${value} </div>`;
						if (i < 6) {
							jQuery(".treehouse-portfolio-points").append(html);
						}
						i++;
					}
				
				}

				const gatherBadges = () => {
					let badges = data.badges;
					let date  = new Date();
					console.log(badges);
					for (i = 0; i < badges.length; i++ ) {
						let html = `
						<div class="treehouse-portfolio-badge">
							<div class="treehouse-portfolio-badge-content">
								<strong>Achievement</strong>
								<p>${ badges[i].name }</p>
								<div>
									<strong>
										Achieved
									</strong>
									<p>
										${ date.toLocaleDateString("en-US", badges[i].earned_date) }
									</p>
								</div>
							</div> 
							<div class="treehouse-portfolio-badge-image">
								<img src="${badges[i].icon_url}" loading="lazy" /> 
							</div> 
						</div>`;

						jQuery(".treehouse-portfolio-badges").append(html);
					}
				}

				jQuery('.loading-screen').remove();
				gatherUser();
				gatherPoints();
				gatherBadges();

			}).fail(function() {
				throw Error( "error" );
			});

		</script>
	<?php } 
?>