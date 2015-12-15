<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Utils;


/**
 * Add <body> classes
 */

add_filter('body_class', __NAMESPACE__ . '\\sage_body_class');

function sage_body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }
  // Add class if sidebar is active
  if (Utils\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }
  return $classes;
}


/**
 * Clean up the_excerpt()
 */

add_filter('excerpt_more', __NAMESPACE__ . '\\sage_excerpt_more');

function sage_excerpt_more() {
  return '&hellip; <a class="more" href="' . get_permalink() . '">' . __('Read More', 'sage') . '</a>';
}


/**
 * Filtering the Wrapper: Custom Post Types
 */

add_filter('sage/wrap_base', __NAMESPACE__ . '\\sage_wrap_base_cpts');

function sage_wrap_base_cpts($templates) {
    $cpt = get_post_type();
    if ($cpt) {
       array_unshift($templates, __NAMESPACE__ . 'base-' . $cpt . '.php');
    }
    return $templates;
}


/**
 * Search Filter
 */

add_action('pre_get_posts', __NAMESPACE__ . '\\sage_search_filter');

function sage_search_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_search) {
      $query->set('post_type', array('post'));
    }
  }
}


/**
 * Login Image
 */

add_action( 'login_enqueue_scripts', __NAMESPACE__ . '\\sage_login_logo' );

function sage_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/dist/images/backend-logo.png);
            background-size: contain;
        }
        .login h1 a {
            height: 62px !important;
            width: 320px !important;
        }
    </style>
<?php }


/**
 * Expand wp query
 */

add_filter('pre_get_posts', __NAMESPACE__ . '\\sage_query_post_type');

function sage_query_post_type($query) {
    if(is_category() || is_tag()) {
        $post_type = get_query_var('post_type');
        if($post_type)
            $post_type = $post_type;
        else
            $post_type = array('post', 'product', 'nav_menu_item');
        $query->set('post_type', $post_type);
        return $query;
    }
}


/**
 * Set default term on publish
 */

add_action( 'publish_product', __NAMESPACE__ . '\\sage_set_prop_tax' );

function sage_set_prop_tax($post_ID){
    $type = 'product_category';
    if(!has_term('',$type,$post_ID)){
        $term = get_term_by('slug', 'uncategorized', $type);
        wp_set_object_terms($post_ID, $term->term_id, $type);
    }
}


/**
 * Gravity Forms Field Choice Markup Pre-render
 */

add_filter( 'gform_field_choice_markup_pre_render', __NAMESPACE__ . '\\sage_choice_render', 10, 4 );

function sage_choice_render($choice_markup, $choice, $field, $value){
    if ( $field->get_input_type() == 'radio' || 'checkbox' ) {
        $choice_markup = preg_replace("/(<li[^>]*>)\s*(<input[^>]*>)\s*(<label[^>]*>)\s*([\w\s]*<\/label>\s*<\/li>)/", '$1$3$2$4', $choice_markup);
        return $choice_markup;
    }
    return $choice_markup;
}


/**
 * Page template builder
 */

add_action( 'the_content', __NAMESPACE__ . '\\sage_page_template_builder', 9999 );

function sage_page_template_builder($content){
    $page_builder = vp_metabox('page_builder.use_pb');
    $html = $content;

    if($page_builder) {

        $rows = vp_metabox('page_builder.row');

        foreach( $rows as $row ) {

            $layout = $row['container_layout'];

            $html .= '[container layout="'. $layout .'"]';
            $html .= '[row]';

            $columns = $row['column'];

            foreach( $columns as $col ) {
                $html .= '[column sm="'. $col['grid'] .'"]';
                $html .= do_shortcode($col['content']);
                $html .= '[/column]';
            }

            $html .= '[/row]';
            $html .= '[/container]';
        }

    }

    echo do_shortcode($html);
}


/**
 * Custom HTML
 */

add_action( 'get_header', __NAMESPACE__ . '\\sage_custom_html', 999 );

function sage_custom_html(){
    $options = vp_option('vpt_option');
    $editor_content = $options['editor_html'];
    echo $editor_content ? $editor_content : '';
}


/**
 * Custom CSS
 */

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\sage_custom_css', 999 );

function sage_custom_css(){
    $options = vp_option('vpt_option');
    $editor_content = $options['editor_css'];
    wp_add_inline_style( 'sage_css', $editor_content );
}


/**
 * Custom JS
 */

