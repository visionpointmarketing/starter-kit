<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * starterkit theme.
 */

/**
 * Output breadcrumb
 */
function starterkit_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $crumbs = '<ul class="breadcrumbs clearfix">';
    $array_size = count($breadcrumb);
    $i = 0;
    while ( $i < $array_size) {
      if ($i == 0) {
        $crumbs .= '<li class="breadcrumb"><a href="/"><i class="fa fa-home"></i></a></li><span><i class="fa fa-th-large"></i></span>';
        $i++;
      }
      else{
        $crumbs .= '<li class="breadcrumb';
        if ($i+1 == $array_size) {
          $crumbs .= ' last';
        }
        $crumbs .=  '">' . $breadcrumb[$i].'</li>';
        if ($i+1 != $array_size) {
          $crumbs .= '<span><i class="fa fa-th-large"></i></span>';
        }
        $i++;
      }
    }
    $crumbs .= '</ul>';
    return $crumbs;
  }
}