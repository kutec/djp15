<?php
/**
 * DJP2015 functions and definitions
 *
 * @package DJP2015
 */

if ( ! function_exists( 'djp2015_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function djp2015_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on DJP2015, use a find and replace
	 * to change 'djp2015' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'djp2015', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'djp2015' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	
	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 
	
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
	*/

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'djp2015_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // djp2015_setup
add_action( 'after_setup_theme', 'djp2015_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function djp2015_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'djp2015_content_width', 640 );
}
add_action( 'after_setup_theme', 'djp2015_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function djp2015_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'djp2015' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="widget--inner">',
		'after_widget'  => '</div></aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Intro', 'djp2015' ),
		'id'            => 'sidebar-intro',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="page-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="page-widget--title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'djp2015_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function djp2015_scripts() {
	wp_enqueue_style( 'djp2015-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'djp2015-jquery', get_template_directory_uri() . '/js/jquery-1.11.3.min.js', array(), '20150617', false );
	wp_enqueue_script( 'djp2015-mordenizr', get_template_directory_uri() . '/js/modernizr.custom.72786.js', array(), '20150617', true );
	wp_enqueue_script( 'djp2015-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20150617', true );
	wp_enqueue_script( 'djp2015-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '20150617', true );
	wp_enqueue_script( 'djp2015-isotope-mh', get_template_directory_uri() . '/js/masonry-horizontal.js', array(), '20150626', true );
	wp_enqueue_script( 'djp2015-isotope-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '20150626', true );
	
	wp_enqueue_script( 'djp2015-ku-data-href', get_template_directory_uri() . '/js/ku-data-href.js', array(), '20150627', true );

	wp_enqueue_script( 'djp2015-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'djp2015-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'djp2015_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/theme.php';
