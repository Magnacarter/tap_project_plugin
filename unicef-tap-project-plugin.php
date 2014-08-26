<?php

/**
* Plugin Name: UNICEF Tap Project Banner
* Plugin URI: http://adamkristopher.com/unicef-tap-project-banner/
* Text Domain: unicef-tap-project-plugin
* Description: Provides a banner in the footer of a page that provides a link to the donation page at UNICEF Tap Project.
* Version: 0.1
* Author: Adam Carter
* Author URI: http://adamkristopher.com
*/

if ( ! defined( 'UTP_PLUGIN' ) ) {
    define( 'UTP_PLUGIN', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'UTP_PLUGIN_DIR' ) ) {
    define( 'UTP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'UTP_PLUGIN_URL' ) ) {
    define( 'UTP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'UTP_PLUGIN_INC_DIR' ) ) {
    define( 'UTP_PLUGIN_INC_DIR', UTP_PLUGIN_DIR . 'inc/' );
}

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

function register_plugin_styles() {
	wp_register_style( 'unicef-tap-project-plugin', plugins_url( 'unicef-tap-project-plugin/css/plugin.css' ) );
	wp_enqueue_style( 'unicef-tap-project-plugin' );
}

//Add options to Settings menu
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
	add_settings_field  ( 'background_color',
						  'Background Color',
						  'background_color_callback',
						  'unicef-tap-project-plugin',
						  'section-one'
	);

	add_settings_field  ( 'headline_color',
						  'Headline Color',
						  'headline_color_callback',
						  'unicef-tap-project-plugin',
						  'section-one'
	);

	add_settings_field  ( 'button_color',
						  'Button Color',
						  'button_color_callback',
						  'unicef-tap-project-plugin',
						  'section-one'
	);

	add_settings_field  ( 'header_banner',
						  'Header Banner',
						  'header_banner_callback',
						  'unicef-tap-project-plugin',
						  'section-two'
	);

	add_settings_field  ( 'footer_banner',
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
    $settings         = get_option( 'utp-settings', array() );
    $background_color = isset( $settings['background_color'] ) ? $settings['background_color'] : null;

    printf( '<input type="text" name="utp-settings[background_color]" value="%s" />', esc_attr( $background_color ) );
}

function headline_color_callback() {

    $settings         = get_option( 'utp-settings', array() );
    $background_color = isset( $settings['headline_color'] ) ? $settings['headline_color'] : null;

    printf( '<input type="text" name="utp-settings[headline_color]" value="%s" />', esc_attr( $headline_color ) );
}

function button_color_callback() {

    $settings         = get_option( 'utp-settings', array() );
    $background_color = isset( $settings['button_color'] ) ? $settings['button_color'] : null;

    printf( '<input type="text" name="utp-settings[button_color]" value="%s" />', esc_attr( $button_color ) );
}

function header_banner_callback() {

    $settings         = get_option( 'utp-settings', array() );
    $background_color = isset( $settings['header_banner'] ) ? $settings['header_banner'] : null;

    printf( '<input type="radio" name="utp-settings[header_banner]" value="%s" />', esc_attr( $header_banner ) );
}

function footer_banner_callback() {

    $settings         = get_option( 'utp-settings', array() );
    $background_color = isset( $settings['footer_banner'] ) ? $settings['footer_banner'] : null;

    printf( '<input type="radio" name="utp-settings[footer_banner]" value="%s" />', esc_attr( $footer_banner ) );
}

/**
*Output to Options Page
*/

function utp_options_page() {
	?>
	<div class="wrap">
	    <h2><?php _e( 'UNICEF Tap Project Plugin Options', 'unicef-tap-project-plugin'); ?></h2>
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

	require_once UTP_PLUGIN_INC_DIR . 'options.php';

}
add_action('wp_head', 'utp_header_banner');

/**
* Display a banner on the top of the page.
*/

function utp_footer_banner() {

	require_once UTP_PLUGIN_INC_DIR . 'options.php';

}
add_action('wp_footer', 'utp_footer_banner');



?>