<?php
/**
 * Defines customizer options
 *
 * @package Penguin Gold
 */

function penguin_gold_customize_register( $wp_customize ) {

	$choices = penguin_option_choices();

	$wp_customize->add_setting(
		'brightness-navbar',
		array(
			'default'           => 'dark',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'penguin_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'brightness-navbar',
		array(
			'label'   => __( 'Brightness of navbar', 'penguin-gold' ),
			'section' => 'colors',
			'type'    => 'select',
			'choices' => $choices['brightness-navbar'],
		)
	);

	$wp_customize->add_setting( 'link-color', array(
		'default'           => '#0066cc',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link-color',
			array(
				'label'   => __( 'Link Color', 'penguin-gold' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'sidebar-layout',
		array(
			'default'           => 'sidebar-right',
			'transport'         => 'refresh',
			'sanitize_callback' => 'penguin_sanitize_choices',
		)
	);

	$wp_customize->add_control(
		'sidebar-layout',
		array(
			'label'   => __( 'Sidebar layout', 'penguin-gold' ),
			'section' => 'content',
			'type'    => 'radio',
			'choices' => $choices['sidebar-layout'],
		)
	);

	$wp_customize->add_setting(
		'author-box',
		array(
			'default'           => 0,
			'transport'         => 'refresh',
			'sanitize_callback' => 'penguin_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'author-box',
		array(
			'label'       => __( 'Author info box on single posts', 'penguin-gold' ),
			'description' => __( 'The user description needs to be added before the box is displayed.', 'penguin-gold' ),
			'section'     => 'content',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'menu-search',
		array(
			'default'           => 0,
			'transport'         => 'refresh',
			'sanitize_callback' => 'penguin_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'menu-search',
		array(
			'label'   => __( 'Add search box to primary menu', 'penguin-gold' ),
			'section' => 'content',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'footer-text',
		array(
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'footer-text',
		array(
			'label'   => __( 'Custom footer text', 'penguin-gold' ),
			'section' => 'content',
			'type'    => 'textarea',
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'footer-text',
			array(
				'selector'            => '#poweredby',
				'container_inclusive' => true,
				'render_callback'     => 'penguin_poweredby',
			)
		);
	}

	$wp_customize->add_section(
		'advanced',
		array(
			'title'    => __( 'Advanced', 'penguin-gold' ),
			'priority' => 150,
		)
	);

	$wp_customize->add_setting(
		'min-files',
		array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'penguin_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'min-files',
		array(
			'label'   => __( 'Minified CSS and JS', 'penguin-gold' ),
			'section' => 'advanced',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'fluidvids',
		array(
			'default'           => 1,
			'transport'         => 'refresh',
			'sanitize_callback' => 'penguin_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'fluidvids',
		array(
			'label'   => __( 'Load Fluidvids.js for responsive videos', 'penguin-gold' ),
			'section' => 'advanced',
			'type'    => 'checkbox',
		)
	);

}
add_action( 'customize_register', 'penguin_gold_customize_register', 11 );
