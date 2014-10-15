<?php
/**
 * Defines theme specific functions
 *
 * @package PENGU!N
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
	echo '<a href="#" class="scrollToTop"><span class="screen-reader-text"Scroll To Top</span></a>';
}
add_action( 'tha_footer_top', 'penguin_back_to_top' );

/**
 * Footer text
 */
function poweredby() {
	$wpzoo = '<a href="http://wpzoo.ch" rel="designer">PENGU!N WordPress Theme made by WPZOO</a>';
	echo '<div id="poweredby">' . $wpzoo . '</div>';
}
add_action( 'tha_footer_bottom', 'poweredby' );