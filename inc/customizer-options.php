<?php
/**
 * Defines customizer options
 *
 * @package Penguin
 */

function penguin_customize_register( $wp_customize ) {

	$choices = penguin_option_choices();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'            => '.site-title a',
				'container_inclusive' => false,
				'render_callback'     => 'penguin_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'            => '.site-description',
				'container_inclusive' => false,
				'render_callback'     => 'penguin_customize_partial_blogdescription',
			)
		);
	}

	if ( ! function_exists( 'the_custom_logo' ) ) {
		$wp_customize->add_setting(
			'logo-upload',
			array(
				'transport'            => 'refresh',
				'sanitize_callback'    => 'esc_url_raw',
				'sanitize_js_callback' => 'esc_url',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Upload_Control(
				$wp_customize,
				'logo-upload',
				array(
					'label'   => __( 'Upload your logo', 'penguin' ),
					'section' => 'title_tagline',
					'priority' => 8,
				)
			)
		);
	}

	$wp_customize->add_section(
		'content',
		array(
			'title'    => __( 'Content design', 'penguin' ),
			'priority' => 100,
		)
	);

	$wp_customize->add_setting(
		'excerpt-content',
		array(
			'default'           => 'excerpt',
			'transport'         => 'refresh',
			'sanitize_callback' => 'penguin_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'excerpt-content',
		array(
			'label'   => __( 'Content output of standard posts on home and archive pages.', 'penguin' ),
			'section' => 'content',
			'type'    => 'radio',
			'choices' => $choices['excerpt-content'],
		)
	);

}
add_action( 'customize_register', 'penguin_customize_register', 11 );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function penguin_customize_preview_js() {
	wp_enqueue_script( 'penguin-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20160419', true );
}
add_action( 'customize_preview_init', 'penguin_customize_preview_js' );

function penguin_change_default_order_options( $wp_customize ){
	$wp_customize->get_section('static_front_page')->priority = '50';
}
add_action( 'customize_register', 'penguin_change_default_order_options' );

function penguin_customize_partial_blogname() {
	bloginfo( 'name' );
}

function penguin_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function penguin_option_choices() {
	$choices['excerpt-content'] = array(
		'excerpt' => __( 'Excerpt (trimmed-down output)', 'penguin' ),
		'content' => __( 'Content (full post / custom more tag)', 'penguin' ),
	);

	$choices['brightness-navbar'] = array(
		'dark'          => __( 'Dark', 'penguin-gold' ),
		'bright'        => __( 'Bright', 'penguin-gold' )
	);

	$choices['sidebar-layout'] = array(
		'sidebar-right' => __( 'Sidebar right', 'penguin-gold' ),
		'sidebar-left'  => __( 'Sidebar left', 'penguin-gold' ),
	);

	return $choices;
}

function penguin_sanitize_checkbox( $value ) {
	if ( 1 == $value ) {
		return 1;
	} else {
		return 0;
	}
}

function penguin_sanitize_choices( $value, $WP_Customize_Setting ) {
	$choices = penguin_option_choices();
	if ( in_array( $value, array_keys( $choices[ $WP_Customize_Setting->id ] ), true ) ) {
		return $value;
	} else {
		return null;
	}
}
