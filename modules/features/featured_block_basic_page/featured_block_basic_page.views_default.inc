<?php
/**
 * @file
 * featured_block_basic_page.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function featured_block_basic_page_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'basic_page_featured';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Basic Page Featured';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '1';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'fields';
  /* Field: Content: Featured Image */
  $handler->display->display_options['fields']['field_featured_image']['id'] = 'field_featured_image';
  $handler->display->display_options['fields']['field_featured_image']['table'] = 'field_data_field_featured_image';
  $handler->display->display_options['fields']['field_featured_image']['field'] = 'field_featured_image';
  $handler->display->display_options['fields']['field_featured_image']['label'] = '';
  $handler->display->display_options['fields']['field_featured_image']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_featured_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_featured_image']['hide_empty'] = TRUE;
  $handler->display->display_options['fields']['field_featured_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_featured_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: Featured Caption */
  $handler->display->display_options['fields']['field_featured_caption']['id'] = 'field_featured_caption';
  $handler->display->display_options['fields']['field_featured_caption']['table'] = 'field_data_field_featured_caption';
  $handler->display->display_options['fields']['field_featured_caption']['field'] = 'field_featured_caption';
  $handler->display->display_options['fields']['field_featured_caption']['label'] = '';
  $handler->display->display_options['fields']['field_featured_caption']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_featured_caption']['alter']['text'] = '<div class="featured-image">
[field_featured_image]
<p>[field_featured_caption-value]</p>
</div>';
  $handler->display->display_options['fields']['field_featured_caption']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_featured_caption']['hide_empty'] = TRUE;
  /* Field: Content: Featured Promo Image */
  $handler->display->display_options['fields']['field_featured_promo_image']['id'] = 'field_featured_promo_image';
  $handler->display->display_options['fields']['field_featured_promo_image']['table'] = 'field_data_field_featured_promo_image';
  $handler->display->display_options['fields']['field_featured_promo_image']['field'] = 'field_featured_promo_image';
  $handler->display->display_options['fields']['field_featured_promo_image']['label'] = '';
  $handler->display->display_options['fields']['field_featured_promo_image']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_featured_promo_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_featured_promo_image']['hide_empty'] = TRUE;
  $handler->display->display_options['fields']['field_featured_promo_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_featured_promo_image']['settings'] = array(
    'image_style' => '',
    'image_link' => '',
  );
  /* Field: Content: Featured Promo Caption */
  $handler->display->display_options['fields']['field_featured_promo_caption']['id'] = 'field_featured_promo_caption';
  $handler->display->display_options['fields']['field_featured_promo_caption']['table'] = 'field_data_field_featured_promo_caption';
  $handler->display->display_options['fields']['field_featured_promo_caption']['field'] = 'field_featured_promo_caption';
  $handler->display->display_options['fields']['field_featured_promo_caption']['label'] = '';
  $handler->display->display_options['fields']['field_featured_promo_caption']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_featured_promo_caption']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_featured_promo_caption']['hide_empty'] = TRUE;
  /* Field: Content: Featured Promo Link */
  $handler->display->display_options['fields']['field_featured_promo_link']['id'] = 'field_featured_promo_link';
  $handler->display->display_options['fields']['field_featured_promo_link']['table'] = 'field_data_field_featured_promo_link';
  $handler->display->display_options['fields']['field_featured_promo_link']['field'] = 'field_featured_promo_link';
  $handler->display->display_options['fields']['field_featured_promo_link']['label'] = '';
  $handler->display->display_options['fields']['field_featured_promo_link']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_featured_promo_link']['alter']['text'] = '<a href="[field_featured_promo_link-url]" class="featured-promo">
[field_featured_promo_image]
<span>[field_featured_promo_caption]</span>
</a>';
  $handler->display->display_options['fields']['field_featured_promo_link']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_featured_promo_link']['hide_empty'] = TRUE;
  $handler->display->display_options['fields']['field_featured_promo_link']['click_sort_column'] = 'url';
  $handler->display->display_options['fields']['field_featured_promo_link']['type'] = 'link_plain';
  /* Field: Content: Featured Video URL */
  $handler->display->display_options['fields']['field_featured_video_url']['id'] = 'field_featured_video_url';
  $handler->display->display_options['fields']['field_featured_video_url']['table'] = 'field_data_field_featured_video_url';
  $handler->display->display_options['fields']['field_featured_video_url']['field'] = 'field_featured_video_url';
  $handler->display->display_options['fields']['field_featured_video_url']['label'] = '';
  $handler->display->display_options['fields']['field_featured_video_url']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_featured_video_url']['hide_empty'] = TRUE;
  $handler->display->display_options['fields']['field_featured_video_url']['click_sort_column'] = 'video_url';
  $handler->display->display_options['fields']['field_featured_video_url']['settings'] = array(
    'video_style' => 'normal',
  );
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Contextual filter: Content: Nid */
  $handler->display->display_options['arguments']['nid']['id'] = 'nid';
  $handler->display->display_options['arguments']['nid']['table'] = 'node';
  $handler->display->display_options['arguments']['nid']['field'] = 'nid';
  $handler->display->display_options['arguments']['nid']['default_action'] = 'default';
  $handler->display->display_options['arguments']['nid']['default_argument_type'] = 'node';
  $handler->display->display_options['arguments']['nid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['nid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['nid']['summary_options']['items_per_page'] = '25';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;

  /* Display: Basic Page Featured Element */
  $handler = $view->new_display('block', 'Basic Page Featured Element', 'block');
  $export['basic_page_featured'] = $view;

  return $export;
}
