<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');
function setup() {
  $options = vp_option('vpt_option');

  add_theme_support('soil-clean-up');         // Enable clean up from Soil
  add_theme_support('soil-relative-urls');    // Enable relative URLs from Soil
  add_theme_support('soil-nice-search');      // Enable nice search from Soil
  add_theme_support('soil-google-analytics', $options['ga_id']); // Enable Google Analytics
  //add_theme_support('soil-jquery-cdn');     // Enable jQuery from the Google CDN
  //add_theme_support('soil-js-to-footer');   // Enable js to footer
  add_theme_support('soil-nav-walker');     // Enable clean nav walker
  add_theme_support('bootstrap-gallery');     // Enable Bootstrap Gallery

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage')
  ]);

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  add_image_size('slider', 1200, 600, true);
  //update_option( 'medium_crop', 1 ); //Turn on image crop at medium size

  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  //add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style(Assets\asset_path('styles/editor-style.css'));

  // Allow shortcode execution in widgets
  add_filter('widget_text', 'do_shortcode');

  // Gets rid of the word "Archive:" in front of the Archive title
  add_filter( 'get_the_archive_title', function( $title ) {

    if ( is_post_type_archive() ) {
      $title = post_type_archive_title();
    }
    return $title;
  } );

  //remove_filter( 'the_content', 'wpautop' );

}

/**
 * Register sidebars
 */
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}

/**
 * Custom Post Type
 */
 add_action( 'init', __NAMESPACE__ . '\\create_post_type_product' );
function create_post_type_product() {

  register_post_type( 'product',
    array(
      'labels' => array(
        'name' => __( 'Products' ),
        'singular_name' => __( 'Product' ),
        'add_new' => __( 'Add Product' ),
        'add_new_item' => __( 'Add New Product' ),
      ),
      'rewrite' => array('slug' => __( 'product' )),
      'public' => true,
      'exclude_from_search' => false,
      'has_archive' => true,
      'hierarchical' => true,
      'menu_position' => 4,
      'capability_type' => 'post',
      'can_export' => true,
      'supports' => array(
        'title',
        'editor',
        'thumbnail'
      )
    )
  );

}

add_action( 'init', __NAMESPACE__ . '\\create_product_tax' );
function create_product_tax() {
    register_taxonomy(
        'product_category',
        array('product'),
        array(
            'label' => __( 'Category' ),
            'hierarchical' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'product-category',
                'with_front' => false
            )
        )
    );
}

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page(),
    is_post_type_archive('product'),
    is_singular('product')
  ]);

  return apply_filters('sage/display_sidebar', $display);
}


/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\sage_assets', 100);
function sage_assets() {
  wp_enqueue_style('sage_css', Assets\asset_path('styles/main.css'), false, null);
  wp_enqueue_style('font_awesome', "https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css", ['sage_css'], null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('modernizr', Assets\asset_path('scripts/modernizr.js'), [], null, true);
  wp_enqueue_script('sage_js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
}

/**
 * Configuration values
 */
if (!defined('WP_ENV')) {
  // Fallback if WP_ENV isn't defined in your WordPress config
  // Used in lib/assets.php to check for 'development' or 'production'
  define('WP_ENV', 'production');
}

if (!defined('DIST_DIR')) {
  // Path to the build directory for front-end assets
  define('DIST_DIR', '/dist/');
}
