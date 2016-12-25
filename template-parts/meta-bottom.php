<footer class="entry-meta-bottom">
	<?php /* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( __( ', ', 'penguin' ) );
	if ( $categories_list && penguin_categorized_blog() ) : ?>
	<div class="cat-links small">
		<svg version="1.1" class="penguin-icon-category" role="img">
			<title><?php _e( 'Categories icon', 'penguin' ) ?></title>
			<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/icons.svg#penguin-icon-category"></use>
		</svg>
		<?php echo $categories_list; ?>
	</div>
	<?php endif; // End if categories ?>

	<?php
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'penguin' ) );
		if ( $tags_list ) :
	?>
	<div class="tags-links small">
		<svg version="1.1" class="penguin-icon-tag" role="img">
			<title><?php _e( 'Tags icon', 'penguin' ) ?></title>
			<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/icons.svg#penguin-icon-tag"></use>
		</svg>
		<?php echo $tags_list; ?>
	</div>
	<?php endif; // End if $tags_list ?>
</footer><!-- .entry-meta-bottom -->
