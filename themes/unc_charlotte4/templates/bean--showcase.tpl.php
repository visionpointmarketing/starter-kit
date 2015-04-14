<?php
/**
 * @file
 * Default theme implementation for beans.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) entity label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-{ENTITY_TYPE}
 *   - {ENTITY_TYPE}-{BUNDLE}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
?>
<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<div class="content"<?php print $content_attributes; ?>>
		<h2><?php print render($title); ?></h2>
		<div class="showcase-intro">
			<?php print render($content['field_showcase_intro_text']); ?>
			<?php print render($content['field_read_more_link']); ?>
		</div>
		<div class="showcase-elements <?php 
		if(isset($elements['field_showcased_elements'][2]) && sizeof($elements['field_showcased_elements'][2]) > 0){echo 'three';}
		else if(isset($elements['field_showcased_elements'][1]) && sizeof($elements['field_showcased_elements'][1]) > 0){echo 'two';}
		else {echo 'one';} ?>">
			
			<?php print render($content['field_showcased_elements']); ?>
		</div>
	</div>
</div>



