<footer class="entry-meta-bottom">
	<?php /* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( __( ', ', 'penguin' ) );
	if ( $categories_list && penguin_categorized_blog() ) : ?>
	<div class="cat-links small">
		<span class="penguin-category-icon"></span> <?php echo $categories_list ?>
	</div>
	<?php endif; // End if categories ?>

	<?php
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'penguin' ) );
		if ( $tags_list ) :
	?>
	<div class="tags-links small">
		<span class="penguin-tag-icon"></span> <?php echo $tags_list ?>
	</div>
	<?php endif; // End if $tags_list ?>
</footer><!-- .entry-meta-bottom -->