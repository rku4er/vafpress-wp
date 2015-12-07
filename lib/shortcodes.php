<?php

namespace Roots\Sage\Shortcodes;
use Roots\Sage\Utils;

/**
 * Slider shortcode
 */
add_shortcode( 'slider', __NAMESPACE__.'\\sage_slider' );
function sage_slider( $attr ){
    $defaults = array ();
    $atts = wp_parse_args( $atts, $defaults );

    if( isset($GLOBALS['carousel_count']) )
      $GLOBALS['carousel_count']++;
    else
      $GLOBALS['carousel_count'] = 0;

    global $wp_query;

    $page_ID     = $wp_query->queried_object->ID;
    $prefix      = 'sage_slider_';

    $animation   = get_post_meta( $page_ID, $prefix .'animation', true );
    $pause       = get_post_meta( $page_ID, $prefix .'hover', true );
    $wrap        = get_post_meta( $page_ID, $prefix .'wrap', true );
    $keyboard    = get_post_meta( $page_ID, $prefix .'keyboard', true );
    $arrows      = get_post_meta( $page_ID, $prefix .'arrows', true );
    $bullets     = get_post_meta( $page_ID, $prefix .'bullets', true );
    $fullscreen  = get_post_meta( $page_ID, $prefix .'fullscreen', true );
    $interval    = get_post_meta( $page_ID, $prefix .'interval', true );
    $height      = get_post_meta( $page_ID, $prefix .'height', true );
    $slides      = get_post_meta( $page_ID, $prefix .'group', true );

    $carousel_class = sprintf('row carousel carousel-inline %s %s',
        $animation === 'fade' ? ' slide carousel-fade' : ' slide',
        $fullscreen ? ' carousel-fullscreen' : ''
    );
    $carousel_inner_class = 'carousel-inner';
    $carousel_id = 'carousel-'. $GLOBALS['carousel_count'];

    $indicators  = array();
    $items       = array();

    if($slides){

        $i = -1;

        foreach($slides as $slide):
            $i++;

            $image_obj = wp_get_attachment_image_src($slide['image_id'], 'slider');
            $image_original = preg_replace("/-\d+x\d+/", "$2", $image_obj[0]);;
            $target = $slide['new_tab'] ? 'target="_blank"' : '';

            $image = sprintf('%s<img src="%s" alt="" >%s',
                $slide['link_url'] ? '<a href="' . $slide['link_url'] . '" '. $target .'>' : '',
                $image_obj[0],
                $slide['link_url'] ? '</a>' : ''
            );

            $item_style = sprintf('%s %s',
                'background-image: url('. $image_obj[0] .');',
                'background-attachment: scroll;'
            );

            if($slide['title_text']){
                $title_style = '
                    color: '. $slide['title_color'] .';
                    -webkit-animation-delay: '. $slide['title_anim_delay'] .'s;
                    animation-delay: '. $slide['title_anim_delay'] .'s;
                    -webkit-animation-duration: '. $slide['title_anim_duration'] .'s;
                    animation-duration: '. $slide['title_anim_duration'] .'s;
                ';
                $title_html = '<h3 class="slide-title" data-animated="true" data-animation="'. $slide['title_anim'] .'" style="'
                    . $title_style .'">'
                    . $slide['title_text'] . '</h3>';
            }

            if($slide['caption_text']){
                $caption_style = '
                    color: '. $slide['caption_color'] .';
                    -webkit-animation-delay: '. $slide['caption_anim_delay'] .'s;
                    animation-delay: '. $slide['caption_anim_delay'] .'s;
                    -webkit-animation-duration: '. $slide['caption_anim_duration'] .'s;
                    animation-duration: '. $slide['caption_anim_duration'] .'s;
                ';
                $caption_html = '<div class="slide-caption" data-animated="true" data-animation="'. $slide['caption_anim'] .'" style="'
                    . $caption_style .'"><p>'
                    . $slide['caption_text'] . '</p></div>';
            }

            $overlay_style = '
                -webkit-animation-delay: ' . $slide['overlay_anim_delay'] . 's;
                animation-delay: ' . $slide['overlay_anim_delay'] . 's;
                -webkit-animation-duration: ' . $slide['overlay_anim_duration'] . 's;
                animation-duration: ' . $slide['overlay_anim_duration'] . 's;
            ';
            $overlay_inner_style = '
                background-color:' . $slide['overlay_color'] . ';
                opacity: ' . $slide['overlay_opacity'] . ';
            ';
            $overlay_html = '<span data-animated="true" data-animation="' . $slide['overlay_anim'] . '" style="' . $overlay_style . '"><span style="' . $overlay_inner_style . '"></span></span>';

            if($slide['show_caption']){
                $caption = sprintf(
                    '<div class="carousel-caption container %s %s">'
                        .'<div>'
                            .'<div>'
                                .'<div class="text-wrapper" style="%s">%s%s%s</div>'
                            .'</div>'
                        .'</div>'
                    .'</div>',
                    'align-'.$slide['align'],
                    'valign-'.$slide['valign'],
                    'max-width: '. $slide['text_width'],
                    $title_html,
                    $caption_html,
                    $overlay_html
                );
            }

            $active_class = ($i == 0) ? 'active' : '';

            $indicators[] = sprintf(
              '<li class="%s" data-target="%s" data-slide-to="%s"></li>',
              $active_class,
              '#' . $carousel_id,
              $i
            );

            $items[] = sprintf('<div class="%s" style="%s">%s%s</div>',
              'item ' . $active_class,
              $item_style,
              $image,
              $caption
          );

        endforeach;


        if($items) return sprintf( '<div %s %s><div %s %s>%s</div>%s</div>',
            sprintf('class="%s" id="%s"',
                $carousel_class,
                $carousel_id
            ),
            sprintf('%s %s %s %s',
                'data-ride="carousel"',
                'data-interval="'. ($interval ? $interval*1000 : 'false') .'"',
                'data-pause="'. ($pause ? 'hover' : 'false') .'"',
                'data-wrap="'. ($wrap ? 'true' : 'false') .'"',
                'data-keyboard="'. ($keyboard ? 'true' : 'false') .'"'
            ),
            sprintf('class="%s"',
                $carousel_inner_class
            ),
            sprintf('style="height: %s;"',
                $height
            ),
            implode($items),
            sprintf('%s%s',
                $bullets ? sprintf('<ol class="%s">%s</ol>',
                    'carousel-indicators',
                    implode($indicators)
                ) : '',
                $arrows ? sprintf( '%s%s',
                    sprintf('<a class="%s" href="%s" data-slide="%s">%s</a>',
                        'left carousel-control',
                        '#'. $carousel_id,
                        'prev',
                        '<span class="glyphicon glyphicon-chevron-left"></span>'
                    ),
                    sprintf('<a class="%s" href="%s" data-slide="%s">%s</a>',
                        'right carousel-control',
                        '#'. $carousel_id,
                        'next',
                        '<span class="glyphicon glyphicon-chevron-right"></span>'
                    )
                ) : ''
            )
        );
    }
}

