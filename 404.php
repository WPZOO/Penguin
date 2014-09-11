<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package pengu!n
 */

get_header(); ?>

<div id="content-area">
	<div id="primary">
		<main id="main" class="site-main" role="main">
		
			<?php get_template_part( 'content', 'none' ); ?>
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- #content-area -->
<?php get_footer(); ?>