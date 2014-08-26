<?php

/**
* Plugin Name: UNICEF Tap Project Plugin
* Plugin URI: http://adamkristopher.com/unicef-tap-project-plugin/
* Text Domain: unicef-tap-project-plugin
* Description: Provides a banner in the footer of a page that provides a link to the donation page at UNICEF Tap Project.
* Version: 0.1
* Author: Adam Carter
* Author URI: http://adamkristopher.com
*/

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

function register_plugin_styles() {
	wp_register_style( 'unicef-tap-project-plugin', plugins_url( 'unicef-tap-project-plugin/css/plugin.css' ) );
}

add_action( 'admin_menu', 'utp_admin_menu' );

function utp_admin_menu() {

	add_options_page( 'UNICEF Tap Project Plugin',
					  'UNICEF Tap Project Plugin',
					  'manage_options',
					  'unicef-tap-project-plugin',
					  'utp_options_page'
					  );

}

add_action( 'admin_init', 'utp_admin_init' );

function utp_admin_init() {

	//Register with WP
	register_setting    ( 'utp-settings-group',
						  'utp-settings'
	);

	//Add Sections
	add_settings_section( 'section-one',
						  'Select Banner Colors',
						  'section_one_callback',
						  'unicef-tap-project-plugin'
	);

	add_settings_section( 'section-two',
						  'Banner Placement',
						  'section_two_callback',
						  'unicef-tap-project-plugin'
	);

	//Add Fields
	add_settings_field  ( 'background-color',
						  'Background Color',
						  'background_color_callback',
						  'unicef-tap-project-plugin',
						  'section-one'
	);

	add_settings_field  ( 'headline-color',
						  'Headline Color',
						  'headline_color_callback',
						  'unicef-tap-project-plugin',
						  'section-one'
	);

	add_settings_field  ( 'button-color',
						  'Button Color',
						  'button_color_callback',
						  'unicef-tap-project-plugin',
						  'section-one'
	);

	add_settings_field  ( 'header-banner',
						  'Header Banner',
						  'header_banner_callback',
						  'unicef-tap-project-plugin',
						  'section-two'
	);

	add_settings_field  ( 'footer-banner',
						  'Footer Banner',
						  'footer_banner_callback',
						  'unicef-tap-project-plugin',
						  'section-two'
	);

}

/**
*Section Callbacks
*/

function section_one_callback() {

	echo 'Enter color values that compliment your website or leave blank to use default styles. Ex. #444444';

}

function section_two_callback() {

	echo 'Check for which section of your site you would like the banner to be placed.';

}

/**
*Field Callbacks
*/

function background_color_callback() {

	$settings         = (array) esc_attr( get_option( 'utp-settings' ) );
	$background_color = esc_attr( $settings['background-color'] );

	echo "<input type='text' name='utp-settings[background-color]' value='$background_color' />";

}

function headline_color_callback() {

	$settings         = (array) esc_attr( get_option( 'utp-settings' ) );
	$headline_color   = esc_attr( $settings['headline-color'] );

	echo "<input type='text' name='utp-settings[headline-color]' value='$headline_color' />";

}

function button_color_callback() {

	$settings         = (array) esc_attr( get_option( 'utp-settings' ) );
	$button_color     = esc_attr( $settings['button-color'] );

	echo "<input type='text' name='utp-settings[button-color]' value='$button_color' />";

}

function header_banner_callback() {

	$settings         = (array) esc_attr( get_option( 'utp-settings' ) );
	$header_banner    = esc_attr( $settings['header_banner'] );

	echo "<input type='radio' name='utp-settings[header-banner]' value='$header_banner' />";

}

function footer_banner_callback() {

	$settings         = (array) esc_attr( get_option( 'utp-settings' ) );
	$footer_banner    = esc_attr( $settings['footer_banner'] );

	echo "<input type='radio' name='utp-settings[footer-banner]' value='$footer_banner' />";

}

/**
*Output to Options Page
*/

function utp_options_page() {
	?>
	<div class="wrap">
	    <h2>UNICEF Tap Project Plugin Options</h2>
	    <form action="options.php" method="POST">
	        <?php settings_fields( 'utp-settings-group' ); ?>
	        <?php do_settings_sections( 'unicef-tap-project-plugin' ); ?>
	        <?php submit_button(); ?>
	    </form>
	</div>
	<?php
}

/**
* Display a banner on the top of the page.
*/

function utp_header_banner() {

	require( 'inc/options.php' );

}
add_action('wp_head', 'utp_header_banner');

/**
* Display a banner on the top of the page.
*/

function utp_footer_banner() {

	require( 'inc/options.php' );

}
add_action('wp_footer', 'utp_footer_banner');



?>