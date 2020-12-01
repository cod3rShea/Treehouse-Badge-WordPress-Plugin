<?php
/**
 * Plugin Name: TreeHouse Portfolio
 * Plugin URI:  
 * Description: This is a boilerplate for ACF Blocks
 * Version:     1.0
 * Author:      Sean Shea
 * Author URI:  seansheadev.com
 * Text Domain: wporg
 * Domain Path: /languages
 */

// creates the block
include( plugin_dir_path( __FILE__ ) . 'block/register-block.php');

// creates the acf fields using php
include( plugin_dir_path( __FILE__ ) . 'acf/acf-fields.php');

//creates the block template
include( plugin_dir_path( __FILE__ ) . 'block/block-template.php');

function add_my_css_and_my_js_files(){
    wp_enqueue_style( 'treehouse-portfolio', plugins_url('/css/style.css', __FILE__), false, '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', "add_my_css_and_my_js_files");


 ?>