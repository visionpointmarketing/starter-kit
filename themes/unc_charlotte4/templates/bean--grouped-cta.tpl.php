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
 * - $title: The (sanitized) 'entity' label.
 * - $url: Direct url of the current 'entity' if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - 'entity'-{'entity'_TYPE}
 *   - {'entity'_TYPE}-{BUNDLE}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_'entity'()
 * @see template_process()
 */
?>
<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<div class="content"<?php print $content_attributes; ?>>
		<div class="header">
			<h2><?php print $title; ?></h2>
			<p><?php print_r($content['field_intro'][0]['#markup']); ?></p>
		</div>
		<?php
		if(isset($content['field_cta'][0])){
			if(isset($content['field_cta'][1])){
				if(isset($content['field_cta'][2])){
					$val = 3;
				}else{
					$val = 2;
				}
			}else{
				$val = 1;
			}
		}else{
			$val = 0;
		}
		//print_r($content['field_cta'][0]['entity']['field_collection_item'][4]['field_cta_intro']['#items']);
		$string = "";
		for($i = 0; $i <= $val - 1; $i++){
			$fa_icon = $content['field_cta'][$i]['entity']['field_collection_item'][$i + $val + 1]['field_fontawesome_icon']['#items'][0]['value'];
			$cta_title = $content['field_cta'][$i]['entity']['field_collection_item'][$i + $val + 1]['field_cta_title']['#items'][0]['title'];
			$cta_link = $content['field_cta'][$i]['entity']['field_collection_item'][$i + $val + 1]['field_cta_title']['#items'][0]['url'];
			$cta_intro = $content['field_cta'][$i]['entity']['field_collection_item'][$i + $val + 1]['field_cta_intro']['#items'][0]['value'];
			$string .= "<div class='cta-content'><div class='icon'><span class='fa fa-".$fa_icon."'aria-hidden='true'></span></div><a href='".$cta_link."'><div class='content'><h3>".$cta_title."</h3><p>".$cta_intro."</p></div></a></div>";
		}
			echo $string;
		?>
	</div>
</div>