/**
 * Socials
 */

add_shortcode( 'socials', __NAMESPACE__.'\\sage_socials' );
function sage_socials( $attr ){
    $defaults = array (
        'label' => false
    );
    $atts = wp_parse_args( $atts, $defaults );

    global $redux_demo;
    $socials = $redux_demo['socials'];

    if($socials){
        $buffer = '<span class="socials">';
        $buffer .= $atts['label'] ? '<span>'. $atts['label'] .'</span>' : '';

        foreach( $socials as $key => $value ){
            $buffer .= $value ? '<a href="'. $value . '" target="_blank"><i class="socicon socicon-'. strtolower($key) .'"></i></a>' : '';
        }
        $buffer .= '</span>';

        return $buffer;
    }
}

/**
  * Vertical Tabs
  *
  */
add_shortcode( 'tabs_vertical', __NAMESPACE__.'\\sage_tabs_vertical' );
function sage_tabs_vertical( $atts, $content = null ) {
  $defaults = array ();
  $atts = wp_parse_args( $atts, $defaults );

  if( isset( $GLOBALS['tabs_count'] ) )
    $GLOBALS['tabs_count']++;
  else
    $GLOBALS['tabs_count'] = 0;

  $tabs_nav_class  = 'nav nav-tabs tabs-vertical tabs-left';
  $tabs_content_class = 'tab-content';

  $id = 'custom-tabs-'. $GLOBALS['tabs_count'];

  $data_props = $atts['data'];

  $atts_map = Utils\attribute_map( $content );

  // Extract the tab titles for use in the tab widget.
  if ( $atts_map ) {
    $tabs = array();

    $i = 0;
    foreach( $atts_map as $tab ) {
      $i++;

      $class  ='';
      $class .= ( !empty($tab["tab"]["active"]) || ($GLOBALS['tabs_default_active'] && $i == 1) ) ? 'active' : '';
      $class .= ( !empty($tab["tab"]["xclass"]) ) ? ' ' . $tab["tab"]["xclass"] : '';

      $tabs[] = sprintf(
        '<li%s><a href="#%s" data-toggle="tab" aria-expanded="%s">%s</a></li>',
        ( !empty($class) ) ? ' class="' . $class . '"' : '',
        'custom-tab-' . $GLOBALS['tabs_count'] . '-' . md5($tab["tab"]["title"]),
        ($i == 1) ? 'true' : 'false',
        $tab["tab"]["title"]
      );
    }
  }

  return sprintf(
    '<div class="row"><div class="col-sm-4">%s<ul class="%s" id="%s"%s>%s</ul></div><div class="col-sm-8"><div class="%s">%s</div></div></div>',
    sprintf('<h4 class="sidebar-title" style="text-align: right">%s</h4>', $atts['text']),
    esc_attr( $tabs_nav_class ),
    esc_attr( $id ),
    ( $data_props ) ? ' ' . $data_props : '',
    ( $tabs )  ? implode( $tabs ) : '',
    esc_attr( $tabs_content_class ),
    do_shortcode( $content )
  );
}


