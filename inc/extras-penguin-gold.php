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
function penguin_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class to handle the header img
	global $post;
	if ( 'no' == get_post_meta( $post->ID, 'header-img', true ) ) {
		$classes[] = 'no-headerimg';
	}
	elseif ( ! is_404 () && has_post_thumbnail() && ( is_page() || is_single() && !is_attachment() ) ) {
		$classes[] = 'has-headerimg';
	}

	// Adds PENGU!N Gold body classes
	$logo = get_theme_mod( 'logo' );
	$navbar = get_theme_mod( 'brightness-navbar' );
	$sidebar = get_theme_mod( 'sidebar-layout' );
	if ($logo != '') {
		$classes[] = 'has-logo';
	}
	if ($navbar == 'bright' ) {
		$classes[] = 'bright-navbar';
	}
	if ($sidebar == 'sidebar-left') {
		$classes[] = 'sidebar-left';
	}
	if ($sidebar == 'sidebar-right') {
		$classes[] = 'sidebar-right';
	}

	return $classes;
}
add_filter( 'body_class', 'penguin_body_classes' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function penguin_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'penguin_page_menu_args' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function penguin_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'penguin' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'penguin_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function penguin_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'penguin_setup_author' );

/**
 * Custom Excerpt
 */
function penguin_excerpt_read_more_link($output) {
	global $post;
	return $output . '<a href="'. get_permalink($post->ID) . '" class="read-more-link">' . __("Read more", "penguin") . '</a>';
}
add_filter( 'the_excerpt', 'penguin_excerpt_read_more_link' );

function penguin_new_excerpt_more( $more ) {
	return ' ...';
}
add_filter( 'excerpt_more', 'penguin_new_excerpt_more' );

/**
 * Link to scroll back to the top of the page.
 */
function penguin_back_to_top() {
	echo '<a data-scroll href="#masthead" id="scroll-to-top"><span class="screen-reader-text">' . __( 'Scroll To Top', 'penguin' ) . '</span></a>';
}
add_action( 'tha_footer_top', 'penguin_back_to_top' );

/**
 * Add search box to primary menu
 */
function penguin_gold_add_search_box($items, $args) {
	$menusearch = get_theme_mod( 'menu-search' );
	if ( $args->theme_location == 'primary' && $menusearch == 1 ) {
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
 * Footer text
 */
function penguin_gold_poweredby() {
	$footertext = get_theme_mod( 'footer-text' );
	$wpzoo = '<a href="http://wpzoo.ch" rel="designer">PENGU!N WordPress Theme made by WPZOO</a>';

	if ( $footertext != '' ) {
		echo '<div id="poweredby">' . $footertext . '</div>';
	}
	else {
		echo '<div id="poweredby">' . $wpzoo . '</div>';
	}
}
add_action( 'tha_footer_bottom', 'penguin_gold_poweredby' );