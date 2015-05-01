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
    <?php
	//print render($content);
    ?>
	<div class="field-collection-container clearfix">
		<div class="field field--name-field-subsection field--type-field-collection field--label-hidden">
			<div class="field__items">
				<?php 
				$count = count($content['field_subsection']['#items']);
				for($i = 0; $i < $count; $i++){ 
				?>
				<div class="field__item">
					<div class="field-collection-view clearfix view-mode-full">
						<div class="entity entity-field-collection-item field-collection-item-field-subsection clearfix" typeof="">
							<div class="content">
								<a href="<?php print($content['field_subsection'][$i]['entity']['field_collection_item'][$content['field_subsection']['#items'][$i]['value']]['field_subsection_link']['#items'][0]['url']); ?>">
									<div class="field field--name-field-subsection-image field--type-image field--label-hidden">
										<div class="field__items">
											<div class="field__item">
												<img typeof="foaf:Image" src="/sites/default/files/<?php print($content['field_subsection'][$i]['entity']['field_collection_item'][$content['field_subsection']['#items'][$i]['value']]['field_subsection_image']['#items'][0]['filename']); ?>" width="300" height="300" alt="">
											</div>
										</div>
									</div>
									<div class="field field--name-field-subsection-link field--type-link-field field--label-hidden">
										<div class="field__items">
											<div class="field__item">
												<?php print($content['field_subsection'][$i]['entity']['field_collection_item'][$content['field_subsection']['#items'][$i]['value']]['field_subsection_link']['#items'][0]['title']); ?>
											</div>
										</div>
									</div>
									<div class="field field--name-field-subsection-intro field--type-text-long field--label-hidden">
										<div class="field__items">
											<div class="field__item"><?php print($content['field_subsection'][$i]['entity']['field_collection_item'][$content['field_subsection']['#items'][$i]['value']]['field_subsection_intro']['#items'][0]['value']); ?></div>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php print render($content['field_promo_read_more']); ?>
  </div>
</div>
