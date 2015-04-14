jQuery(document).ready(function () {
	//when an <a> tag is clicked in the on-page fixed nav
	jQuery('#nav a[href^="#"]').on('click', function(event) {
		//get the object we're going to
		var target = jQuery( jQuery(this).attr('href') );
		//if it exists, scroll there. (the +1 puts us just below to trigger the break)
		if( target.length ) {
			event.preventDefault();
			jQuery('html, body').animate({
				scrollTop: target.offset().top + 1
			}, 1000);
		}
	});
	//when we scroll to something (hit a waypoint)
	jQuery('#content > ul > li').waypoint(function(direction){
		//remove all active classes from the fixed nav
		jQuery('#nav a').each(function(index){
			jQuery(this).removeClass('active');
		});
		//get the scrolled to items ID
		var target_id = jQuery(this).attr('id').substring(1);
		//modify it if we're scrolling up (counterbalance of the +1 above)
		if(direction == 'up' && target_id > 1){
			target_id--;
		}
		//build the selector to activate
		var selector = '#nav li.a' + target_id + ' a';
		jQuery(selector).addClass('active');
	});
});