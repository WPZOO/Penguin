<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package Penguin Gold
 */

// Includes the files needed for the theme updater
if ( ! class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://wpzoo.ch',       // Site where EDD is hosted
		'item_name'      => 'Penguin Gold',           // Name of theme
		'theme_slug'     => 'penguin-gold',           // Theme slug
		'version'        => '0.1.0',                  // The current version of this theme
		'author'         => 'WPZOO',                  // The author of this theme
		'download_id'    => '21',                     // Optional, used for generating a license renewal link
		'renew_url'      => ''                        // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'penguin-gold' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'penguin-gold' ),
		'license-key'               => __( 'License Key', 'penguin-gold' ),
		'license-action'            => __( 'License Action', 'penguin-gold' ),
		'deactivate-license'        => __( 'Deactivate License', 'penguin-gold' ),
		'activate-license'          => __( 'Activate License', 'penguin-gold' ),
		'status-unknown'            => __( 'License status is unknown.', 'penguin-gold' ),
		'renew'                     => __( 'Renew?', 'penguin-gold' ),
		'unlimited'                 => __( 'unlimited', 'penguin-gold' ),
		'license-key-is-active'     => __( 'License key is active.', 'penguin-gold' ),
		'expires%s'                 => __( 'Expires %s.', 'penguin-gold' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'penguin-gold' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'penguin-gold' ),
		'license-key-expired'       => __( 'License key has expired.', 'penguin-gold' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'penguin-gold' ),
		'license-is-inactive'       => __( 'License is inactive.', 'penguin-gold' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'penguin-gold' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'penguin-gold' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'penguin-gold' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'penguin-gold' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'penguin-gold' )
	)

);