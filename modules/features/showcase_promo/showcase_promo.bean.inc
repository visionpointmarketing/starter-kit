<?php
/**
 * @file
 * showcase_promo.bean.inc
 */

/**
 * Implements hook_bean_admin_ui_types().
 */
function showcase_promo_bean_admin_ui_types() {
  $export = array();

  $bean_type = new stdClass();
  $bean_type->disabled = FALSE; /* Edit this to true to make a default bean_type disabled initially */
  $bean_type->api_version = 5;
  $bean_type->name = 'showcase';
  $bean_type->label = 'Showcase';
  $bean_type->options = '';
  $bean_type->description = 'Showcases up to 3 media files for display in a block';
  $export['showcase'] = $bean_type;

  return $export;
}
