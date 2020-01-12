<?php
/*
 * Plugin Name: MWT Developer
 * Plugin URI: http://modernwebtemplates.com
 * Description: This plugin used only for theme development
 * Version: 1.0.1
 * Author: MWTemplates
 * Author URI: http://modernwebtemplates.com
 * License:  GPLv2 or later
*/

/* Disable rest api */
if ( ! function_exists( 'mwt_remove_api_link_from_header' ) ) :
	//remove <link rel='https://api.w.org/' ... from header for clean validation
	function mwt_remove_api_link_from_header() {
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	}
endif;
add_action( 'after_setup_theme', 'mwt_remove_api_link_from_header' );