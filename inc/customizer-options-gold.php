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
		'title'         => __( 'Logo', 'penguin' ),
		'priority'      => '80'
	);

	$options['logo-upload'] = array(
    'id' => 'logo-upload',
    'label'   => __( 'Upload your logo', 'penguin' ),
    'section' => $section,
    'type'    => 'upload',
    'default' => '',
);

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

	$contentchoices = array(
		'excerpt' => __( 'Excerpt (trimmed-down output)', 'penguin' ),
		'content' => __( 'Content (full post / custom more tag)', 'penguin' ),
	);

	$options['excerpt-content'] = array(
		'id'            => 'excerpt-content',
		'label'         => __( 'Content output of standard posts on home and archive pages.', 'penguin' ),
		'section'       => $section,
		'type'          => 'radio',
		'choices'       => $contentchoices,
		'default'       => 'excerpt'
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
add_action( 'init', 'penguin_options' );


function change_default_order_options( $wp_customize ){
	$wp_customize->get_section('static_front_page')->priority = '50';
}
add_action( 'customize_register', 'change_default_order_options' );