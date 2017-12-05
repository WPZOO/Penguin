<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Penguin
 */
?>
<?php get_template_part( 'template-parts/header-head' ); ?>

<body <?php body_class(); ?>>
<?php penguin_body_top(); ?>
<div id="page" class="hfeed site">

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'penguin' ); ?></a>

	<?php penguin_header_before(); ?>
	<header id="masthead" class="site-header" role="banner">
		<?php penguin_header_top(); ?>

		<?php get_template_part( 'template-parts/header-navigation' ); ?>
		<?php get_template_part( 'template-parts/header-image' ); ?>

		<?php penguin_header_bottom(); ?>

	</header><!-- #masthead -->
	<?php penguin_header_after(); ?>

	<?php penguin_content_before(); ?>
	<div id="content" class="site-content container">
		<?php penguin_content_top(); ?>