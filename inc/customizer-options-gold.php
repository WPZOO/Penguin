<?php
/**
 * Defines customizer options
 *
 * @package PENGU!N Gold
 */

function penguin_gold_options() {

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;


	// Colors
	$sections[] = array(
		'id'            => 'colors',
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
		'section'       => 'colors',
		'type'          => 'select',
		'choices'       => $choices,
		'default'       => 'dark'
	);

	$options['link-color'] = array(
		'id'            => 'link-color',
		'label'         => __( 'Link color', 'penguin' ),
		'section'       => 'colors',
		'type'          => 'color',
		'default'       => '#0066cc',
	);

	// Content
	$sections[] = array(
		'id'            => 'content',
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
		'section'       => 'content',
		'type'          => 'radio',
		'choices'       => $sidebarchoices,
		'default'       => 'sidebar-right'
	);

	$options['footer-text'] = array(
		'id'            => 'footer-text',
		'label'         => __( 'Custom footer text', 'penguin' ),
		'section'       => 'content',
		'type'          => 'textarea',
		'default'       => ''
	);


	// Advanced Options
	$sections[] = array(
		'id'            => 'advanced',
		'title'         => __( 'Advanced', 'penguin' ),
		'priority'      => '200'
	);

	$options['menu-search'] = array(
		'id'            => 'menu-search',
		'label'         => __( 'Add search box to primary menu', 'penguin' ),
		'section'       => 'advanced',
		'type'          => 'checkbox',
		'default'       => 0,
	);

	$options['min-files'] = array(
		'id'            => 'min-files',
		'label'         => __( 'Minified CSS and JS', 'penguin' ),
		'section'       => 'advanced',
		'type'          => 'checkbox',
		'default'       => 1,
	);

	$options['fluidvids'] = array(
		'id'            => 'fluidvids',
		'label'         => __( 'Load Fluidvids.js for responsive videos', 'penguin' ),
		'section'       => 'advanced',
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