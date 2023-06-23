<?php
/**
 * msrsandbox functions and definitions
 *
 * @package msrsandbox
 */

 if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

require_once('inc/controllers/cpt.php');
require_once('inc/controllers/cpt-admin.php');
require_once('inc/controllers/search.php');

/**
 * Register navigation menus uses wp_nav_menu.
 */

function msrsandbox_menus() {

	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'msrsandbox' ),
		'footer'   => __( 'Footer Menu', 'msrsandbox' ),
		'social'   => __( 'Social Menu', 'msrsandbox' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'msrsandbox_menus' );

/**
 * Register styles and scripts for WP Theme.
 */

 function theme_scripts() {
	wp_enqueue_style('StyleCSS', get_template_directory_uri() . '/style.css' , array(), time());
	wp_register_style('appcss', get_template_directory_uri() . '/dist/app.css' , [], 1 , 'all');
    wp_enqueue_style('appcss');

	wp_enqueue_script('AnimationJS', get_template_directory_uri() . '/src/js/animation.js', array('jquery'));
    wp_enqueue_script('PostsJS', get_template_directory_uri() . '/src/js/posts.js', array('jquery'));
	wp_enqueue_script('NavJS', get_template_directory_uri() . '/src/js/navigation.js', array(), _S_VERSION, true );
    wp_register_script('appjs', get_template_directory_uri() . '/dist/app.js' , ['jquery'], 1 , true);
    wp_enqueue_script('appjs');
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function msrsandbox_setup() {
	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		*/
	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'msrsandbox' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'msrsandbox_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'msrsandbox_setup' );

/**
 * Custom Logo for WP Theme.
 */

add_filter( 'get_custom_logo', 'add_custom_logo_url' );
function add_custom_logo_url() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="navbar-brand" rel="home" itemprop="url">%2$s</a>',
            esc_url( '/' ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'custom-logo',
            ) )
        );
    return $html;   
} 