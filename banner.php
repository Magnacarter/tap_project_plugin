<?php
$settings         = get_option( 'utp-settings', array() );
$background_color = ( isset( $settings['background_color'] ) && ! empty( $settings['background_color'] ) ) ? $settings['background_color'] : '#f5f5f5';
$headline_color   = ( isset( $settings['headline_color'] ) && ! empty( $settings['headline_color'] ) ) ? $settings['headline_color'] : '#000';
$button_color     = ( isset( $settings['button_color'] ) && ! empty( $settings['button_color'] ) ) ? $settings['button_color'] : '#40aae1';
$placement        = ( isset( $settings['placement'] ) && ! empty( $settings['placement'] ) ) ? $settings['placement'] : 'footer';
$position         = ( 'header' === $placement ) ? 'top: 0;' : 'bottom: 0;';
?>

<style type="text/css">
.utp-banner-container {
	position: fixed;
	<?php echo $position; // xss ok ?>
	width: 100%;
	padding: 10px 0;
	text-align: center;
	background-color: <?php echo esc_attr( $background_color ); ?>;
}
<?php if ( 'header' === $placement ) : ?>
body {
	padding-top: 56px;
}
body.admin-bar .utp-banner-container {
	top: 32px;
}
<?php endif; ?>
<?php if ( 'footer' === $placement ) : ?>
body {
	padding-bottom: 56px;
}
<?php endif; ?>
.utp-banner-container > * {
	display: inline-block;
	vertical-align: middle;
	font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
}
.utp-banner-logo-link img {
	max-height: 34px;
}
.utp-banner-heading {
	margin: 0 20px;
	font-style: italic;
	line-height: 36px;
	color: <?php echo esc_attr( $headline_color ); ?>;
}
.utp-banner-button {
	padding: 8px 14px;
	font-weight: normal;
	text-decoration: none;
	text-transform: uppercase;
	color: #fff;
	background-color: <?php echo esc_attr( $button_color ); ?>;
	border-radius: 3px;
	box-shadow: 0 1px 2px rgba(64, 64, 64, 0.1);
}
</style>

<div class="utp-banner-container">

	<a href="http://tap.unicefusa.org/" target="_blank" class="utp-banner-logo-link">
		<img src="<?php echo esc_url( UTP_PLUGIN_URL . 'images/unicef-tap-project.png' ); ?>" />
	</a>

	<h1 class="utp-banner-heading"><?php _e( 'Every heart needs water.', 'unicef-tap-project-banner' ); ?></h1>

	<a href="<?php echo esc_url( UTP_DONATE_LINK ) ?>" target="_blank" class="utp-banner-button">
		<?php _e( 'Donate', 'unicef-tap-project-banner' ); ?>
	</a>

</div>
