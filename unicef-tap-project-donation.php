<?php

/**
* Plugin Name: UNICEF Tap Project Donation Plugin
* Plugin URI: http://adamkristopher.com/unicef-tap-project-donation-plugin/
* Text Domain: unicef-tap-project-donation
* Description: Provides a banner in the footer of a page that provides a link to the donation page at UNICEF Tap Project.
* Version: 0.1
* Author: Adam Carter
* Author URI: http://adamkristopher.com
*
*/

/**
* Assign global variables.
*/

$options    = array();

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
		'UNICEF Tap Project Donation Plugin',
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
	global $options;

	if( isset( $_POST['background_color_form_submitted'] ) || ( $_POST['placement_form_submitted'] ) ) {

		$hidden_field = esc_html( $_POST['background_color_form_submitted'] ) || ( $_POST['placement_form_submitted'] );

		if( $hidden_field == 'Y' || 'P') {

			$background_color = esc_html( $_POST['background_color'] );
			$headline_color   = esc_html( $_POST['headline_color'] );
			$button_color     = esc_html( $_POST['button_color']);
			$header           = ( $_POST['header'] );
			$footer           = ( $_POST['footer'] );

			$options['background_color'] = $background_color;
			$options['headline_color']   = $headline_color;
			$options['button_color']     = $button_color;
			$options['header']           = $header;
			$options['footer']           = $footer;
			$options['last_updated']     = time();

			update_option( 'unicef_tap', $options );

		}

	}

	$options = get_option( 'unicef_tap' );

		if( $options != '' ) {

			$background_color = $options['background_color'];
			$headline_color   = $options['headline_color'];
			$button_color     = $options['button_color'];
			$header           = $options['header'];
			$footer           = $options['footer'];

		}

	require( 'inc/options-page-wrapper.php' );

}

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

/**
 * Register style sheet.
 */

function register_plugin_styles() {
	wp_register_style( 'unicef-tap-project-donation', plugins_url( 'unicef-tap-project-donation/css/plugin.css' ) );

	wp_enqueue_style( 'unicef-tap-project-donation' );

}

/**
* Display a banner on the top of the page.
*/

function utp_top_banner() {

	global $plugin_url;
	global $options;

	if( isset( $_POST['background_color_form_submitted'] ) ) {

		$hidden_field = esc_html( $_POST['background_color_form_submitted'] );

		if( $hidden_field == 'Y' ) {

			$background_color = esc_html( $_POST['background_color'] );
			$headline_color   = esc_html( $_POST['headline_color'] );
			$button_color     = esc_html( $_POST['button_color']);

			$options['background_color'] = $background_color;
			$options['headline_color']   = $headline_color;
			$options['button_color']     = $button_color;
			$options['last_updated']     = time();

			update_option( 'unicef_tap', $options );

		}

	}

	$options = get_option( 'unicef_tap' );

		if( $options != '' ) {

			$background_color = $options['background_color'];
			$headline_color   = $options['headline_color'];
			$button_color     = $options['button_color'];

		}

	require( 'inc/banner.php' );

}
add_action('wp_head', 'utp_top_banner');

/**
* Display a banner on the bottom of the page.
*/

function utp_bottom_banner() {

	global $plugin_url;
	global $options;

	if( isset( $_POST['background_color_form_submitted'] ) ) {

		$hidden_field = esc_html( $_POST['background_color_form_submitted'] );

		if( $hidden_field == 'Y' ) {

			$background_color = esc_html( $_POST['background_color'] );
			$headline_color   = esc_html( $_POST['headline_color'] );
			$button_color     = esc_html( $_POST['button_color']);

			$options['background_color'] = $background_color;
			$options['headline_color']   = $headline_color;
			$options['button_color']     = $button_color;
			$options['last_updated']     = time();

			update_option( 'unicef_tap', $options );

		}

	}

	$options = get_option( 'unicef_tap' );

		if( $options != '' ) {

			$background_color = $options['background_color'];
			$headline_color   = $options['headline_color'];
			$button_color     = $options['button_color'];

		}

	require( 'inc/banner.php' );

}
add_action('wp_footer', 'utp_bottom_banner');

?>