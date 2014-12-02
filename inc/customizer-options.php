<?php
/**
 * Defines customizer options
 *
 * @package PENGU!N
 */

function penguin_options() {

	// Theme defaults
	$link_color = '#0066cc';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Logo
	$section = 'logo';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Your logo', 'penguin' ),
		'priority' => '80',
		'description' => __( 'You might use a logo instead of the site title in the header navigation.', 'penguin' )
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Logo', 'penguin' ),
		'section' => $section,
		'type'    => 'image',
		'default' => '',
	);

	// Colors
	$section = 'colors';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Colors', 'penguin' ),
		'priority' => '70'
	);

	$choices = array(
		'dark' => __( 'Dark', 'penguin' ),
		'bright' => __( 'Bright', 'penguin' )
	);

	$options['brightness-navbar'] = array(
		'id' => 'brightness-navbar',
		'label'   => __( 'Brightness of navbar', 'penguin' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => 'dark'
	);

	$options['link-color'] = array(
		'id' => 'link-color',
		'label'   => __( 'Link color', 'penguin' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $link_color,
	);

	// Sidebar
	$section = 'sidebar';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Sidebar', 'penguin' ),
		'priority' => '130'
	);

	$sidebarchoices = array(
		'sidebar-right' => __( 'Sidebar right', 'penguin' ),
		'sidebar-left' => __( 'Sidebar left', 'penguin' ),
	);

	$options['sidebar-layout'] = array(
		'id' => 'sidebar-layout',
		'label'   => __( 'Sidebar', 'penguin' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $sidebarchoices,
		'default' => 'sidebar-right'
	);

	// Footer
	$section = 'footer';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Footer', 'penguin' ),
		'priority' => '150'
	);

	$options['footer-text'] = array(
		'id' => 'footer-text',
		'label'   => __( 'Your own footer text', 'penguin' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => ''
	);

	// Advanced Options
	$section = 'advanced';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Advanced', 'penguin' ),
		'priority' => '200'
	);

	$options['js'] = array(
		'id' => 'js-load',
		'label'   => __( 'Load only one minified javascript file', 'penguin' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'penguin_options' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function penguin_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'penguin_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function penguin_customize_preview_js() {
	wp_enqueue_script( 'penguin_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'penguin_customize_preview_js' );