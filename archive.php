<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Penguin Gold
 */

get_header(); ?>

<div id="content-area">
	<div id="primary">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				if ( is_author() ) : ?>
					<div class="author-img"><?php echo get_avatar( get_the_author_meta( 'email' ), '95' ); ?></div>
					<p class="author-bio"><?php the_author_meta( 'description' ); ?></p> <?php
				else :
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				endif;
			?>
			</header><!-- .page-header -->

			<div id="posts-container">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			</div><!-- #posts-container -->

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- #content-area -->
<?php get_footer(); ?>