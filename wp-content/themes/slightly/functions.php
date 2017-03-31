<?php
/**
 * Slightly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Slightly
 */

if ( ! function_exists( 'slightly_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function slightly_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Slightly, use a find and replace
	 * to change 'slightly' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'slightly', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'slightly' ),
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
	add_theme_support( 'custom-background', apply_filters( 'slightly_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'slightly_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function slightly_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'slightly_content_width', 640 );
}
add_action( 'after_setup_theme', 'slightly_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function slightly_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'slightly' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'slightly' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    
	register_sidebar( array(
		'name'          => 'Footer widget area',
		'id'            => 'footer',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'slightly_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function slightly_scripts() {
	wp_enqueue_style( 'slightly-style', get_stylesheet_uri() );

	wp_enqueue_script( 'slightly-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'slightly-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'slightly_scripts' );

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

/**
 * Get recent posts for homepage
 * https://css-tricks.com/snippets/wordpress/recent-posts-function/
 */
function recent_posts($no_posts = 10, $excerpts = true) {

   global $wpdb;

   $request = "SELECT ID, post_title, post_excerpt FROM $wpdb->posts WHERE post_status = 'publish' AND post_type='post' ORDER BY post_date DESC LIMIT $no_posts";

   $posts = $wpdb->get_results($request);

   if($posts) {

       foreach ($posts as $posts) {
               $post_title = stripslashes($posts->post_title);
               $permalink = get_permalink($posts->ID);
               $feat_image = wp_get_attachment_url( get_post_thumbnail_id($posts->ID) );
           
           if ($feat_image) {
                 $output .= '<div class="col-xs-12 col-sm-6 col-md-4"><a href="' . $permalink . '" rel="bookmark" title="Permanent Link: ' . htmlspecialchars($post_title, ENT_COMPAT) . '"><div class="post-thumb mg-down" style="background-image: url(' . $feat_image . ');"></div></a><h2><a href="' . $permalink . '" rel="bookmark" title="Permanent Link: ' . htmlspecialchars($post_title, ENT_COMPAT) . '">' . htmlspecialchars($post_title) . '</a></h2>';
              if($excerpts) {
                       $output.= '<p>' . stripslashes($posts->post_excerpt) . '</p>';
               }

               $output .= '</div>';
           } else {
                $output .= '<div class="col-xs-12 col-sm-6 col-md-4"><h2><a href="' . $permalink . '" rel="bookmark" title="Permanent Link: ' . htmlspecialchars($post_title, ENT_COMPAT) . '">' . htmlspecialchars($post_title) . '</a></h2>';
              if($excerpts) {
                       $output.= '<p>' . stripslashes($posts->post_excerpt) . '</p>';
               }

               $output .= '</div>';
           }

       }

   } else {
           $output .= '<li>No posts found</li>';
   }

   echo $output;
}

/**
 * Add theme support for custom logo in header
 */
add_theme_support( 'custom-logo' );

/**
 * Custom header text
 */
function slightly_header_text() {

	if ( !function_exists('pll_register_string') ) {
		$header_text 		= get_theme_mod('header_text');
		$header_subtext 	= get_theme_mod('header_subtext');
		$header_button		= get_theme_mod('header_button');
	} else {
		$header_text 		= pll__(get_theme_mod('header_text'));
		$header_subtext 	= pll__(get_theme_mod('header_subtext'));
		$header_button		= pll__(get_theme_mod('header_button'));
	}
	$header_button_url	= get_theme_mod('header_button_url');

	echo '<div class="header-info">
            <h2>' . wp_kses_post($header_text) . '</h2>
            <p>' . wp_kses_post($header_subtext) . '</p>';
            if ($header_button_url) {
                echo '<a class="button header-button" href="' . esc_url($header_button_url) . '">' . esc_html($header_button) . '</a>';
            }
	echo '</div>';
}