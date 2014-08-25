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

	register_setting    ( 'utp-settings-group',
						  'utp-setting'
	);

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

	$setting = esc_attr( get_option( 'utp-setting' ) );

	echo "<input type='text' name='utp-setting' value='$setting' />";

}

function headline_color_callback() {

	$setting = esc_attr( get_option( 'utp-setting' ) );

	echo "<input type='text' name='utp-setting' value='$setting' />";

}

function button_color_callback() {

	$setting = esc_attr( get_option( 'utp-setting' ) );

	echo "<input type='text' name='utp-setting' value='$setting' />";

}

function header_banner_callback() {

	$setting = esc_attr( get_option( 'utp-setting' ) );

	echo "<input type='radio' name='utp-setting' value='$setting' />";

}

function footer_banner_callback() {

	$setting = esc_attr( get_option( 'utp-setting' ) );

	echo "<input type='radio' name='utp-setting' value='$setting' />";

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

?>