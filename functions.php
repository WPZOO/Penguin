<?php
/**
 * pengu!n functions and definitions
 *
 * @package PENGU!N Gold
 */

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
	 */
	load_theme_textdomain( 'penguin' );
	load_theme_textdomain( 'penguin-gold', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'penguin' ),
		'secondary' => __( 'Footer Menu', 'penguin' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'link', 'quote' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'penguin_custom_background_args', array(
		'default-color' => '#f1f1f1',
		'default-image' => '',
	) ) );

	// Enable support for post thumbnails.
	add_theme_support( 'post-thumbnails' );

	// Add new thumbnail sizes.
	add_image_size( 'Penguin800X400', '800', '400', array( 'center', 'center' ) );

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
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function penguin_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'penguin_content_width', 840 );
}
add_action( 'after_setup_theme', 'penguin_content_width', 0 );

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
	$theme     = wp_get_theme();
	$penguin   = wp_get_theme( 'penguin-gold' );
	$minified  = get_theme_mod( 'min-files' );
	$suffix    = ( 1 == $minified ) ? '.min' : '';
	$fluidvids = get_theme_mod( 'fluidvids', true );

	if ( is_child_theme() ) {
		wp_enqueue_style( 'penguin-parent-style', get_template_directory_uri() . '/style' . $suffix . '.css', false, $penguin['Version'] );
	}

	wp_enqueue_style( 'penguin-style', get_stylesheet_uri(), false, $theme['Version'] );
	wp_enqueue_style( 'penguin-font', '//fonts.googleapis.com/css?family=Raleway:300,600' );

	if ( is_home() || is_archive() || is_search() ) {
		wp_enqueue_script( 'penguin-masonry-options', get_template_directory_uri() . '/js/masonry-options' . $suffix . '.js', array( 'masonry' ), '1.0', true );
	}

	wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll' . $suffix . '.js', array(), '5.3.3', true );
	wp_enqueue_script( 'penguin-navigation', get_template_directory_uri() . '/js/navigation' . $suffix . '.js', array(), '20120206', true );

	if ( 1 == $fluidvids ) {
		wp_enqueue_script( 'fluidvids', get_template_directory_uri() . '/js/fluidvids' . $suffix . '.js', array(), '2.4.1', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'penguin_scripts' );

/**
 * Make custom image size selectable from WordPress admin.
 *
 * @link http://codex.wordpress.org/Function_Reference/add_image_size
 */
function penguin_show_custom_image_sizes( $sizes ) {
	$sizes['Penguin800X400'] = __( 'PENGU!N image size', 'penguin' );

	return $sizes;
}
add_filter( 'image_size_names_choose', 'penguin_show_custom_image_sizes' );

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
	$fluidvids = get_theme_mod( 'fluidvids', true );
	// Do not add script if FluidVids plugin is installed
	if ( ! class_exists( 'FluidVids' ) && 1 == $fluidvids ) { ?>
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
require get_template_directory() . '/inc/extras-penguin.php';
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
require get_template_directory() . '/inc/customizer-options-gold.php';
require get_template_directory() . '/inc/customizer-styles-gold.php';

/*
 * Theme Hook Alliance files
 */
require( get_template_directory() . '/inc/tha-theme-hooks.php' );
