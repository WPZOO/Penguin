<?php
/**
 * Defines customizer options
 *
 * @package Penguin
 */

function penguin_options() {

	// Stores all the controls that will be added
	$options = array();

	// Logo
	$options['sections'][] = array(
		'id'            => 'logo',
		'title'         => __( 'Logo', 'penguin' ),
		'priority'      => '80'
	);

	$options['logo-upload'] = array(
		'id' => 'logo-upload',
		'label'   => __( 'Upload your logo', 'penguin' ),
		'section' => 'logo',
		'type'    => 'upload',
		'default' => '',
	);

	// Content
	$options['sections'][] = array(
		'id'            => 'content',
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
		'section'       => 'content',
		'type'          => 'radio',
		'choices'       => $contentchoices,
		'default'       => 'excerpt'
	);

	$options = apply_filters( 'penguin_options', $options );

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'penguin_options' );


function penguin_change_default_order_options( $wp_customize ){
	$wp_customize->get_section('static_front_page')->priority = '50';
}
add_action( 'customize_register', 'penguin_change_default_order_options' );
