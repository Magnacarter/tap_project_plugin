<?php

/**
* Plugin Name: UNICEF Tap Project Donation Plugin
* Plugin URI: http://adamkristopher.com/unicef-tap-project-donation-plugin/
* Description: Provides a banner in the footer of a page that provides a link to the donation page at UNICEF Tap Project.
* Version: 0.1
* Author: Adam Carter
* Author URI: http://adamkristopher.com
*
*/

/**
* Assign global variables.
*/

$plugin_url = WP_PLUGIN_URL . '/unicef-tap-project-donation';

/**
* Add a link to plugin in the admin menu under 'Settings > UNICEF Tap'
*/

function unicef_tap_menu() {

	/**
	* Use the add_options_page function
	* add_options_page( $page_title, $menu_title, $capability, $menu-slug, $function )
	*/

	add_options_page(
		'UNICEF Tap Project Donation Plugin',
		'UNICEF Tap',
		'manage_options',
		'unicef-tap-project-donation-plugin',
		'unicef_tap_options_page'
	);

}
add_action( 'admin_menu', 'unicef_tap_menu' );

function unicef_tap_options_page() {

	if( !current_user_can( 'manage_options' ) ) {
		wp_die( 'You need more permissions to access this page.' );
	}

	global $plugin_url;
	require( 'inc/options-page-wrapper.php' );

}

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

/**
 * Register style sheet.
 */

function register_plugin_styles() {
	wp_register_style( 'unicef-tap-project-donation', plugins_url( 'unicef-tap-project-donation/css/plugin.css' ) );
	wp_register_style( 'grid', plugins_url( 'unicef-tap-project-donation/css/plugin_grid.css' ) );
	wp_register_style( 'nomalize', plugins_url( 'unicef-tap-project-donation/css/plugin_normalize.css' ) );

	wp_enqueue_style( 'unicef-tap-project-donation' );
	wp_enqueue_style( 'grid' );
	wp_enqueue_style( 'nomalize' );
}

/**
* Display a banner on the top of the page.
*/

function utp_top_banner() {

	global $plugin_url;
	require( 'inc/banner.php' );

}
add_action('wp_head', 'utp_top_banner');

/**
* Display a banner on the bottom of the page.
*/

function utp_bottom_banner() {

	global $plugin_url;
	require( 'inc/banner.php' );

}
add_action('wp_footer', 'utp_bottom_banner');

?>