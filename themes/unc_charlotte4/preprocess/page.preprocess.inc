<?php
/**
 * Preprocess function
 */
function unc_charlotte4_preprocess_page(&$vars) {
  // Get theme settings
  $vars['subbrand_text'] = theme_get_setting('subbrand_text');
  $vars['subbrand_link'] = theme_get_setting('subbrand_link');
  $vars['nav_style'] = theme_get_setting('nav_style');
  $vars['nav_count'] = count($vars['main_menu']);
  $vars['header_utility'] = theme('header_utility');

  // Provide custom 404 page template.
  $status = drupal_get_http_header("status");
  if($status == "404 Not Found") {
    $vars['theme_hook_suggestions'][] = 'page__404';
  }

  // Provide custom 403 page template.
  $status = drupal_get_http_header("status");
  if($status == "403 Forbidden") {
    $vars['theme_hook_suggestions'][] = 'page__403';
  }


  if(drupal_is_front_page()){
  	drupal_add_js(drupal_get_path('theme', 'unc_charlotte4') . '/js/home.js');
  	//drupal_add_library('waypoints', 'waypoints');
  }
  if (isset($node) && count($node->field_adds) != 0) {
    if ($vars['node']->nid == '77') {
      drupal_add_js(drupal_get_path('theme', 'unc_charlotte4') . '/js/instafeed.min.js');
      drupal_add_js(drupal_get_path('theme', 'unc_charlotte4') . '/js/sights.js');
    }
  }

}



	
