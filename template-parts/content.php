<?php
/**
 * @package Penguin Gold
 */
?>

<?php penguin_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php penguin_entry_top(); ?>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>
		<?php get_template_part( 'template-parts/the_post_thumbnail' ); ?>
		<?php endif; ?>
		<?php if ( ! has_post_format( 'status' ) ) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; ?>

		<?php get_template_part( 'template-parts/meta', 'top' ); ?>
	</header><!-- .entry-header -->

<?php
	$contentoutput = get_theme_mod( 'excerpt-content' );
	if ( $contentoutput != 'content' && ! has_post_format() ) {
		get_template_part( 'template-parts/the_excerpt' );
	} else {
		get_template_part( 'template-parts/the_content' );
	}

	if ( 'post' == get_post_type() ) {
		get_template_part( 'template-parts/meta', 'bottom' );
	}
?>

	<?php penguin_entry_bottom(); ?>
</article><!-- #post-## -->
<?php penguin_entry_after(); ?>