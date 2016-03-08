<?php
/**
 * The template part for displaying the main navigation in the header.
 *
 * @package Penguin Gold
 */
?>

<nav id="site-navigation" class="main-navigation clear" role="navigation">
    <div class="container">
        <?php $logo = get_theme_mod( 'logo-upload' ); ?>
        <?php if ( $logo == '' ) { ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php } else { ?>
            <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img title="<?php bloginfo( 'name' ); ?>" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo esc_url( $logo ); ?>">
            </a>
        <?php } ?>

        <span class="menu-toggle penguin-menu-icon"></span>
        <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'penguin' ); ?></a>
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'main-menu', 'depth' => 2 ) ); ?>
    </div><!-- .container -->
</nav><!-- #site-navigation -->