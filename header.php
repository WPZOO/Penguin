<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package PENGU!N Gold
 */
?>
<!DOCTYPE html>
<?php tha_html_before(); ?>
<html <?php language_attributes(); ?> class="no-js">
<head>
<?php tha_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php tha_head_bottom(); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php tha_body_top(); ?>
<div id="page" class="hfeed site">

<?php tha_header_before(); ?>
<header id="masthead" class="site-header" role="banner">
	<?php tha_header_top(); ?>
	<nav id="site-navigation" class="main-navigation clear" role="navigation">
		<div class="container">
			<?php $logo = get_theme_mod( 'logo-upload' ); ?>
			<?php if ($logo == '') { ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php } else { ?>
				<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img title="<?php bloginfo( 'name' ); ?>" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo $logo; ?>">
				</a>
			<?php } ?>

			<span class="menu-toggle penguin-menu-icon"></span>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'penguin' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'main-menu', 'depth' => 2 ) ); ?>
		</div><!-- .container -->
	</nav><!-- #site-navigation -->

	<?php $classes = get_body_class();
	if ( in_array('has-headerimg', $classes ) ) : ?>
		<div class="headerimg">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
	<?php endif; ?>

	<?php tha_header_bottom(); ?>
</header><!-- #masthead -->
<?php tha_header_after(); ?>

<?php tha_content_before(); ?>
<div id="content" class="site-content container">
	<?php tha_content_top(); ?>
