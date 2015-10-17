<?php
/**
 * Defines customizer options
 *
 * @package PENGU!N Gold
 */

function penguin_gold_options( $options ) {

	// Colors
	$choices = array(
		'dark'          => __( 'Dark', 'penguin-gold' ),
		'bright'        => __( 'Bright', 'penguin-gold' )
	);

	$options['brightness-navbar'] = array(
		'id'            => 'brightness-navbar',
		'label'         => __( 'Brightness of navbar', 'penguin-gold' ),
		'section'       => 'colors',
		'type'          => 'select',
		'choices'       => $choices,
		'default'       => 'dark'
	);

	$options['link-color'] = array(
		'id'            => 'link-color',
		'label'         => __( 'Link color', 'penguin-gold' ),
		'section'       => 'colors',
		'type'          => 'color',
		'default'       => '#0066cc',
	);

	// Content
	$sidebarchoices = array(
		'sidebar-right' => __( 'Sidebar right', 'penguin-gold' ),
		'sidebar-left'  => __( 'Sidebar left', 'penguin-gold' ),
	);

	$options['sidebar-layout'] = array(
		'id'            => 'sidebar-layout',
		'label'         => __( 'Sidebar', 'penguin-gold' ),
		'section'       => 'content',
		'type'          => 'radio',
		'choices'       => $sidebarchoices,
		'default'       => 'sidebar-right'
	);

	$options['footer-text'] = array(
		'id'            => 'footer-text',
		'label'         => __( 'Custom footer text', 'penguin-gold' ),
		'section'       => 'content',
		'type'          => 'textarea',
		'default'       => ''
	);


	// Advanced Options
	$options['sections'][] = array(
		'id'            => 'advanced',
		'title'         => __( 'Advanced', 'penguin-gold' ),
		'priority'      => '150'
	);

	$options['menu-search'] = array(
		'id'            => 'menu-search',
		'label'         => __( 'Add search box to primary menu', 'penguin-gold' ),
		'section'       => 'advanced',
		'type'          => 'checkbox',
		'default'       => 0,
	);

	$options['min-files'] = array(
		'id'            => 'min-files',
		'label'         => __( 'Minified CSS and JS', 'penguin-gold' ),
		'section'       => 'advanced',
		'type'          => 'checkbox',
		'default'       => 1,
	);

	$options['fluidvids'] = array(
		'id'            => 'fluidvids',
		'label'         => __( 'Load Fluidvids.js for responsive videos', 'penguin-gold' ),
		'section'       => 'advanced',
		'type'          => 'checkbox',
		'default'       => 1,
	);

	return $options;

}
add_filter( 'penguin_options', 'penguin_gold_options' );