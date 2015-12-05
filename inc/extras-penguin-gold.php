<?php
/**
 * Defines theme specific functions
 *
 * @package PENGU!N Gold
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function penguin_gold_body_classes( $classes ) {
	// Adds body classes for gold version
	$navbar  = get_theme_mod( 'brightness-navbar' );
	$sidebar = get_theme_mod( 'sidebar-layout' );

	if ( $navbar == 'bright' ) {
		$classes[] = 'bright-navbar';
	}
	if ( $sidebar == 'sidebar-left' ) {
		$classes[] = 'sidebar-left';
	}
	if ( $sidebar == 'sidebar-right' ) {
		$classes[] = 'sidebar-right';
	}

	return $classes;
}
add_filter( 'body_class', 'penguin_gold_body_classes' );

/**
 * Change the stylesheet_uri accordingly
 */
function penguin_stylesheet_uri( $stylesheet_uri, $stylesheet_dir_uri ) {
	$minified = get_theme_mod( 'min-files' );
	if ( is_child_theme() && 1 == $minified ) {
		$min_stylesheet_uri = get_stylesheet_directory() . '/style.min.css';
		if ( file_exists( $min_stylesheet_uri ) ) {
			$stylesheet_uri = $stylesheet_dir_uri . '/style.min.css';
		}
	} elseif ( 1 == $minified ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/style.min.css';
	}
	
	return $stylesheet_uri;
}
add_action( 'stylesheet_uri', 'penguin_stylesheet_uri', 10, 2 );

/**
 * Add search box to primary menu
 */
function penguin_gold_add_search_box($items, $args) {
	$menusearch = get_theme_mod( 'menu-search' );
	if ( 'primary' == $args->theme_location && 1 == $menusearch ) {
		ob_start();
		get_search_form();
		$searchform = ob_get_contents();
		ob_end_clean();

		$items .= '<li class="menu-search"><span class="penguin-search-icon"></span>' . $searchform . '</li>';
	}
	return $items;
}
add_filter( 'wp_nav_menu_items','penguin_gold_add_search_box', 10, 2 );

/**
 * Remove upsell link
 */
remove_action( 'customize_controls_enqueue_scripts', 'penguin_upsell_notice' );

/**
 * Footer text
 */
function penguin_gold_poweredby( $footer ) {
	$footer_text = get_theme_mod( 'footer-text' );
	$allowed_html = array(
		'a' => array(
			'href' => array(),
			'title' => array()
		),
		'br' => array(),
		'em' => array(),
		'strong' => array(),
	);

	if ( ! empty( $footer_text ) ) {
		$footer = '<div id="poweredby">' . wp_kses( $footer_text, $allowed_html ) . '</div>';
	}

	return $footer;
}
add_filter( 'penguin_footer_text', 'penguin_gold_poweredby' );

/**
 * Load theme updater functions.
 * Action is used so that child themes can easily disable.
 */
function penguin_gold_theme_updater() {
	require( get_template_directory() . '/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'penguin_gold_theme_updater' );