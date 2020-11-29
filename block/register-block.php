<?php 
      function acf_block_treehouse_portfolio_function() {
      	if( ! function_exists('acf_register_block') )
      		return;
      	

      	acf_register_block( array(
                  'name'              => 'acf-block-treehouse-portfolio_',
                  'title'             => __('ACF Block TreeHouse Portfolio'),
                  'description'       => __('This is a ACF Block Boilerplate '),
                  'render_callback'   => 'acf_block_treehouse_portfolio_callback',
                  'category'          => 'formatting',
                  'icon'              => 'images-alt',
                  'mode'              => 'preview',
                  'keywords'          => array( 'TreeHouse', 'Tree', 'Portfolio')
      	));

      }
      add_action('acf/init', 'acf_block_treehouse_portfolio_function' );
?>