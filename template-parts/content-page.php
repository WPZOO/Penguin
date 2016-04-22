<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Penguin Gold
 */
?>

<?php penguin_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php penguin_entry_top(); ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php get_template_part( 'template-parts/meta', 'top' ); ?>
	</header><!-- .entry-header -->

	<?php get_template_part( 'template-parts/the_content' ); ?>

	<?php penguin_entry_bottom(); ?>
</article><!-- #post-## -->
<?php penguin_entry_after(); ?>