/**
  * Products
  */
add_shortcode( 'products', __NAMESPACE__.'\\sage_products' );
function sage_products( $atts, $content = null ) {
    $defaults = array (
        'taxonomy' => 'product_category',
        'columns'  => '4',
        'size'     => 'thumbnail'
    );
    $atts = wp_parse_args( $atts, $defaults );

    $args = array(
        'post_type' => 'product',
        'numberposts' => '-1',
    );
    $products = get_posts( $args );

    if($products){
        $html = '[tabs_vertical type="tabs" text="'. __('All Products', 'sage') .'"]';
        $term_array = array();
        $i = 0;

        foreach ($products as $product): $i++;
            $terms = get_the_terms( $product->ID, $atts['taxonomy'] );

            foreach($terms as $term){
                if(empty($term_array[$term->term_id])){
                    $term_array[$term->name] = $term;
                }
            }

        endforeach;

        ksort($term_array);

        foreach ($term_array as $term){
            $args['tax_query'] = array(
                array(
                    'taxonomy' => $atts['taxonomy'],
                    'field' => 'id',
                    'terms' => $term->term_id,
                    'include_children' => false
                )
            );

            $tab_products = get_posts( $args );
            $html .= '[tab title="'. $term->name .'" fade="true"]';
            $thumb_ids_array = array();

            foreach( $tab_products as $product ){
                $thumb_ids_array[] = get_post_thumbnail_id( $product->ID );
            }

            $html .= '<h2 class="term-title">'. $term->name .'</h2>';
            $html .= do_shortcode('[gallery link="file" size="'. $atts['size'] .'" columns="'. $atts['columns'] .'" ids="'. join(',', $thumb_ids_array) .'"]');
            $html .= '[/tab]';
        }

        $html .= '[/tabs_vertical]';

        return do_shortcode($html);

    }
}

/**
  * Container
  */
add_shortcode( 'container', __NAMESPACE__.'\\sage_container' );
function sage_container( $atts, $content = null ) {
    $defaults = array (
        'fluid' => false
    );
    $atts = wp_parse_args( $atts, $defaults );

    return sprintf('<div class="%s">%s</div>',
        $atts['fluid'] ? 'container-fluid' : 'container',
        do_shortcode($content)
    );
}

/**
  * Row
  */
add_shortcode( 'row', __NAMESPACE__.'\\sage_row' );
function sage_row( $atts, $content = null ) {
    $defaults = array ();
    $atts = wp_parse_args( $atts, $defaults );

    $html = '<div class="row">'. $content .'</div>';

    return do_shortcode($html);
}

