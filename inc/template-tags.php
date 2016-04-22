<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Penguin Gold
 */

if ( ! function_exists( 'penguin_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function penguin_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	} else {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( '<div class="posted-on btn btn-sm small">%1$s</div>',
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		)
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function penguin_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'penguin_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'penguin_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so penguin_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so penguin_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in penguin_categorized_blog.
 */
function penguin_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'penguin_categories' );
}
add_action( 'edit_category', 'penguin_category_transient_flusher' );
add_action( 'save_post',     'penguin_category_transient_flusher' );
