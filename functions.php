<?php
/**
 * Cleora functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cleora
 */

if ( ! defined( 'CLEORA_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'CLEORA_VERSION', '1.2' );
}
define('CLEORA_BLOG_DIR', get_template_directory().'/');
define('CLEORA_BLOG_URI', get_template_directory_uri().'/');

if ( ! function_exists( 'cleora_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cleora_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Cleora, use a find and replace
		 * to change 'cleora' to the name of your theme in all the template files.
		 */
		 load_theme_textdomain( 'cleora', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'cleora-thumb', 416, 277, true );
		add_image_size( 'cleora-medium', 856, 570, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'cleora' ),
			)
		);
		register_nav_menus(
			array(
				'footer' => esc_html__( 'Footer', 'cleora' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( "html5", array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-header' );
		add_theme_support( "custom-background", apply_filters('cleora_custom_background_args', array('default-color' => 'fbfbfb','default-image' => '',)));

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 150;
		$logo_height = 40;

		add_theme_support("custom-logo", array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);


		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

	}
endif;
add_action( 'after_setup_theme', 'cleora_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $cleora_content_width
 */
function cleora_content_width() {
	$GLOBALS['cleora_content_width'] = apply_filters( 'cleora_content_width', 900 );
}
add_action( 'after_setup_theme', 'cleora_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cleora_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cleora' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cleora' ),
			'before_widget' => '<section id="%1$s" class="border bg-white rounded-lg shadow-xl mb-4 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'cleora_widgets_init' );

// add_filter( 'use_widgets_block_editor', '__return_false' );

/**
 * Register custom fonts.
 */
function cleora_fonts_url() {
	$fonts_url = '';
	$fonts     = array();

	$fonts[] = 'Nunito:400';
 
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'display' => urlencode( "swap" ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
/**
 * Enqueue scripts and styles.
 */
function cleora_scripts() {

	wp_enqueue_style( 'cleora-google-fonts', cleora_fonts_url(), array(), null );
	wp_enqueue_style( 'cleora-style', get_stylesheet_uri(), array(), CLEORA_VERSION );
	wp_enqueue_style( 'cleora-tailwind', CLEORA_BLOG_URI.'assets/css/cleora.css', array(), CLEORA_VERSION );
	
	wp_enqueue_script( 'cleora-alpine', CLEORA_BLOG_URI.'assets/js/alpine.min.js', array(), '3.10.2');
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cleora_scripts' );


add_filter( 'clean_url', function( $url ) {
    if ( FALSE === strpos( $url, '.js' ) ) {
        return $url;
    }
    return "$url' defer='defer";
}, 11, 1 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/cleora-navwalker.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function cleora_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'cleora_excerpt_length', 999 );


function cleora_excerpt ($post_excerpt) { 
  $post_excerpt = '<p class="leading-relaxed my-2 text-sm text-gray-700">' . $post_excerpt . '</p>';
  return $post_excerpt;
  }

add_filter ('get_the_excerpt','cleora_excerpt');

function cleora_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'cleora_excerpt_more');



function cleora_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
		$count = ($count > 0) ? $count : 0;
    return "$count";
}
function cleora_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function cleora_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function cleora_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo cleora_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'cleora_posts_column_views' );
add_action( 'manage_posts_custom_column', 'cleora_posts_custom_column_views' );


add_filter(
  'wp_list_categories',
  function($str) {
    return str_replace('<br />','',$str);
  }
);


function pagination_bar( $query_wp ) 
{
    $pages = $query_wp->max_num_pages;
    $big = 999999999; // need an unlikely integer
    if ($pages > 1)
    {
        $page_current = max(1, get_query_var('paged'));
        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $page_current,
            'total' => $pages,
        ));
    }
}