/**
  * Column
  */
add_shortcode( 'column', __NAMESPACE__.'\\sage_column' );
function sage_column( $atts, $content = null ) {
    $defaults = array (
      "lg"          => false,
      "md"          => false,
      "sm"          => false,
      "xs"          => false,
      "offset_lg"   => false,
      "offset_md"   => false,
      "offset_sm"   => false,
      "offset_xs"   => false,
      "pull_lg"     => false,
      "pull_md"     => false,
      "pull_sm"     => false,
      "pull_xs"     => false,
      "push_lg"     => false,
      "push_md"     => false,
      "push_sm"     => false,
      "push_xs"     => false
    );
    $atts = wp_parse_args( $atts, $defaults );

    $class  = '';
    $class .= ( $atts['lg'] )                                           ? ' col-lg-' . $atts['lg'] : '';
    $class .= ( $atts['md'] )                                           ? ' col-md-' . $atts['md'] : '';
    $class .= ( $atts['sm'] )                                           ? ' col-sm-' . $atts['sm'] : '';
    $class .= ( $atts['xs'] )                                           ? ' col-xs-' . $atts['xs'] : '';
    $class .= ( $atts['offset_lg'] || $atts['offset_lg'] === "0" )      ? ' col-lg-offset-' . $atts['offset_lg'] : '';
    $class .= ( $atts['offset_md'] || $atts['offset_md'] === "0" )      ? ' col-md-offset-' . $atts['offset_md'] : '';
    $class .= ( $atts['offset_sm'] || $atts['offset_sm'] === "0" )      ? ' col-sm-offset-' . $atts['offset_sm'] : '';
    $class .= ( $atts['offset_xs'] || $atts['offset_xs'] === "0" )      ? ' col-xs-offset-' . $atts['offset_xs'] : '';
    $class .= ( $atts['pull_lg']   || $atts['pull_lg'] === "0" )        ? ' col-lg-pull-' . $atts['pull_lg'] : '';
    $class .= ( $atts['pull_md']   || $atts['pull_md'] === "0" )        ? ' col-md-pull-' . $atts['pull_md'] : '';
    $class .= ( $atts['pull_sm']   || $atts['pull_sm'] === "0" )        ? ' col-sm-pull-' . $atts['pull_sm'] : '';
    $class .= ( $atts['pull_xs']   || $atts['pull_xs'] === "0" )        ? ' col-xs-pull-' . $atts['pull_xs'] : '';
    $class .= ( $atts['push_lg']   || $atts['push_lg'] === "0" )        ? ' col-lg-push-' . $atts['push_lg'] : '';
    $class .= ( $atts['push_md']   || $atts['push_md'] === "0" )        ? ' col-md-push-' . $atts['push_md'] : '';
    $class .= ( $atts['push_sm']   || $atts['push_sm'] === "0" )        ? ' col-sm-push-' . $atts['push_sm'] : '';
    $class .= ( $atts['push_xs']   || $atts['push_xs'] === "0" )        ? ' col-xs-push-' . $atts['push_xs'] : '';
    $class .= ( $atts['xclass'] )                                       ? ' ' . $atts['xclass'] : '';

    return sprintf('<div class="%s">%s</div>',
      esc_attr( $class ),
      do_shortcode( $content )
    );
}

/**
  * Clear
  */
add_shortcode( 'clearfix', __NAMESPACE__.'\\sage_clearfix' );
function sage_clearfix( $atts, $content = null ) {
    $defaults = array ();
    $atts = wp_parse_args( $atts, $defaults );

    $html = '<div class="clearfix"></div>';

    return do_shortcode($html);
}

/**
  * Searchform
  */
add_shortcode( 'searchform', __NAMESPACE__.'\\sage_searchform' );
function sage_searchform( $atts, $content = null ) {
    $defaults = array ();
    $atts = wp_parse_args( $atts, $defaults );

    return get_search_form(false);
}

/**
  * Sidebar
  */
add_shortcode( 'sidebar', __NAMESPACE__.'\\sage_sidebar' );
function sage_sidebar( $atts, $content = null ) {
    $defaults = array ();
    $atts = wp_parse_args( $atts, $defaults );
    ob_start();
    dynamic_sidebar('sidebar-primary');
    return ob_get_clean();
}

