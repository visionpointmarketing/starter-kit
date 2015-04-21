<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * unc_charlotte4 theme.
 */

/**
 * Output breadcrumb
 */
function unc_charlotte4_breadcrumb($variables) {
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
        $crumbs .= '<li class="breadcrumb"><a href="/"><span class="fa fa-home" aria-hidden="true"></span></a></li><span><span class="fa fa-th-large" aria-hidden="true"></span></span>';
        $i++;
      }
      else{
        $crumbs .= '<li class="breadcrumb';
        if ($i+1 == $array_size) {
          $crumbs .= ' last';
        }
        $crumbs .=  '">' . $breadcrumb[$i].'</li>';
        if ($i+1 != $array_size) {
          $crumbs .= '<span><span class="fa fa-th-large" aria-hidden="true"></span></span>';
        }
        $i++;
      }
    }
    $crumbs .= '</ul>';
    return $crumbs;
  }
}
/**
 * Override menu block for social menu
 */
function unc_charlotte4_menu_tree__menu_social_menu($variables){
  return '<ul class="menu">' . $variables['tree'] . '</ul>';
}
function unc_charlotte4_menu_link__menu_social_menu($variables){
  $element = $variables['element'];
  return '<li' . drupal_attributes($element['#attributes']) . '><a href="' . $element['#href'] . '" target="_blank" class="btn btn-default" role="button"><span class="fa fa-' . $element['#title'] . '" aria-hidden="true"></span></a></li>';
}
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
}
/**
 * Implementation of hook_theme().
 */
function unc_charlotte4_theme() {
  $items = array();
  $items['header_utility'] = array(
    'header_utility' => array(
      'variables' => array(),
    ),
  );
  $items['user_login'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'unc_charlotte'),
    'template' => 'user-login',
    'preprocess functions' => array(
       'unc_charlotte_preprocess_user_login'
    ),
  );
  return $items;
}

function unc_charlotte4_links__system_main_menu($variables) {
  $links = $variables['links'];
  $attributes = $variables['attributes'];
  $heading = $variables['heading'];
  global $language_url;
  $output = '';

  if (count($links) > 0) {
    $output = '';

    // Treat the heading first if it is present to prepend it to the
    // list of links.
    if (!empty($heading)) {
      if (is_string($heading)) {
        // Prepare the array that will be used when the passed heading
        // is a string.
        $heading = array(
          'text' => $heading,
          // Set the default level of the heading. 
          'level' => 'h2',
        );
      }
      $output .= '<' . $heading['level'];
      if (!empty($heading['class'])) {
        $output .= drupal_attributes(array('class' => $heading['class']));
      }
      $output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
    }

    $output .= '<ul' . drupal_attributes($attributes) . '>';

    $num_links = count($links);
    $i = 1;

   foreach ($links as $key => $link) {
      $class = array($key);

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class[] = 'first';
      }
      if ($i == $num_links) {
        $class[] = 'last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
           && (empty($link['language']) || $link['language']->language == $language_url->language)) {
        $class[] = 'active';
      }
      $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        if ($link['href'] == '<front>') {
          $output .= '<div class="primary-link-container" onclick="location.href=\'' . $GLOBALS['base_url'] . '/' . '\';"><div class="primary-link-wrapper"><div class="primary-link">' . l($link['title'], $link['href'], $link) . '</div></div></div>';
        } else {
          $output .= '<div class="primary-link-container" onclick="location.href=\'' . $GLOBALS['base_url'] . '/' . $link['href'] . '\';"><div class="primary-link-wrapper"><div class="primary-link">' . l($link['title'], $link['href'], $link) . '</div></div></div>';
        }
      }
      elseif (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span' . $span_attributes . '>' . $link['title'] . '</span>';
      }
      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}


