<?php
/**
 * @file
 * featured_block_basic_page.context.inc
 */

/**
 * Implements hook_context_default_contexts().
 */
function featured_block_basic_page_context_default_contexts() {
  $export = array();

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'featured_block-basic_page';
  $context->description = '';
  $context->tag = '';
  $context->conditions = array(
    'node' => array(
      'values' => array(
        'page' => 'page',
      ),
      'options' => array(
        'node_form' => '1',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'views-basic_page_featured-block' => array(
          'module' => 'views',
          'delta' => 'basic_page_featured-block',
          'region' => 'featured',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 0;
  $export['featured_block-basic_page'] = $context;

  return $export;
}
