<?php
/**
 * Template Name: Full Width
 *
 * @package Penguin
 */

get_header(); ?>

<div id="content-area">
	<div id="primary" class="page-fullwidth">
		<main id="main" class="site-main" role="main">

			<div id="posts-container">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #posts-container -->

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- #content-area -->
<?php get_footer(); ?>
