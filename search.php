<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package PENGU!N Gold
 */

get_header(); ?>

<div id="content-area">
	<div id="primary">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'penguin' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<div id="posts-container">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			</div><!-- #posts-container -->
			<?php penguin_paging_nav(); ?>

		</main><!-- #main -->

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- #content-area -->
<?php get_footer(); ?>