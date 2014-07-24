<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package pengu!n
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<nav id="site-navigation" class="main-navigation clear" role="navigation">
			<div class="container">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<span class="menu-toggle penguin-menu-icon"></span>
				<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'penguin' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => '' ) ); ?>
			</div><!-- .container -->
		</nav><!-- #site-navigation -->

		<?php if ( has_post_thumbnail() && is_page() || has_post_thumbnail() && is_single() && !is_attachment() ) : ?>
		<div class="headerimg">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content container">