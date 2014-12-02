<div class="entry-content">
	<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'penguin' ) ); ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'penguin' ),
			'after'  => '</div>',
		) );
	?>
</div><!-- .entry-content -->