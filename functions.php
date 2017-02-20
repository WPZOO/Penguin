<?php
/**
 * Functions and definitions
 *
 * @package Penguin Gold
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

	// Add custom image sizes.
	add_image_size( 'Penguin800X400', '800', '400', array( 'center', 'center' ) );
	add_image_size( 'Penguin1200X600', '1200', '600', array( 'center', 'center' ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );

	/*
	 * Enable support for custom logo.
	 * @since Penguin 0.2.0
	 */
	add_theme_support( 'custom-logo', array(
		'height'     => 100,
		'flex-width' => true,
		'header-text' => array( 'site-title' ),
	) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );

}
endif; // penguin_setup
add_action( 'after_setup_theme', 'penguin_setup' );

/*
 * Enable some theme styles for the visual editor
 */
function penguin_add_editor_styles() {
	add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'penguin_add_editor_styles' );

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
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
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
	$suffix    = ( 1 === $minified ) ? '.min' : '';
	$fluidvids = get_theme_mod( 'fluidvids', true );

	if ( is_child_theme() ) {
		wp_enqueue_style( 'penguin-parent-style', get_template_directory_uri() . '/style.css', false, $penguin['Version'] );
		wp_style_add_data( 'penguin-parent-style', 'suffix', $suffix );
	}

	wp_enqueue_style( 'penguin-style', get_stylesheet_uri(), false, $theme['Version'] );
	wp_enqueue_style( 'penguin-font', '//fonts.googleapis.com/css?family=Raleway:300,600' );

	if ( is_home() || is_archive() || is_search() ) {
		wp_enqueue_script( 'penguin-masonry-options', get_template_directory_uri() . '/js/masonry-options' . $suffix . '.js', array( 'masonry' ), '1.0', true );
	}

	wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll' . $suffix . '.js', array(), '5.3.3', true );
	wp_enqueue_script( 'penguin-navigation', get_template_directory_uri() . '/js/navigation' . $suffix . '.js', array(), '20161106', true );
	wp_enqueue_script( 'svg4everybody', get_template_directory_uri() . '/js/svg4everybody' .$suffix . '.js', array(), '2.1.4', true );

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
	$sizes['Penguin800X400'] = __( 'Penguin image size', 'penguin' );

	return $sizes;
}
add_filter( 'image_size_names_choose', 'penguin_show_custom_image_sizes' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Penguin 0.2
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function penguin_content_image_sizes_attr($size) {
	// Singular posts with sidebar
	if ( is_singular() || is_sticky() ) {
		return '(max-width: 599px) calc(100vw - 50px), (max-width: 767px) calc(100vw - 70px), (max-width: 991px) 429px, (max-width: 1199px) 637px, 747px';
	}
	// Page full width without sidebar
	if ( get_page_template_slug() === 'page-fullwidth.php' ) {
		return '(max-width: 599px) calc(100vw - 50px), (max-width: 767px) calc(100vw - 70px), (max-width: 991px) 679px, (max-width: 1199px) 879px, 1039px';
	}
	// 2 col blog with sidebar
	else {
		return '(max-width: 599px) calc(100vw - 50px), (max-width: 767px) calc(100vw - 70px), (max-width: 991px) 429px, (max-width: 1199px) 637px, 354px';
	}
}
add_filter('wp_calculate_image_sizes', 'penguin_content_image_sizes_attr', 10 , 2);

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Penguin 0.2
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function penguin_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'Penguin800X400' === $size ) {
		$attr['sizes'] = '(max-width: 767px) calc(100vw - 30px), (max-width: 991px) 469px, (max-width: 1199px) 696.5px, 414px';
	}
	if ( 'Penguin800X400' === $size && ( is_sticky() ) ) {
		$attr['sizes'] = '(max-width: 767px) calc(100vw - 30px), (max-width: 991px) 469px, (max-width: 1199px) 696.5px, 846.5px';
	}
	if ( 'full' === $size && ( is_singular() ) ) {
		$attr['sizes'] = '100vw';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'penguin_post_thumbnail_sizes_attr', 10 , 3 );

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
	<?php } ?>
	<script>svg4everybody();</script>
	<?php
}
add_action( 'wp_footer', 'penguin_wp_footer', 21 );

/**
 * Custom template tags for this theme
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Penguin extras
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
require get_template_directory() . '/inc/style-builder.php';
require get_template_directory() . '/inc/customizer-options.php';
require get_template_directory() . '/inc/customizer-options-gold.php';
require get_template_directory() . '/inc/customizer-styles-gold.php';

/*
 * Theme Hook Alliance files
 */
require( get_template_directory() . '/inc/tha-theme-hooks.php' );
