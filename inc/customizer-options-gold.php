<?php
/**
 * Defines customizer options
 *
 * @package PENGU!N Gold
 */

function penguin_gold_options( $options ) {

	// Colors
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
	$options['sections'][] = array(
		'id'            => 'advanced',
		'title'         => __( 'Advanced', 'penguin' ),
		'priority'      => '150'
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

	return $options;

}
add_filter( 'penguin_options', 'penguin_gold_options' );