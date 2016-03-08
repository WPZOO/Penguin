<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Penguin Gold
 */
?>
<?php get_template_part( 'template-parts/header-head' ); ?>

<body <?php body_class(); ?>>
<?php tha_body_top(); ?>
<div id="page" class="hfeed site">

	<?php tha_header_before(); ?>
	<header id="masthead" class="site-header" role="banner">
		<?php tha_header_top(); ?>

		<?php get_template_part( 'template-parts/header-navigation' ); ?>
		<?php get_template_part( 'template-parts/header-image' ); ?>

		<?php tha_header_bottom(); ?>

	</header><!-- #masthead -->
	<?php tha_header_after(); ?>

	<?php tha_content_before(); ?>
	<div id="content" class="site-content container">
		<?php tha_content_top(); ?>