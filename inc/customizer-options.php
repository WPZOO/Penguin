<?php
/**
 * Defines customizer options
 *
 * @package PENGU!N Gold
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
		'id'            => $section,
		'title'         => __( 'Your logo', 'penguin' ),
		'priority'      => '80',
		'description' => __( 'You might use a logo instead of the site title in the header navigation.', 'penguin' )
	);

	$options['logo'] = array(
		'id'            => 'logo',
		'label'         => __( 'Logo', 'penguin' ),
		'section'       => $section,
		'type'          => 'image',
		'default'       => '',
	);

	// Colors
	$section = 'colors';

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Colors', 'penguin' ),
		'priority'      => '70'
	);

	$choices = array(
		'dark'          => __( 'Dark', 'penguin' ),
		'bright'        => __( 'Bright', 'penguin' )
	);

	$options['brightness-navbar'] = array(
		'id'            => 'brightness-navbar',
		'label'         => __( 'Brightness of navbar', 'penguin' ),
		'section'       => $section,
		'type'          => 'select',
		'choices'       => $choices,
		'default'       => 'dark'
	);

	$options['link-color'] = array(
		'id'            => 'link-color',
		'label'         => __( 'Link color', 'penguin' ),
		'section'       => $section,
		'type'          => 'color',
		'default'       => $link_color,
	);

	// Sidebar
	$section = 'sidebar';

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Sidebar', 'penguin' ),
		'priority'      => '130'
	);

	$sidebarchoices = array(
		'sidebar-right' => __( 'Sidebar right', 'penguin' ),
		'sidebar-left'  => __( 'Sidebar left', 'penguin' ),
	);

	$options['sidebar-layout'] = array(
		'id'            => 'sidebar-layout',
		'label'         => __( 'Sidebar', 'penguin' ),
		'section'       => $section,
		'type'          => 'radio',
		'choices'       => $sidebarchoices,
		'default'       => 'sidebar-right'
	);

	// Footer
	$section = 'footer';

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Footer', 'penguin' ),
		'priority'      => '150'
	);

	$options['footer-text'] = array(
		'id'            => 'footer-text',
		'label'         => __( 'Your own footer text', 'penguin' ),
		'section'       => $section,
		'type'          => 'textarea',
		'default'       => ''
	);

	// Advanced Options
	$section = 'advanced';

	$sections[] = array(
		'id'           => $section,
		'title'        => __( 'Advanced', 'penguin' ),
		'priority'     => '200'
	);

	$options['min-files'] = array(
		'id'           => 'min-files',
		'label'        => __( 'Minified CSS and JS', 'penguin' ),
		'section'      => $section,
		'type'         => 'checkbox',
		'default'      => 0,
	);

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'penguin_options' );