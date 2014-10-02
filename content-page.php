<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package pengu!n
 */
?>

<?php tha_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php tha_entry_top(); ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="entry-meta-top">
			<?php edit_post_link( __( 'Edit', 'penguin' ), '<small class="edit-link btn btn-sm">', '</small>' ); ?>
		</div><!-- .entry-meta-top -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'penguin' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php tha_entry_bottom(); ?>
</article><!-- #post-## -->
<?php tha_entry_after(); ?>