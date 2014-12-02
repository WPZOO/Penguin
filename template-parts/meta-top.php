<div class="entry-meta-top">
	<?php if ( 'post' == get_post_type() ) : ?>
		<?php penguin_posted_on(); ?>
	<?php endif; ?>

	<?php if ( 'post' == get_post_type() && ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<div class="comments-link btn btn-sm small"><?php comments_popup_link( __( 'Leave a comment', 'penguin' ), __( '1 Comment', 'penguin' ), __( '% Comments', 'penguin' ) ); ?></div>
	<?php endif; ?>
	<?php edit_post_link( __( 'Edit', 'penguin' ), '<div class="edit-link btn btn-sm small">', '</div>' ); ?>
</div><!-- .entry-meta-top -->