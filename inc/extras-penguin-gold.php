<?php
/**
 * Defines theme specific functions
 * @package PENGU!N Gold
 */

/**
 * Check if have a logo
 */
function add_logo_and_navbar_body_class( $classes ) {
	$logo = get_theme_mod( 'logo' );
	$navbar = get_theme_mod( 'brightness-navbar' );
	if ($logo != '') {
		$classes[] = 'has-logo';
	}
	if ($navbar == 'bright' ) {
		$classes[] = 'bright-navbar';
	}
	return $classes;
}
add_filter( 'body_class', 'add_logo_and_navbar_body_class' );

/**
 * Sidebar layout
 */
function add_sidebar_body_class( $classes ) {
	$sidebar = get_theme_mod( 'sidebar-layout' );
	if ($sidebar == 'sidebar-left') {
		$classes[] = 'sidebar-left';
	}
	else {
		$classes[] = 'sidebar-right';
	}
	return $classes;
}
add_filter( 'body_class', 'add_sidebar_body_class' );

/**
 * Footer text
 */
function poweredbygold() {
	$footertext = get_theme_mod( 'footer-text' );
	$wpzoo = '<a href="http://wpzoo.ch" rel="designer">PENGU!N WordPress Theme made by WPZOO</a>';

	if ( $footertext != '' ) {
		echo '<div id="poweredby">' . $footertext . '</div>';
	}
	else {
		echo '<div id="poweredby">' . $wpzoo . '</div>';
	}
}
remove_action( 'tha_footer_bottom', 'poweredby' );
add_action( 'tha_footer_bottom', 'poweredbygold' );