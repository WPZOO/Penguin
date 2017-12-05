<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Penguin
 */
?>

<?php penguin_entry_before(); ?>
<section class="no-results not-found">
	<?php penguin_entry_top(); ?>
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'penguin' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php echo __( 'Ready to publish your first post?', 'penguin' ) . ' ' . '<a href="' . esc_url( admin_url( 'post-new.php' ) ) . '">' . __( 'Get started here.', 'penguin' ) . '</a>'; ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'penguin' ); ?></p>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'penguin' ); ?></p>

		<?php endif; ?>
	</div><!-- .page-content -->
	<?php penguin_entry_bottom(); ?>
</section><!-- .no-results -->
<?php penguin_entry_after(); ?>