<?php
/**
 * The template part for displaying the main navigation in the header.
 *
 * @package Penguin
 */
?>

<div id="navbar">

	<div class="container">

		<nav id="site-navigation" class="main-navigation clear" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'penguin' ); ?>">

			<?php
			if ( function_exists( 'the_custom_logo' ) ) :
				the_custom_logo();
			elseif ( $logo = get_theme_mod( 'logo-upload', false ) ) :
			?>
				<a class="site-logo" href="'<?php esc_url( home_url( '/' ) ) ?>" rel="home">;
					<img title="<?php bloginfo( 'name' ); ?>" alt="<?php bloginfo( 'name' ); ?>" src="<?php esc_url( $logo ) ?>">;
				</a>;
			<?php
			endif;

			if ( is_front_page() && is_home() ) :
			?>
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
			<?php else : ?>
				<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</p>
			<?php endif; ?>

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Menu', 'penguin' ); ?>">
				<svg version="1.1" class="penguin-icon-menu" role="img" aria-hidden="true">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/icons.svg#penguin-icon-menu"></use>
				</svg>
			</button>

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'main-menu nav-menu', 'depth' => 2 ) ); ?>

		</nav><!-- #site-navigation -->

	</div><!-- .container -->

</div><!-- #navbar -->
