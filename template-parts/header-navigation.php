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
			if ( function_exists( 'the_custom_logo' ) ) {
				the_custom_logo();
			} elseif ( $logo = get_theme_mod( 'logo-upload', false ) ) {
				echo '<a class="site-logo" href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
				echo '<img title="' . get_bloginfo( 'name', 'display' ) . '" alt="' . get_bloginfo( 'name', 'display' ) . '" src="' . esc_url( $logo ) . '">';
				echo '</a>';
			}
			if ( is_front_page() && is_home() ) {
				echo '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name', 'display' ) . '</a></h1>';
			} else {
				echo '<p class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name', 'display' ) . '</a></p>';
			}
		?>

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php _e( 'Menu', 'penguin' ) ?>">
				<svg version="1.1" class="penguin-icon-menu" role="img" aria-hidden="true">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/icons.svg#penguin-icon-menu"></use>
				</svg>
			</button>

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'main-menu nav-menu', 'depth' => 2 ) ); ?>

		</nav><!-- #site-navigation -->

	</div><!-- .container -->

</div><!-- #navbar -->