/**
  * Background Video
  */
add_shortcode( 'background', __NAMESPACE__.'\\sage_background' );
function sage_background( $atts, $content = null ) {
    $defaults = array (
        'section_class'   => 'background-video row',
        'id' => '1'
    );
    $atts = wp_parse_args( $atts, $defaults );

    global $wp_query;
    $page_ID = $wp_query->queried_object->ID;

    $prefix = 'sage_background_video_';
    $data_pref = 'data-youtube_video_';
    $videos = get_post_meta( $page_ID, $prefix .'group', true );
    $video = $videos[$atts['id'] -1];

    return sprintf('<div %s %s %s %s><div %s>%s</div> %s</div>',
        'id="background-video-'. $atts['id'] .'"',
        sprintf('class="%s %s %s %s"',
            $atts['section_class'],
            $video['fitbg'] ? 'fit-background' : 'fit-container',
            $video['expand'] ? 'expand' : '',
            $video['controls'] ? 'enable-controls' : ''
        ),
        sprintf('%s %s %s %s %s %s %s %s %s',
            $data_pref .'id="'. esc_attr($video['id']) .'"',
            $data_pref .'fitbg="'. esc_attr($video['fitbg']) .'"',
            $data_pref .'ratio="'. esc_attr($video['ratio']) .'"',
            $data_pref .'start="'. esc_attr($video['start']) .'"',
            $data_pref .'pause="'. esc_attr($video['pause']) .'"',
            $data_pref .'repeat="'. esc_attr($video['repeat']) .'"',
            $data_pref .'mute="'. esc_attr($video['mute']) .'"',
            $data_pref .'expand="'. esc_attr($video['expand']) .'"',
            $data_pref .'controls="'. esc_attr($video['controls']) .'"'
        ),
        sprintf('style="%s %s"',
            'background-image: url('. esc_attr($video['fallback_image']) .');',
            $video['expand'] ? '' : 'padding-bottom: '. esc_attr($video['height']) .';'
        ),
        sprintf('class="%s"',
            'content-wrapper'
        ),
        do_shortcode($content),
        sprintf('<style>%s %s</style>',
            sprintf('#background-video-'. $atts['id'] .' .ytplayer-shield{%s}',
                sprintf('%s %s %s',
                    'background-color: '. esc_attr($video['shield_color']) .';',
                    'opacity: '. esc_attr($video['shield_opacity']) .';',
                    'color: '. esc_attr($video['text_color']) .';'
                )
            ),
            sprintf('#background-video-'. $atts['id'] .' .content-wrapper{%s}',
                sprintf('%s',
                    'color: '. esc_attr($video['text_color']) .';'
                )
            )
        )
    );
}

/**
  * Custom Posts
  */
add_shortcode( 'posts', __NAMESPACE__.'\\sage_posts' );
function sage_posts( $atts, $content = null ) {
    $defaults = array (
        'type' => 'post',
        'limit' => '-1'
    );
    $atts = wp_parse_args( $atts, $defaults );
    $html = '';

    //Protect against arbitrary paged values
    $paged = ( get_query_var( 'paged' ) ) ?  get_query_var( 'paged' ) : 1;

    $args=array(
      'post_type' => explode(',', $atts['type']),
      'post_status' => 'publish',
      'posts_per_page' => $atts['limit'],
      'paged' => $paged,
    );
    $my_query = new \WP_Query($args);

    global $wp_query;
    $temp_wp_query = $wp_query;
    $wp_query = $my_query;

    if( have_posts() ) {
        ob_start();
        while (have_posts()) : the_post();
            get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());
        endwhile;
    }

?>
    <div class="posts-nav"><?php
        posts_nav_link('<span></span>',
            sprintf('%s <span class="glyphicon glyphicon-forward"></span>',
                __('Newer Posts')
            ),
            sprintf('<span class="glyphicon glyphicon-backward"></span> %s',
                __('Older Posts')
            )
        );
    ?></div>
<?php
    wp_reset_query();

    $wp_query = $temp_wp_query;

    $html .= '<div class="archive">';
    $html .= ob_get_clean();
    $html .= '</div>';
    return $html;

}
