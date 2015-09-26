<?php
/**
 * Defines theme specific functions
 *
 * @package PENGU!N
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
	if ( has_post_thumbnail() && false == get_post_meta( $post->ID, 'header-img', true ) && ( is_page() || is_single() ) ) {
		$classes[] = 'has-headerimg';
	}

	// Adds body class if logo has uploaded
	$logo = get_theme_mod( 'logo-upload' );
	if ( ! empty( $logo ) ) {
		$classes[] = 'has-logo';
	}

	return $classes;
}
add_filter( 'body_class', 'penguin_body_classes' );

/**
 * Adds a general, theme specific post class.
 *
 * @param array $class Class for all kind of posts.
 * @return array
 */
function penguin_add_post_class( $class ) {
	$class[] = 'penguin-post';
	return $class;
}
add_filter( 'post_class', 'penguin_add_post_class' );

/**
 * Change image size on attachment pages.
 */
function penguin_prepend_attachment($p) {
	return '<p class="attachment">' . wp_get_attachment_link( 0, 'full', false ) . '</p>';
}
add_filter('prepend_attachment', 'penguin_prepend_attachment');

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
 * Read more text
 */
function penguin_read_more_text() {
	$read_more_text = sprintf(
		/* translators: %s: Name of current post */
		wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'penguin' ), array( 'span' => array( 'class' => array() ) ) ),
		the_title( '<span class="screen-reader-text">"', '"</span>', false )
	);
	return apply_filters( 'penguin_read_more_text', $read_more_text );
}

/**
 * Excerpt continue reading link
 */
function penguin_excerpt_read_more_link( $output ) {
	if ( ! is_attachment() && ! is_admin() ) {
		$output .= '<a href="'. get_permalink() . '" class="read-more-link">' . penguin_read_more_text() . '</a>';
	}
	return $output;
}
add_filter( 'the_excerpt', 'penguin_excerpt_read_more_link' );

/**
 * Excerpt more
 */
function penguin_excerpt_more( $more ) {
	return ' ...';
}
add_filter( 'excerpt_more', 'penguin_excerpt_more' );

/**
 * Link to scroll back to the top of the page.
 */
function penguin_back_to_top() {
	echo '<a data-scroll href="#masthead" id="scroll-to-top"><span class="screen-reader-text">' . __( 'Scroll To Top', 'penguin' ) . '</span></a>';
}
add_action( 'tha_footer_top', 'penguin_back_to_top' );

/**
 * Display upgrade notice on customizer page
 */
function penguin_upsell_notice() {
	wp_enqueue_script( 'penguin-customizer-goldad', get_template_directory_uri() . '/js/goldad.js', array(), '1.0.0', true );
	wp_localize_script(
		'penguin-customizer-goldad',
		'penguinL10n',
		array(
			'penguinURL'   => esc_url( '//wpzoo.ch/themes/penguin/' ),
			'penguinLabel' => __( 'Buy Gold Version', 'penguin' ),
		)
	);

}
add_action( 'customize_controls_enqueue_scripts', 'penguin_upsell_notice' );

/**
 * Footer text
 */
function penguin_poweredby() {
	$footer = '<div id="poweredby"><a href="http://wpzoo.ch" rel="designer">PENGU!N WordPress Theme made by WPZOO</a></div>';
 
	echo apply_filters( 'penguin_footer_text', $footer );

}
add_action( 'tha_footer_bottom', 'penguin_poweredby' );