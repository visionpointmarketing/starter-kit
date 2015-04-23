jQuery( document ).ready(function () {

	frontWaypoints();

	var userFeed = new Instafeed({
		get: 'user',
		userId: 440589911,
		limit:3,
		resolution:'standard_resolution',
		accessToken: '440589911.467ede5.9c2c542ddd0a430298838e495b779131',
		template: '<div class="item"><a href="{{link}}" target="_blank"><img src="{{image}}" /><h3>@UNCCMARCH</h3></a></div>'
	});
	userFeed.run();

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

	jQuery('.list-links h2.block__title').on('click',function(e){
		jQuery(this).parents('.list-links').toggleClass('open');
	});
	jQuery('#block-menu-block-2 h2.block__title').on('click',function(e){
		jQuery(this).parents('#block-menu-block-2').toggleClass('open');
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
function frontWaypoints(){
		jQuery('.block--views-events-block-1 .view-header').waypoint(
			function(direction){
				jQuery(this).addClass('open');
			},
			{ offset: 0 }
		);
		jQuery('body.front #block-bean-homepage-billboard').waypoint(
				function(direction){
					if(isDesktop()){
						if(direction == "down") {
							jQuery('#a1').css('position', 'relative');
							jQuery('#a2').css('position', 'fixed');
							jQuery('#a3').css('position', 'relative');
						} else {
							jQuery('#a1').css('position', 'relative');
							jQuery('#a2').css('position', 'relative');
							jQuery('#a3').css('position', 'relative');
						}
					}else{
						jQuery('#a1').css('position', 'relative');
						jQuery('#a2').css('position', 'relative');
						jQuery('#a3').css('position', 'relative');
						jQuery('#a4').css('min-height', '0');
					}
					console.log(direction);
				},
				{ offset: 157 }
		);
		jQuery('body.front #a2').waypoint(
				function(direction){
					if(isDesktop()){
						if(direction == "down") {
							jQuery('#a1').css('position', 'relative');
							jQuery('#a2').css('position', 'relative');
							jQuery('#a3').css('position', 'fixed');
							jQuery('#a4').css('min-height', '100vh');
						} else {
							jQuery('#a1').css('position', 'relative');
							jQuery('#a2').css('position', 'fixed');
							jQuery('#a3').css('position', 'relative');
						}
					}else{
						jQuery('#a1').css('position', 'relative');
						jQuery('#a2').css('position', 'relative');
						jQuery('#a3').css('position', 'relative');
						jQuery('#a4').css('min-height', '0');
					}
				},
				{ offset: 148 }
		);
		jQuery('body.front #a3').waypoint(
				function(direction){
					if(isDesktop()){
						if(direction == "down") {
							jQuery('#a1').css('position', 'relative');
							jQuery('#a2').css('position', 'relative');
							jQuery('#a3').css('position', 'relative');
							jQuery('#a4').css('min-height', '0');
						} else {
							jQuery('#a1').css('position', 'relative');
							jQuery('#a2').css('position', 'relative');
							jQuery('#a3').css('position', 'fixed');
							jQuery('#a4').css('min-height', '100vh');
						}
					}else{
						jQuery('#a1').css('position', 'relative');
						jQuery('#a2').css('position', 'relative');
						jQuery('#a3').css('position', 'relative');
						jQuery('#a4').css('min-height', '0');
					}
				},
				{ offset: 141 }
		);
}
function isDesktop() {
	var w = window,
	d = document,
	e = d.documentElement,
	g = d.getElementsByTagName('body')[0],
	x = w.innerWidth || e.clientWidth || g.clientWidth,
	y = w.innerHeight|| e.clientHeight|| g.clientHeight;
	//console.log(x);
	if(x >= 1200) {
		return true;
	} else {
		return false;
	}
}
addLoadEvent(preloader);