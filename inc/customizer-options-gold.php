<?php
/**
 * Defines customizer options
 *
 * @package PENGU!N Gold
 */

function penguin_gold_options() {

	// Theme defaults
	$link_color = '#0066cc';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;


	// Colors
	$section = 'colors';

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Colors', 'penguin' ),
		'priority'      => '80'
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

	// Content
	$section = 'content';

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Content', 'penguin' ),
		'priority'      => '100'
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

	$options['footer-text'] = array(
		'id'            => 'footer-text',
		'label'         => __( 'Custom footer text', 'penguin' ),
		'section'       => $section,
		'type'          => 'textarea',
		'default'       => ''
	);


	// Advanced Options
	$section = 'advanced';

	$sections[] = array(
		'id'            => $section,
		'title'         => __( 'Advanced', 'penguin' ),
		'priority'      => '200'
	);

	$options['menu-search'] = array(
		'id'            => 'menu-search',
		'label'         => __( 'Add search box to primary menu', 'penguin' ),
		'section'       => $section,
		'type'          => 'checkbox',
		'default'       => 0,
	);

	$options['min-files'] = array(
		'id'            => 'min-files',
		'label'         => __( 'Minified CSS and JS', 'penguin' ),
		'section'       => $section,
		'type'          => 'checkbox',
		'default'       => 1,
	);

	$options['fluidvids'] = array(
		'id'            => 'fluidvids',
		'label'         => __( 'Load Fluidvids.js for responsive videos', 'penguin' ),
		'section'       => $section,
		'type'          => 'checkbox',
		'default'       => 1,
	);

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'penguin_gold_options' );