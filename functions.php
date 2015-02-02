<?php
/**
 * pengu!n functions and definitions
 *
 * @package PENGU!N Gold
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'penguin_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function penguin_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on pengu!n, use a find and replace
	 * to change 'penguin' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'penguin', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'penguin' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'gallery', 'image', 'link', 'quote', 'video' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'penguin_custom_background_args', array(
		'default-color' => '#f1f1f1',
		'default-image' => '',
	) ) );

	// Enable support for post thumbnails.
	add_theme_support( 'post-thumbnails' );

	// Add new thumbnail sizes.
	add_image_size( 'Penguin800X400', '800', '400', array( 'center', 'center' ) );

	function show_custom_image_sizes($sizes) {
		$sizes['Penguin800X400'] = __( 'PENGU!N image size', 'penguin' );

		return $sizes;
	}
	add_filter('image_size_names_choose', 'show_custom_image_sizes');

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // penguin_setup
add_action( 'after_setup_theme', 'penguin_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function penguin_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'penguin' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'penguin_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function penguin_scripts() {
	$theme = wp_get_theme();
	$penguin = wp_get_theme( 'penguin-gold' );
	$minified = get_theme_mod( 'min-files' );

	if ( $minified == 0 && is_child_theme() ) {
		wp_enqueue_style( 'penguin-parent-style', get_template_directory_uri() . '/style.css', false, $penguin['Version'] );
	}
	if ( $minified == 1 && is_child_theme() ) {
		wp_enqueue_style( 'penguin-parent-min-style', get_template_directory_uri() . '/style.min.css', false, $penguin['Version'] );
	}
	if ( $minified == 1 && !is_child_theme() ) {
		wp_enqueue_style( 'penguin-min-style', get_template_directory_uri() . '/style.min.css', false, $penguin['Version'] );
	}
	else {
		wp_enqueue_style( 'penguin-style', get_stylesheet_uri(), false, $theme['Version'] );
	}
	wp_enqueue_style( 'penguin-font', '//fonts.googleapis.com/css?family=Raleway:300,600' );

	if ( $minified == 1 ) {
		wp_enqueue_script( 'penguin-min-js', get_template_directory_uri() . '/js/penguin.min.js', array( 'masonry', 'jquery' ), $theme['Version'], true );
	}
	if ( $minified == 0 && is_home() || is_archive() || is_search() ) {
		wp_enqueue_script( 'penguin-masonry-options', get_template_directory_uri() . '/js/masonry-options.js', array( 'masonry' ), '1.0', true );
	}
	if ( $minified == 0 ) {
		wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array(), '5.3.3', true );
		wp_enqueue_script( 'penguin-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
		wp_enqueue_script( 'fluidvids', get_template_directory_uri() . '/js/fluidvids.js', array(), '2.4.1', true );
		wp_enqueue_script( 'penguin-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'penguin_scripts' );

/**
 * Change class when js is enabled
 */
function penguin_enqueue_js_fix() {
	echo "<script>(function(){document.documentElement.className='js'})();</script>";
}
add_action( 'wp_enqueue_scripts', 'penguin_enqueue_js_fix' );

/**
 * Add script to footer
 */
function penguin_wp_footer() {
	// Do not add script if FluidVids plugin is installed
	if ( ! class_exists( 'FluidVids' ) ) { ?>
	<script>
		fluidvids.init({
			selector: ['iframe'],
			players: ['www.youtube.com', 'www.youtube-nocookie.com', 'player.vimeo.com']
		});
	</script>
	<?php }
}
add_action( 'wp_footer', 'penguin_wp_footer', 21 );

/**
 * Custom template tags for this theme
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * PENGU!N extras
 */
require get_template_directory() . '/inc/extras-penguin-gold.php';

/**
 * Plugins compatibility file
 */
require get_template_directory() . '/inc/extras-plugins.php';

/**
 * Customizer additions
 */
require get_template_directory() . '/inc/customizer-library/customizer-library.php';
require get_template_directory() . '/inc/customizer-options.php';
require get_template_directory() . '/inc/customizer-styles.php';

/*
 * Theme Hook Alliance files
 */
require( get_template_directory() . '/inc/tha-theme-hooks.php' );