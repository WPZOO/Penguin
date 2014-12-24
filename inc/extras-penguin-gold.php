<?php
/**
 * Defines theme specific functions
 *
 * @package PENGU!N Gold
 */

/**
 * Check if Single and Page has Post Thumbnail
 */
function add_featured_image_body_class( $classes ) {
	global $post;
	if ( ! is_404 () && has_post_thumbnail() && ( is_page() || is_single() && !is_attachment() ) ) {
		$classes[] = 'has-headerimg';
	}
	return $classes;
}
add_filter( 'body_class', 'add_featured_image_body_class' );

/**
 * Custom Excerpt
 */
function excerpt_read_more_link($output) {
	global $post;
	return $output . '<a href="'. get_permalink($post->ID) . '" class="read-more-link">' . __("Read more", "penguin") . '</a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');

function new_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Link to scroll back to the top of the page.
 */
function penguin_back_to_top() {
	echo '<a href="#" id="scroll-to-top"><span class="screen-reader-text">' . __( 'Scroll To Top', 'penguin' ) . '</span></a>';
}
add_action( 'tha_footer_top', 'penguin_back_to_top' );

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
 * Add search box to primary menu
 */
function add_search_box($items, $args) {
	$menusearch = get_theme_mod( 'menu-search' );
	if ( $menusearch == 1 ) {
		ob_start();
		get_search_form();
		$searchform = ob_get_contents();
		ob_end_clean();

		$items .= '<li class="menu-search"><span class="penguin-search-icon"></span>' . $searchform . '</li>';
	}
	return $items;
}
add_filter('wp_nav_menu_items','add_search_box', 10, 2);


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
add_action( 'tha_footer_bottom', 'poweredbygold' );

/**
 * Body class for page template
 */
function fullwidth_body_class( $classes ) {
	if ( is_page_template( 'page-fullwidth.php' ) ) {
			$classes[] = 'fullwidth';
	}
	return $classes;
}
add_filter( 'body_class','fullwidth_body_class' );