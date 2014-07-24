<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package pengu!n
 */

get_header(); ?>

<div class="row">
	<section id="primary" class="content-area col-md-9 col-sm-8">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'penguin' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<div class="posts-container">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>
	
			</div><!--posts-container -->

			<?php penguin_paging_nav(); ?>
			
		</main><!-- #main -->

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- .row -->
<?php get_footer(); ?>