function unc_charlotte4_links__system_mobile_menu($variables) {
  // Get the mobile menu from settings and swap out the links
  $menu_name = theme_get_setting('mobile_menu');
  $links = menu_navigation_links($menu_name);
  $attributes = $variables['attributes'];
  $heading = $variables['heading'];
  global $language_url;
  $output = '';

  if (count($links) > 0) {
    $output = '';

    // Treat the heading first if it is present to prepend it to the
    // list of links.
    if (!empty($heading)) {
      if (is_string($heading)) {
        // Prepare the array that will be used when the passed heading
        // is a string.
        $heading = array(
          'text' => $heading,
          // Set the default level of the heading. 
          'level' => 'h2',
        );
      }
      $output .= '<' . $heading['level'];
      if (!empty($heading['class'])) {
        $output .= drupal_attributes(array('class' => $heading['class']));
      }
      $output .= '>' . check_plain($heading['text']) . '</' . $heading['level'] . '>';
    }

    $output .= '<ul' . drupal_attributes($attributes) . '>';

    $num_links = count($links);
    $i = 1;

   foreach ($links as $key => $link) {
      $class = array($key);

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class[] = 'first';
      }
      if ($i == $num_links) {
        $class[] = 'last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
           && (empty($link['language']) || $link['language']->language == $language_url->language)) {
        $class[] = 'active';
      }
      $output .= '<li' . drupal_attributes(array('class' => $class)) . '>';

      if (isset($link['href'])) {       
        // Pass in $link as $options, they share the same keys.
        $link['html'] = TRUE;
        if ($link['href'] == '<front>') {
          $output .= '<div class="primary-link-container" onclick="location.href=\'' . $GLOBALS['base_url'] . '/' . '\';"><div class="primary-link-wrapper"><div class="primary-link">' . l('<span class="icon-double-angle-right" aria-hidden="true"></span>' . $link['title'], $link['href'], $link) . '</div></div></div>';
        } else {
          $output .= '<div class="primary-link-container" onclick="location.href=\'' . $GLOBALS['base_url'] . '/' . $link['href'] . '\';"><div class="primary-link-wrapper"><div class="primary-link">' . l('<span class="icon-double-angle-right" aria-hidden="true"></span>' . $link['title'], $link['href'], $link) . '</div></div></div>';
        }
      }
      elseif (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes.
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span' . $span_attributes . '><span class="icon-double-angle-right" aria-hidden="true"></span>' . $link['title'] . '</span>';
      }
      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}

/**
 * Theme the header search box.
 */
function unc_charlotte4_header_utility() {
  $search_type = theme_get_setting('search_box_type');
  $utility_links = array(
    l(t('Home'), '<front>'),
    l(t('Contact Us'), 'contact'),
    l(theme_get_setting('utility_link_3_text'), theme_get_setting('utility_link_3_link')),
  );
  
  $output = '<ul id="header-utility-links">';
  foreach ($utility_links as $link) {
    $output .= '<li>' . $link . '</li>';
  }
  if ($search_type == 'disabled') {
    $output .= '<li>' . l(theme_get_setting('utility_link_4_text'), theme_get_setting('utility_link_4_link')) . '</li>';
  }
  $output .= '</ul>';
  if ($search_type != 'disabled') {
    $output .= '<div id="header-utility-search-wrapper">';
    if ($search_type == 'google') {
      $search_box = <<<EOF
<form onsubmit="var searchbox = document.getElementById('utility-search-input'); if (searchbox.value == 'Keyword / Search' || searchbox.value == '') { searchbox.value=''; searchbox.focus(); return false; }" id="utility-search" method="get" action="http://search.uncc.edu/website/"><input type="image" id="utility-search-button" src="/sites/all/themes/unc_charlotte/img/utility-edu-search-mag.png"></input><input type="text" id="utility-search-input" onclick="if (this.value == 'Keyword / Search') { this.value = ''; }" title="" maxlength="100" size="25" value="Keyword / Search" name="q"></form>
EOF;
      $output .= $search_box;
    }  
    elseif ($search_type == 'drupal') {
      $block = module_invoke('search', 'block_view', 'search');
      $output .= render($block);
    }
    $output .= '</div>';
  }
  return $output;
}

function unc_charlotte4_preprocess_html(&$variables) {
  // Check and repair sidebar body classes if needed
  $colored_sidebar = FALSE;
  if (isset($variables['page']['color_sidebar_1']) || isset($variables['page']['color_sidebar_2']) || isset($variables['page']['color_sidebar_3']) || isset($variables['page']['color_sidebar_4']) || isset($variables['page']['color_sidebar_5']) || isset($variables['page']['color_sidebar_6']) || isset($variables['page']['color_sidebar_7']) || isset($variables['page']['color_sidebar_8']) || isset($variables['page']['color_sidebar_9']) || isset($variables['page']['color_sidebar_10']) || isset($variables['page']['color_sidebar_11'])) {
    $colored_sidebar = TRUE;
  }
  if ($colored_sidebar && !isset($variables['page']['sidebar_second'])) {
    // Add class to indicate content in right sidebar
    $variables['classes_array'][] = "sidebar-second";
    if (isset($variables['page']['sidebar_first'])) {
      // Remove one-sidebar and add two-sidebars
      foreach ($variables['classes_array'] as $key => $value) {
        if ($value == 'one-sidebar sidebar-first') { 
          $variables['classes_array'][$key] = 'sidebar-first';
          $variables['classes_array'][] = 'two-sidebars';
          break;
        }
      }
    }
    else {
      // Remove no-sidebars and add one-sidebar
      foreach ($variables['classes_array'] as $key => $value) {
        if ($value == 'no-sidebars') { $variables['classes_array'][$key] = 'one-sidebar'; break; }
      }
    }
  }
  $nav_style = theme_get_setting('nav_style');
  $variables['classes_array'][] = "nav-" . $nav_style;
}


/**
 * Implementation of hook_form_alter().
 */
function unc_charlotte4_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    $form['search_block_form']['#size'] = 25;  // define size of the textfield
    $form['search_block_form']['#weight'] = 1;
    $form['search_block_form']['#default_value'] = t('Keyword / Search'); // Set a default value for the textfield
    $form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/img/utility-edu-search-mag.png');
    $form['actions']['submit']['#weight'] = 0;
    // Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Keyword / Search';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Keyword / Search') {this.value = '';}";
  }
}

