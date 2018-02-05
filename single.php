<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Penguin
 */

get_header(); ?>

<div id="content-area">
	<div id="primary">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content-single', get_post_format() ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- #content-area -->
<?php get_footer(); ?>