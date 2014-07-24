<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package pengu!n
 */

get_header(); ?>

<div class="row">
	<div id="primary" class="content-area col-md-9 col-sm-8">
		<main id="main" class="site-main" role="main">
		
			<?php get_template_part( 'content', 'none' ); ?>
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- .row -->
<?php get_footer(); ?>