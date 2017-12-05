<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package Penguin
 */

if ( ! class_exists( 'Customizer_Library_Styles' ) ) {
	return;
}

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
function penguin_customizer_styles() {

	// Link Color
	$color = get_theme_mod( 'link-color', '#0066cc' );

	if ( '#0066cc' === $color && ! is_customize_preview() ) {
		return;
	}

	// background-color
	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'.btn a:hover',
			'.btn a:focus',
			'.btn a:active',
			'.footer-menu a:hover',
			'.footer-menu a:focus',
			'.footer-menu a:active',
			'.btn-colored a',
			'#site-navigation .current_page_item > a',
			'#site-navigation .current-menu-item > a',
			'.navigation .nav-previous a:hover',
			'.navigation .nav-previous a:focus',
			'.navigation .nav-previous a:active',
			'.navigation .nav-next a:hover',
			'.navigation .nav-next a:focus',
			'.navigation .nav-next a:active',
			'article.format-link',
			'article.format-link .entry-meta-top a:hover',
			'article.format-link .entry-meta-top a:focus',
			'article.format-link .entry-meta-top a:active',
			'article.format-link .entry-content a:hover',
			'article.format-link .entry-content a:focus',
			'article.format-link .entry-content a:active'
		),
		'declarations' => array(
			'background-color' => esc_html( $color )
		)
	) );

	// border-color
	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'button:hover',
			'input[type="button"]:hover',
			'input[type="reset"]:hover',
			'input[type="submit"]:hover',
			'button:focus',
			'input[type="button"]:focus',
			'input[type="reset"]:focus',
			'input[type="submit"]:focus',
			'input[type="text"]:focus',
			'input[type="email"]:focus',
			'input[type="url"]:focus',
			'input[type="password"]:focus',
			'input[type="search"]:focus',
			'textarea:focus',
			'.btn-outline a',
			'#scroll-to-top:focus'
		),
		'declarations' => array(
			'border-color' => esc_html( $color )
		)
	) );

	// box-shadow
	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'button:focus',
			'input[type="button"]:focus',
			'input[type="reset"]:focus',
			'input[type="submit"]:focus',
			'input[type="text"]:focus',
			'input[type="email"]:focus',
			'input[type="url"]:focus',
			'input[type="password"]:focus',
			'input[type="search"]:focus',
			'textarea:focus'
		),
		'declarations' => array(
			'-webkit-box-shadow' => '0 0 6px ' . esc_html( $color ),
			'box-shadow'         => '0 0 6px ' . esc_html( $color )
		)
	) );

	// color
	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'button:hover',
			'input[type="button"]:hover',
			'input[type="reset"]:hover',
			'input[type="submit"]:hover',
			'a',
			'#site-navigation li:hover > a',
			'#site-navigation li.focus > a',
			'#site-navigation .site-title a:hover',
			'#site-navigation .site-title a:focus',
			'.bright-navbar #site-navigation li:hover > a',
			'.bright-navbar #site-navigation li.focus > a',
			'.bright-navbar #site-navigation .site-title a:hover',
			'.bright-navbar #site-navigation .site-title a.focus',
			'.screen-reader-text:hover',
			'.screen-reader-text:active',
			'.screen-reader-text:focus',
			'.btn-outline a'
		),
		'declarations' => array(
			'color' => esc_html( $color )
		)
	) );

	// outline color
	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'a:focus'
		),
		'declarations' => array(
			'outline-color' => esc_html( $color )
		)
	) );

	// fill
	Customizer_Library_Styles()->add( array(
		'selectors' => array(
			'#scroll-to-top:focus svg'
		),
		'declarations' => array(
			'fill' => esc_html( $color )
		)
	) );


	$css = Customizer_Library_Styles()->build();

	$wp_add_inline_style = wp_add_inline_style( 'penguin-style', $css );

}
add_action( 'wp_print_styles', 'penguin_customizer_styles', 10 );
