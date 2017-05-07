<?php
// Recomendamos no modificar este archivo.
// Riesgo de perder enlace con nuestro repositorio.
// Mundothemes 10/02/2016.
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/admin.php' );
}
$updater = new EDD_Theme_Updater_Admin(
	$config = array(
		'remote_api_url' => DT_SERVER, // Repositorio
		'item_name' => DT_THEME_NAME, 
		'theme_slug' => DT_THEME_SLUG, 
		'version' => DT_VERSION, // version actual 
		'author' => DT_AUTOR, 
		'download_id' => '', 
		'renew_url' => DT_RENOVAR 
	),
	$strings = array(
		'theme-license' => __( 'Theme License', 'mtms' ),
		'enter-key' => __( 'Enter your theme license key.', 'mtms' ),
		'license-key' => __( 'License Key', 'mtms' ),
		'license-action' => __( 'License Action', 'mtms' ),
		'deactivate-license' => __( 'Deactivate License', 'mtms' ),
		'activate-license' => __( 'Activate License', 'mtms' ),
		'status-unknown' => __( 'License status is unknown.', 'mtms' ),
		'renew' => __( 'Renew?', 'mtms' ),
		'unlimited' => __( 'unlimited', 'mtms' ),
		'license-key-is-active' => __( 'License key is active.', 'mtms' ),
		'expires%s' => __( 'Expires %s.', 'mtms' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'mtms' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'mtms' ),
		'license-key-expired' => __( 'License key has expired.', 'mtms' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'mtms' ),
		'license-is-inactive' => __( 'License is inactive.', 'mtms' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'mtms' ),
		'site-is-inactive' => __( 'Site is inactive.', 'mtms' ),
		'license-status-unknown' => __( 'License status is unknown.', 'mtms' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'mtms' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'mtms' )
	)
);