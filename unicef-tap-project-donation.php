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
* Add a link to plugin in the admin menu under 'Settings > UNICEF Tap'
*
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

	echo '<p>Welcome to our plugin page!';

}














?>