<?php

/**
 * @file
 * Theme settings file for the starterkit theme.
 */

require_once dirname(__FILE__) . '/template.php';

/**
 * Implements hook_form_FORM_alter().
 */
function starterkit_form_system_theme_settings_alter(&$form, $form_state) {
  // Collapse theme settings that should not be changed.
  $form['logo']['#collapsible'] = $form['theme_settings']['#collapsible'] = $form['favicon']['#collapsible'] = TRUE;
  $form['logo']['#collapsed'] = $form['theme_settings']['#collapsed'] = $form['favicon']['#collapsed'] = TRUE;

  $form['starterkit_theme_options'] = array(
    '#type' => 'fieldset',
    '#title' => t('Starterkit Theme Options'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    '#weight' => -11,
  );
  $form['starterkit_theme_options']['subbrand_text'] = array(
    '#type' => 'textfield',
    '#title' => t('College / Division Sub-brand Name'),
    '#description' => t("The name of this website's parent organization or a tagline."),
    '#default_value' => theme_get_setting('subbrand_text'),
  );
  $form['starterkit_theme_options']['subbrand_link'] = array(
    '#type' => 'textfield',
    '#title' => t('College / Division Sub-brand Link'),
    '#description' => t("Enter the URL of the parent organization's website or leave blank for a tagline."),
    '#default_value' => theme_get_setting('subbrand_link'),
  );
  $form['starterkit_theme_options']['utility_link_3_text'] = array(
    '#type' => 'textfield',
    '#title' => t('Optional 3rd Utility Link Text'),
    '#description' => t("Optional 3rd utility link text. If this site utilizes academic advising, then enter 'Academic Advising'."),
    '#default_value' => theme_get_setting('utility_link_3_text'),
  );
  $form['starterkit_theme_options']['utility_link_3_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Optional 3rd Utility Link'),
    '#description' => t("Optional 3rd utility link's URL. If this site utilizes academic advising, enter the advising site's URL here."),
    '#default_value' => theme_get_setting('utility_link_3_link'),
  );
  $form['starterkit_theme_options']['utility_link_4_text'] = array(
    '#type' => 'textfield',
    '#title' => t('Optional 4th Utility Link Text'),
    '#description' => t("Optional 4th utility link text. If this site utilizes a search box, then this link won't be shown."),
    '#default_value' => theme_get_setting('utility_link_4_text'),
  );
  $form['starterkit_theme_options']['utility_link_4_link'] = array(
    '#type' => 'textfield',
    '#title' => t('Optional 4th Utility Link'),
    '#description' => t("Optional 4th utility link's URL. If this site utilizes a search box, then this link won't be shown."),
    '#default_value' => theme_get_setting('utility_link_4_link'),
  );
  $form['starterkit_theme_options']['search_box_type'] = array(
    '#type' => 'radios',
    '#title' => t('Search Box Type'),
    '#description' => t("Specify if the search in the upper-right of the page should use the built-in Drupal search utility or to use Google to search this site."),
    '#options' => array('drupal' => t('Drupal Search'), 'google' => t('Google Search'), 'disabled' => t('Disabled')),
    '#default_value' => theme_get_setting('search_box_type') ? theme_get_setting('search_box_type') : 'drupal',
  );
  $form['starterkit_theme_options']['nav_style'] = array(
    '#type' => 'select',
    '#title' => t('Navigation Style'),
    '#description' => t("Specify the style for the primary navigation. Tabbed should only be chosen when a slideshow will be provided above menu on every page."),
    '#options' => array('tabs' => t('Tabbed'), 'leftnav' => t('Left Nav'), 'default' => t('Default')),
    '#default_value' => theme_get_setting('nav_style') ? theme_get_setting('nav_style') : 'default',
  );
  $menu_options = menu_get_menus();
  $form['starterkit_theme_options']['mobile_menu'] = array(
    '#type' => 'select',
    '#title' => t('Mobile Menu'),
    '#description' => t("Specify the menu to use as the collapsible primary on mobile devices."),
    '#options' => $menu_options,
    '#default_value' => theme_get_setting('mobile_menu') ? theme_get_setting('mobile_menu') : 'main-menu',
  );
}