add_action( 'wp_footer', __NAMESPACE__ . '\\sage_custom_js', 999 );

function sage_custom_js(){
    $options = vp_option('vpt_option');
    $editor_content = $options['editor_js'];
    echo $editor_content ? '<script>'. $editor_content .'</script>' : '';
}


/**
 * Google Web Fonts
 */

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\sage_embed_fonts');

// embed font function
function sage_embed_fonts() {

    // add the font
    $options = vp_option('vpt_option');
    $elements = array('body', 'logo', 'menu', 'headings', 'dropdown');

    foreach( $elements as $el ) {
        $font_face   = $options[$el .'_font_face'];
        $font_weight = $options[$el .'_font_weight'];
        $font_style  = $options[$el .'_font_style'];
        \VP_Site_GoogleWebFont::instance()->add($font_face, $font_weight, $font_style);
    }

    \VP_Site_GoogleWebFont::instance()->register_and_enqueue();
}


/**
 * Custom colors
 */

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\sage_custom_colors', 999 );
function sage_custom_colors(){
    $options = vp_option('vpt_option');
    $editor_content = '<style type="text/css">
        body {
            background-color: '. $options['body_bg_color'] .';
            color: '. $options['body_text_color'] .';
            font-family: '. $options['body_font_face'] .';
            font-style: '. $options['body_font_style'] .';
            font-weight: '. $options['body_font_weight'] .';
            font-size: '. $options['body_font_size'] .'px;
            line-height: '. $options['body_font_height'] .'em;
        }

        a {
            color: '. $options['body_link_color'] .';
        }

        a:hover,
        a:focus {
            color: '. $options['body_link_hover_color'] .';
        }


        h1, h2, h3, h4, h5, h6 {
            font-family: '. $options['headings_font_face'] .';
            font-style: '. $options['headings_font_style'] .';
            font-weight: '. $options['headings_font_weight'] .';
            line-height: '. $options['headings_font_height'] .'em;
        }

        h1 {
            color: '. $options['h1_color'] .';
            font-size: '. $options['h1_font_size'] .'px;
        }

        h2 {
            color: '. $options['h2_color'] .';
            font-size: '. $options['h2_font_size'] .'px;
        }

        h3 {
            color: '. $options['h3_color'] .';
            font-size: '. $options['h3_font_size'] .'px;
        }

        h4 {
            color: '. $options['h4_color'] .';
            font-size: '. $options['h4_font_size'] .'px;
        }

        h5 {
            color: '. $options['h5_color'] .';
            font-size: '. $options['h5_font_size'] .'px;
        }

        h6 {
            color: '. $options['h6_color'] .';
            font-size: '. $options['h6_font_size'] .'px;
        }


        .navbar-default {
            background-color: '. $options['navbar_bg_color'] .';
        }


        .navbar-default .navbar-brand {
            color: '. $options['logo_color'] .';
            font-family: '. $options['logo_font_face'] .';
            font-style: '. $options['logo_font_style'] .';
            font-weight: '. $options['logo_font_weight'] .';
            font-size: '. $options['logo_font_size'] .'px;
            line-height: '. $options['logo_font_height'] .'em;
        }

        .navbar-default .navbar-brand:hover,
        .navbar-default .navbar-brand:focus {
            color: '. $options['logo_hover_color'] .';
        }


        .navbar-default .navbar-nav >li >a{
            color: '. $options['menu_link_color'] .';
            font-family: '. $options['menu_font_face'] .';
            font-style: '. $options['menu_font_style'] .';
            font-weight: '. $options['menu_font_weight'] .';
            font-size: '. $options['menu_font_size'] .'px;
            line-height: '. $options['menu_font_height'] .'em;
        }

        .navbar-default .navbar-nav >li >a:hover,
        .navbar-default .navbar-nav >li >a:focus,
        .navbar-default .navbar-nav >li.active >a{
            color: '. $options['menu_link_hover_color'] .';
        }

        .navbar-default .navbar-nav .open .dropdown-menu >li >a,
        .navbar-default .navbar-nav .dropdown-menu >li >a {
            background-color: '. $options['dropdown_link_bg_color'] .';
            color: '. $options['dropdown_link_color'] .';
            font-family: '. $options['dropdown_font_face'] .';
            font-style: '. $options['dropdown_font_style'] .';
            font-weight: '. $options['dropdown_font_weight'] .';
            font-size: '. $options['dropdown_font_size'] .'px;
            line-height: '. $options['dropdown_font_height'] .'em;
        }
        .navbar-default .navbar-nav .dropdown-menu >li >a:hover,
        .navbar-default .navbar-nav .dropdown-menu >li >a:focus,
        .navbar-default .navbar-nav .open .dropdown-menu >li >a:hover,
        .navbar-default .navbar-nav .open .dropdown-menu >li >a:focus,
        .navbar-default .navbar-nav .dropdown-menu >li.active >a {
            background-color: '. $options['dropdown_link_hover_bg_color'] .';
            color: '. $options['dropdown_link_hover_color'] .';
        }

        .content-info {
            background-color: '. $options['content_info_bg_color'] .';
            color: '. $options['content_info_text_color'] .';
        }

        .content-info a{
            color: '. $options['content_info_link_color'] .';
        }

        .content-info a:hover,
        .content-info a:focus {
            color: '. $options['content_info_link_hover_color'] .';
        }


        .content-info h1,
        .content-info h2,
        .content-info h3,
        .content-info h4,
        .content-info h5,
        .content-info h6 {
            color: '. $options['content_info_headings_color'] .';
        }

    </style>';

    wp_add_inline_style( 'sage_css', $editor_content );
}


