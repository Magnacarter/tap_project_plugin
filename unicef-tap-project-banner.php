<?php
/**
 * Plugin Name: UNICEF Tap Project Banner
 * Plugin URI: http://adamkristopher.com/unicef-tap-project-banner/
 * Description: Displays a simple donate banner in the header or footer of your website so your visitors can participate in the UNICEF Tap Project. Learn more at http://thewaterproject.org
 * Version: 0.1.0
 * Author: Adam Carter
 * Author URI: http://adamkristopher.com
 * License: GPLv2+
 * Text Domain: unicef-tap-project-banner
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

if ( ! defined( 'UTP_DONATE_LINK' ) ) {
	define( 'UTP_DONATE_LINK', 'https://www.unicefusa.org/donate/donate-unicef-tap-project/16034?pcode=WB_XXXTAP15YXXXX' );
}

/**
 * Register admin menu
 *
 * @action admin_menu
 */
function utp_admin_menu() {
	add_options_page( __( 'UNICEF Tap Project Banner', 'unicef-tap-project-banner' ), __( 'UNICEF Tap Project Banner', 'unicef-tap-project-banner' ), 'manage_options', 'unicef-tap-project-banner', 'utp_settings_page' );
}
add_action( 'admin_menu', 'utp_admin_menu' );

/**
 * Enqueue admin scripts and styles
 *
 * @action admin_enqueue_scripts
 */
function utp_admin_enqueue_scripts() {
	if ( ! isset( get_current_screen()->id ) || 'settings_page_unicef-tap-project-banner' !== get_current_screen()->id ) {
		return;
	}

	wp_enqueue_style( 'farbtastic' );
	wp_enqueue_script( 'farbtastic' );
}
add_action( 'admin_enqueue_scripts', 'utp_admin_enqueue_scripts' );

/**
 * Register settings and fields
 *
 * @action admin_init
 */
function utp_admin_init() {
	// Register setting
	register_setting( 'utp-settings-group', 'utp-settings' );

	// Register sections
	add_settings_section( 'utp_settings_section_one', __( 'Banner Colors', 'unicef-tap-project-banner' ), 'utp_settings_section_one_callback', 'unicef-tap-project-banner' );
	add_settings_section( 'utp_settings_section_two', __( 'Banner Placement', 'unicef-tap-project-banner' ), 'utp_settings_section_two_callback', 'unicef-tap-project-banner' );

	// Register fields
	add_settings_field  ( 'utp_background_color', __( 'Background Color', 'unicef-tap-project-banner' ), 'utp_background_color_callback', 'unicef-tap-project-banner', 'utp_settings_section_one' );
	add_settings_field  ( 'utp_headline_color', __( 'Headline Color', 'unicef-tap-project-banner' ), 'utp_headline_color_callback', 'unicef-tap-project-banner', 'utp_settings_section_one' );
	add_settings_field  ( 'utp_button_color', __( 'Button Color', 'unicef-tap-project-banner' ), 'utp_button_color_callback', 'unicef-tap-project-banner', 'utp_settings_section_one' );
	add_settings_field  ( 'utp_placement', __( 'Banner Placement', 'unicef-tap-project-banner' ), 'utp_placement_callback', 'unicef-tap-project-banner', 'utp_settings_section_two' );
}
add_action( 'admin_init', 'utp_admin_init' );

/**
 * Setting section callbacks
 */
function utp_settings_section_one_callback() {
	echo 'Select colors to compliment your website, or leave blank to use the default styles.';
}

function utp_settings_section_two_callback() {
	echo 'Select where you would like the donate banner to be placed.';
}

/**
 * Setting field callbacks
 */
function utp_background_color_callback() {
	$settings         = get_option( 'utp-settings', array() );
	$background_color = ( isset( $settings['background_color'] ) && ! empty( $settings['background_color'] ) ) ? $settings['background_color'] : '#f5f5f5';
	?>
	<input type="text" name="utp-settings[background_color]" id="utp_background_color" class="utp-color-picker-input" value="<?php echo esc_attr( $background_color ) ?>" />
	<div class="utp-color-picker" rel="utp_background_color"></div>
	<?php
}

function utp_headline_color_callback() {
	$settings       = get_option( 'utp-settings', array() );
	$headline_color = ( isset( $settings['headline_color'] ) && ! empty( $settings['headline_color'] ) ) ? $settings['headline_color'] : '#222';
	?>
	<input type="text" name="utp-settings[headline_color]" id="utp_headline_color" class="utp-color-picker-input" value="<?php echo esc_attr( $headline_color ) ?>" />
	<div class="utp-color-picker" rel="utp_headline_color"></div>
	<?php
}

function utp_button_color_callback() {
	$settings     = get_option( 'utp-settings', array() );
	$button_color = ( isset( $settings['button_color'] ) && ! empty( $settings['button_color'] ) ) ? $settings['button_color'] : '#40aae1';
	?>
	<input type="text" name="utp-settings[button_color]" id="utp_button_color" class="utp-color-picker-input" value="<?php echo esc_attr( $button_color ) ?>" />
	<div class="utp-color-picker" rel="utp_button_color"></div>
	<?php
}

function utp_placement_callback() {
	$settings  = get_option( 'utp-settings', array() );
	$placement = ( isset( $settings['placement'] ) && ! empty( $settings['placement'] ) ) ? $settings['placement'] : 'footer';
	?>
	<input type="radio" name="utp-settings[placement]" id="utp-settings[placement][header]" value="header" <?php checked( $placement, 'header' ); ?> />
	<label for="utp-settings[placement][header]"><?php _e( 'Header', 'unicef-tap-project-banner' ); ?></label>
	&nbsp;&nbsp;
	<input type="radio" name="utp-settings[placement]" id="utp-settings[placement][footer]" value="footer" <?php checked( $placement, 'footer' ); ?> />
	<label for="utp-settings[placement][footer]"><?php _e( 'Footer', 'unicef-tap-project-banner' ); ?></label>
	<?php
}

/**
 * Render the settings page
 */
function utp_settings_page() {
	?>
	<script type="text/javascript">
	//<![CDATA[
		jQuery( document ).ready( function() {
			jQuery( '.utp-color-picker-input' ).on( 'focus', function() {
				console.log( 'hello' );
				var $this = jQuery( this );

				$this.parent().find( '.utp-color-picker' ).show();
			});
			jQuery( '.utp-color-picker-input' ).on( 'focusout', function() {
				var $this = jQuery( this );

				$this.next( '.utp-color-picker' ).hide();
			});
			jQuery( '.utp-color-picker' ).each( function() {
				var $this = jQuery( this ),
				    id    = $this.attr( 'rel' );

				$this.farbtastic( '#' + id );
			});
		});
	//]]>
	</script>
	<style type="text/css">
	.utp-color-picker { display: none; }
	</style>
	<div class="wrap">
		<h2><?php _e( 'UNICEF Tap Project Banner', 'unicef-tap-project-banner'); ?></h2>
		<form action="options.php" method="POST">
			<?php settings_fields( 'utp-settings-group' ); ?>
			<?php do_settings_sections( 'unicef-tap-project-banner' ); ?>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

/**
 * Display a donate banner on the page
 *
 * @action wp_footer
 */
function utp_display_banner() {
	require_once UTP_PLUGIN_DIR . 'banner.php';
}
add_action( 'wp_footer', 'utp_display_banner' );
