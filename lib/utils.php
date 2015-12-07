<?php

namespace Roots\Sage\Utils;

/**
 * Display container class name
 */
function get_container_class($template = 'template-fullwidth.php'){
     return is_page_template($template) ? 'container-fluid' : 'container';
}

/**
 * We need to be able to figure out the attributes of a wrapped shortcode
 */
function attribute_map($str, $att = null) {
    $res = array();
    $return = array();
    $reg = get_shortcode_regex();
    preg_match_all('~'.$reg.'~',$str, $matches);
    foreach($matches[2] as $key => $name) {
        $parsed = shortcode_parse_atts($matches[3][$key]);
        $parsed = is_array($parsed) ? $parsed : array();

            $res[$name] = $parsed;
            $return[] = $res;
        }
    return $return;
}

function excerpt($limit=40) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'&hellip; <a class="more" href="' . get_permalink() . '">' . __('Read More', 'sage') . '</a>';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
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
    is_page_template('template-fullwidth.php'),
    is_post_type_archive('products'),
    is_singular('products'),
  ]);
  return apply_filters('sage/display_sidebar', $display);
}