/**
 *  Favicon
 */

add_action('wp_head', __NAMESPACE__ . '\\sage_site_favicon');

function sage_site_favicon() {
    $options = vp_option('vpt_option');
    $favicon = $options['favicon'] ? $options['favicon'] : get_template_directory_uri().'/dist/images/favicon.ico';
    echo '<link rel="shortcut icon" href="'. $favicon .'">';
}


/**
 * Remove image attributes
 */

add_filter( 'post_thumbnail_html', __NAMESPACE__ . '\\sage_remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', __NAMESPACE__ . '\\sage_remove_thumbnail_dimensions', 10 );
add_filter( 'the_content', __NAMESPACE__ . '\\sage_remove_thumbnail_dimensions', 10 );
add_filter( 'get_avatar', __NAMESPACE__ . '\\sage_remove_thumbnail_dimensions', 10 );

function sage_remove_thumbnail_dimensions( $html ) {
    // Loop through all <img> tags
    if (preg_match_all('/<img[^>]+>/ims', $html, $matches)) {
        foreach ($matches as $match) {
            // Replace all occurences of width/height
            $clean = preg_replace('/(width|height)=["\'\d%\s]+/ims', "", $match);
            // Replace with result within html
            $html = str_replace($match, $clean, $html);
        }
    }
    return $html;
}

/**
 * Register the html5 figure-non-responsive code fix.
 */
add_filter( 'img_caption_shortcode', __NAMESPACE__ . '\\sage_img_caption_shortcode_filter', 10, 3 );
function sage_img_caption_shortcode_filter($dummy, $attr, $content) {
  $atts = shortcode_atts( array(
      'id'      => '',
      'align'   => 'alignnone',
      'width'   => '',
      'caption' => '',
      'class'   => '',
  ), $attr, 'caption' );

  $atts['width'] = (int) $atts['width'];
  if ( $atts['width'] < 1 || empty( $atts['caption'] ) )
      return $content;

  if ( ! empty( $atts['id'] ) )
      $atts['id'] = 'id="' . esc_attr( $atts['id'] ) . '" ';

  $class = trim( 'wp-caption ' . $atts['align'] . ' ' . $atts['class'] );

  if ( current_theme_supports( 'html5', 'caption' ) ) {
      return '<figure ' . $atts['id'] . 'style="max-width: ' . (int) $atts['width'] . 'px;" class="' . esc_attr( $class ) . '">'
      . do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $atts['caption'] . '</figcaption></figure>';
  }

  // Return nothing to allow for default behaviour!!!
  return '';
}

/**
 * Allow upload SVG
 */
add_filter('upload_mimes', __NAMESPACE__ . '\\sage_mime_types');
function sage_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}


/**
 * prev/next posts links classes
 */
add_filter('previous_posts_link_attributes', __NAMESPACE__ . '\\prev_posts_link_attributes');
function prev_posts_link_attributes() {
    return 'class="prev-posts-link"';
}

add_filter('next_posts_link_attributes', __NAMESPACE__ . '\\next_posts_link_attributes');
function next_posts_link_attributes() {
    return 'class="next-posts-link"';
}
