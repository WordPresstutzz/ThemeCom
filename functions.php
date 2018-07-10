<?php
/**
 * ThemeCom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ThemeCom
 */

if ( ! function_exists( 'themecom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function themecom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ThemeCom, use a find and replace
		 * to change 'themecom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'themecom','WooCommerce', get_template_directory() . '/languages' );

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
		 * Let WordPress manage the Woocomerce styles and templates.
		 * By adding theme support,  WooCommerce comes with default styles, and we are
		 * going to override them and create new ones.
		 * 
		 */
		add_action( 'after_setup_theme' , 'woocommerce_support' );

		function woocommerce_support() {

		add_theme_support( 'woocommerce' );

		}
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size('slider', 1200,500,true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'themecom' ),
			'menu-2' => esc_html__( 'Category', 'themecom' ),	
			'menu-3' => esc_html__( 'Small Menu', 'themecom' ),	
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
		add_theme_support( 'custom-background', apply_filters( 'themecom_custom_background_args', array(
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
add_action( 'after_setup_theme', 'themecom_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function themecom_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'themecom_content_width', 640 );
}
add_action( 'after_setup_theme', 'themecom_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function themecom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'themecom' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'themecom' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'themecom_widgets_init' );

// First footer widget area, located in the footer. Empty by default.
register_sidebar(
    array(
        'name' => __( 'First Footer Widget Area', 'compass' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'The first footer widget area', 'compass' ),
        'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
                'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>'
    )
);
 
// Second Footer Widget Area, located in the footer. Empty by default.
register_sidebar(
    array(
        'name' => 'Second Footer Widget Area',
        'id' => 'second-footer-widget-area',
        'description' => 'The second footer widget area',
        'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
                'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
    )
);
 
// Third Footer Widget Area, located in the footer. Empty by default.
register_sidebar(
    array(
        'name' => 'Third Footer Widget Area',
        'id' => 'third-footer-widget-area',
        'description' => 'The third footer widget area',
        'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
                'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
    )
);
 
// Fourth Footer Widget Area, located in the footer. Empty by default.
register_sidebar(
    array(
        'name' => 'Fourth Footer Widget Area',
        'id' => 'fourth-footer-widget-area',
        'description' => 'The fourth footer widget area',
        'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
                'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
    )
);
/**
 * Enqueue scripts and styles.
 */
function themecom_scripts() {

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	 wp_enqueue_style( 'themecom-style', get_stylesheet_uri() );
	  //Load fontawesome
	  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome' . $suffix . '.css', '', '4.7.0' );
	  //Load Bootstrap CSS
	  wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
	  wp_enqueue_style( 'bootstrap-css-CDN', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
	  //Load Bootstrap Javascript 
	  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap'.$suffix.'.js', array(), '20151215', true );
	  //Load Javascript for Category_menu 
	  wp_enqueue_script( 'js_category_menu',get_template_directory_uri() . '/js/cat_script.js' );
	 
	  //Load Javascript for Slider  
	  wp_enqueue_script( 'js_slider',get_template_directory_uri() . '/js/slider_script.js' );
  	  //Load  jQuery Javascript 
	 wp_enqueue_script( 'jQuery-js-CDN', 'http://code.jquery.com/jquery-1.10.1.min.js' );
	 
	 wp_enqueue_script( 'themecom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	 wp_enqueue_script( 'themecom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'themecom_scripts' );
/**
 * Implement the Custom Woocommerce Script.
 */
function themecom_woocommerce_scripts() {

wp_enqueue_style( 'custom-woocommerce-style',get_template_directory_uri() . '/assets/css/custom-woocommerce.css');
 wp_enqueue_script( 'themecom-auto_update_cart_qty', get_template_directory_uri() . '/js/woocommerce/auto_update_cart_qty.js', array(), '20151215', true );

}

add_action( 'wp_enqueue_scripts' , 'themecom_woocommerce_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement auto update cart. 
require get_template_directory() . '/woocommerce/Auto-update-cart-qty.php';
*/
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Woocommerce Template FUnctons and Hooks for this theme.
 */
require get_template_directory() . '/inc/woocommerce/class_themecom_woocommerce.php';
require get_template_directory() . '/inc/woocommerce/themecom-woocommerce-template-hooks.php';
require get_template_directory() . '/inc/woocommerce/themecom-woocommerce-template-functions.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/template-parts/slider_posts_type.php';
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