function unc_charlotte4_preprocess_user_login(&$vars) {
  $vars['form']['instructions'] = array(
    '#type' => 'markup',
    '#prefix' => '<div id="instructions">',
    '#markup' => t('Please enter your NinerNET username and password to log in to this website.<br />Administrative access from off-campus is available by logging into our <a href="http://itservices.uncc.edu/facultystaff-services/remote-services/cisco-vpn">VPN</a> first.'),
    '#suffix' => '</div>',
    '#weight' => -30,
  );
  $vars['form']['policy'] = array(
    '#type' => 'markup',
    '#prefix' => '<iframe id="policy" name="policy" src="https://ninernet.uncc.edu/policy_iframe.html?'.time().'" height="450" width="430" frameborder="0" scrolling="no" longdesc="NinerNET Policy" style="border:1px solid #666; ">',
    '#markup' => t('Your browser does not support IFRAMES.<br /><a href="https://ninernet.uncc.edu/policy_iframe.html" target="ninernet">Click here</a> to access the content of that page directly.'),
    '#suffix' => '</iframe>',
    '#weight' => 30,
  );
  $vars['form']['name']['#attributes'] = array( 'autocomplete' => 'off', );
  $vars['form']['name']['#description'] = t('Log in with your NinerNET username.');
  $vars['form']['pass']['#attributes'] = array( 'autocomplete' => 'off', );
}

/**
 * Implementation of hook_menu_link().
 */
function unc_charlotte4_menu_link(array $variables) {
  // Remove the dropdown menus added by bootstrap theme.
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Theme override to wrap the all day label from the date module with a
 * span that can be hidden by default with CSS.
 */
function unc_charlotte4_date_all_day_label() {
  return '<span class="date-all-day-tag">(' . t('All day') . ')</span>';
}
