<?php

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 780; /* pixels */
}

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require_once get_template_directory() . '/inc/jetpack.php';


if ( ! function_exists( 'undiscovered_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function undiscovered_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Undiscovered, use a find and replace
	 * to change 'undiscovered' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'undiscovered', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'undiscovered' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', 'quote', 'link' ) );
}
endif; // undiscovered_setup
add_action( 'after_setup_theme', 'undiscovered_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function undiscovered_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar left', 'undiscovered' ),
		'id'            => 'sidebar-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar right', 'undiscovered' ),
		'id'            => 'sidebar-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'undiscovered_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function undiscovered_scripts() {
	
	wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'skide-css', get_template_directory_uri() . '/css/jquery.cslider.css' );
	wp_enqueue_script(
		'c1',
		get_template_directory_uri() . '/js/modernizr.custom.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'c2',
		get_template_directory_uri() . '/js/jquery.cslider.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'undiscovered-main-script',
		get_template_directory_uri() . '/js/main.js',
		array( 'jquery' )
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'undiscovered_scripts' );

add_filter( 'use_default_gallery_style', '__return_false' );

add_filter('body_class', 'add_logged_out_body_class');
function add_logged_out_body_class($classes) {
	if (! is_user_logged_in())
		$classes[] = 'logged-out';

	return $classes;
}
