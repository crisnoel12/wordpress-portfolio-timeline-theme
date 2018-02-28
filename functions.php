<?php
/**
 * cn12_portfolio_timeline functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cn12_portfolio_timeline
 */

if ( ! function_exists( 'cn12_portfolio_timeline_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cn12_portfolio_timeline_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cn12_portfolio_timeline, use a find and replace
		 * to change 'cn12_portfolio_timeline' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cn12_portfolio_timeline', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'cn12_portfolio_timeline' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'cn12_portfolio_timeline_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'cn12_portfolio_timeline_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cn12_portfolio_timeline_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cn12_portfolio_timeline_content_width', 640 );
}
add_action( 'after_setup_theme', 'cn12_portfolio_timeline_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cn12_portfolio_timeline_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cn12_portfolio_timeline' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cn12_portfolio_timeline' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cn12_portfolio_timeline_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cn12_portfolio_timeline_scripts() {
	wp_enqueue_style( 'google_fonts', "https://fonts.googleapis.com/css?family=Montserrat|Roboto:400,700" );

	wp_enqueue_style( 'bootstrap4_css', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" );

	wp_enqueue_style( 'cn12_portfolio_timeline-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery3', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', '', '', true);

	wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array('jquery3'), '', true);

	wp_enqueue_script('bootstrap4_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery3'), '', true);

	wp_enqueue_script('main_js', get_template_directory_uri() . '/bundle.js', '', '', true);

	wp_enqueue_script( 'cn12_portfolio_timeline-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'cn12_portfolio_timeline-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cn12_portfolio_timeline_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Generate Custom Search Form
 * @param $form Form HTML
 * @return string Modified Form HTML
 */
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input type="search" class="form-control search-field" placeholder="Search..." value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" class="search-submit" value="'. esc_attr__( 'Search' ) .'" />
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );

// Register primary(navigation) menu
function register_theme_menus(){
    register_nav_menus(
        array(
            'navbar-menu' => __('Navbar Menu')
        )
    );
}
add_action('init', 'register_theme_menus');

