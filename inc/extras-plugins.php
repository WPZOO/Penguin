<?php
/**
 * Plugins Compatibility File
 *
 * @package PENGU!N Gold
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function penguin_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'penguin_infinite_scroll_render',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'penguin_jetpack_setup' );

/**
 * Add Infinite Scroll compatibility after content.php has been moved in template-parts folder.
 */
function penguin_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
}
