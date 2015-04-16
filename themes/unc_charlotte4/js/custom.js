jQuery( document ).ready(function () {

	/* Make links to documents open in a new window */
	jQuery('a[href$=".pdf"]').attr('target', '_blank');
	jQuery('a[href$=".doc"]').attr('target', '_blank');
	jQuery('a[href$=".docx"]').attr('target', '_blank');
	jQuery('a[href$=".xls"]').attr('target', '_blank');
	jQuery('a[href$=".xlsx"]').attr('target', '_blank');

	/* Zebra striping */
	jQuery("table.zebra tr:odd").addClass("odd");
	jQuery("table.zebra tr:even").addClass("even");

	// Hide menu and search divs
	jQuery("#mobile-menu-container").hide();
	jQuery("#mobile-search-container").hide();

	// Unhide menu and search buttons
	jQuery("#mobile-menu-button").show();
	jQuery("#mobile-search-button").show();

	// Add listeners
	jQuery("#mobile-menu-button").click(function(){
	/* Hide search */
	jQuery("#mobile-search-container").hide();
	/* Show menu */
	jQuery("#mobile-menu-container").toggle();
	});

	jQuery("#mobile-search-button").click(function(){
	/* Hide menu */
	jQuery("#mobile-menu-container").hide();
	/* Show search */
	jQuery("#mobile-search-container").toggle();
	});



	jQuery('#block-menu-block-2 .block__title').on('click',function(e){
	    jQuery(this).siblings('.menu-block-wrapper').children('ul').toggleClass("open");
	});
	jQuery("#block-user-login .block__title").on('click',function(e){
		jQuery(this).siblings('.block__content').toggleClass('open');
	});

	jQuery(".regiontoggle.open").on('click',function(e){
	});
	jQuery(".regiontoggle").on('click',function(e){
		jQuery(this).siblings('.seemore').toggleClass('open');
		jQuery(this).toggleClass('open');
			var elem = jQuery(this);
			var html = elem.html();
		if(jQuery(this).hasClass('open')){
			// elem.html(html.replace('More', 'Less'));
			jQuery(this).siblings('.seemore').each(function(){
				var height = jQuery(this).height() + 50;
				if(parseInt(jQuery(this).parents('.l-region').css('padding-bottom'),10) == 2000 
					|| 
					parseInt(jQuery(this).parents('.l-region-container').css('padding-bottom'),10) == 2000 ){
					jQuery(this).parents('.entity-bean').css('min-height',height);
				}
			});
		}else{
			// elem.html(html.replace('Less', 'More'));
			jQuery(this).parents('.entity-bean').css('min-height',0);
		}
	});
	jQuery(".menu-toggle").on('click',function(e){
		jQuery(this).parents('.l-region--header-third').toggleClass('open');
	});
});
jQuery(document).mouseup(function(e){
	var c1 = jQuery("#block-user-login");
	if (!c1.is(e.target) && c1.has(e.target).length === 0){
		jQuery("#block-user-login .block__content").removeClass("open");
	}
});

function preloader() {
	if (document.images) {
		var img1 = new Image();
		img1.src = "../images/logo-mobile.png";
	}
}
function addLoadEvent(func) {
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = func;
	} else {
		window.onload = function() {
			if (oldonload) {
				oldonload();
			}
			func();
		}
	}
}
addLoadEvent(preloader);