<div class="entry-content">
	<?php the_content( penguin_read_more_text() ); ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'penguin' ),
			'after'  => '</div>',
		) );
	?>
</div><!-- .entry-content -->