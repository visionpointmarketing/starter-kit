jQuery( document ).ready(function () {
	jQuery('#block-menu-block-2 .block__title').on('click',function(e){
	    jQuery(this).siblings('.menu-block-wrapper').children('ul').toggleClass("open");
	});
	jQuery("#block-user-login .block__title").on('click',function(e){
		jQuery(this).siblings('.block__content').toggleClass('open');
	});
});
jQuery(document).mouseup(function(e){
	var c1 = jQuery("#block-user-login");
	if (!c1.is(e.target) && c1.has(e.target).length === 0){
		jQuery("#block-user-login .block__content").removeClass("open");
	}
});
