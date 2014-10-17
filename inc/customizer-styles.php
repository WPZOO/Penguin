<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package penguin
 */

if ( ! function_exists( 'customizer_library_penguin_build_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function customizer_library_penguin_build_styles() {

	// Link Color
	$setting = 'link-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		// Color
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a:link',
				'a:visited',
				'#site-navigation.main-navigation a:hover',
				'button:hover',
				'input[type="button"]:hover',
				'input[type="reset"]:hover',
				'input[type="submit"]:hover'
			),
			'declarations' => array(
				'color' => $color
			)
		) );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a:hover',
				'a:focus',
				'a:active'
			),
			'declarations' => array(
				'color' => '#404040'
			)
		) );

		// background-color
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.btn a:hover',
				'.btn a:focus',
				'.btn a:active',
				'#site-navigation.main-navigation .current_page_item > a',
				'#site-navigation.main-navigation .current-menu-item > a',
				'article.format-link',
				'article.format-link .entry-meta-top a:hover',
				'article.format-link .entry-meta-top a:focus',
				'article.format-link .entry-meta-top a:active',
				'article.format-link .entry-content a:hover',
				'article.format-link .entry-content a:focus',
				'article.format-link .entry-content a:active'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );

		// border-color
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'input[type="button"]:hover',
				'input[type="reset"]:hover',
				'input[type="submit"]:hover',
				'input[type="text"]:focus',
				'input[type="email"]:focus',
				'input[type="url"]:focus',
				'input[type="password"]:focus',
				'input[type="search"]:focus',
				'textarea:focus'
			),
			'declarations' => array(
				'border-color' => $color
			)
		) );
	}
}
endif;

add_action( 'customizer_library_styles', 'customizer_library_penguin_build_styles' );

if ( ! function_exists( 'customizer_library_penguin_styles' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 *
 * By using the "Customizer_Library_Styles" filter, different components can print CSS in the header.
 * It is organized this way to ensure there is only one "style" tag.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function customizer_library_penguin_styles() {

	do_action( 'customizer_library_styles' );

	// Echo the rules
	$css = Customizer_Library_Styles()->build();

	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"penguin-custom-css\">\n";
		echo $css;
		echo "\n</style>\n<!-- End Custom CSS -->\n";
	}
}
endif;

add_action( 'wp_head', 'customizer_library_penguin_styles', 11 );