<?php

/**
* Plugin Name: UNICEF Tap Project Plugin
* Plugin URI: http://adamkristopher.com/unicef-tap-project-plugin/
* Text Domain: unicef-tap-project-plugin
* Description: Provides a banner in the footer of a page that provides a link to the donation page at UNICEF Tap Project.
* Version: 0.1
* Author: Adam Carter
* Author URI: http://adamkristopher.com
*
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

	register_setting( 'utp-settings-group',
					  'utp-setting'
	);

	add_settings_section( 'section-one',
						  'Section One',
						  'section_one_callback',
						  'unicef-tap-project-plugin'
	);

	add_settings_field( 'field-one',
						'Field One',
						'field_one_callback',
						'unicef-tap-project-plugin',
						'section-one'
	);

}

function section_one_callback() {

	echo 'Some help text goes here.';

}

function field_one_callback() {

	$setting = esc_attr( get_option( 'utp-setting' ) );

	echo "<input type='text' name='utp-setting' value='$setting' />";

}

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