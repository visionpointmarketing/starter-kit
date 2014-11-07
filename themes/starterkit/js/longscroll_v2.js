jQuery(document).ready(function () {
	jQuery('#content > ul > li').waypoint(function(direction){
		jQuery('body').removeClass('a1').removeClass('a2').removeClass('a3').removeClass('a4');
		var target_id = jQuery(this).attr('id').substring(1);
		if(direction == 'up' && target_id > 1){
			target_id--;
		}
		var selector = 'a' + target_id;
		jQuery('body').addClass(selector);
	});
});