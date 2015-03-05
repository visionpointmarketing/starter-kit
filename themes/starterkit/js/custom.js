jQuery( document ).ready(function () {

	jQuery('#block-menu-block-2 .block__title').on('click',function(e){
	    jQuery(this).siblings('.menu-block-wrapper').children('ul').toggleClass("open");
	});
	jQuery("#block-user-login .block__title").on('click',function(e){
		jQuery(this).siblings('.block__content').toggleClass('open');
	});
	jQuery(".print-buttons").on('click',function(e){
		jQuery(this).toggleClass('open');
	});
	jQuery(".print-buttons button").on('click',function(e){
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0
		var yyyy = today.getFullYear();
		if(dd<10) {	dd='0'+dd	}
		if(mm<10) {	mm='0'+mm	}
		today = mm+'/'+dd+'/'+yyyy;
		jQuery('body').prepend('<div class="printheader"><img src="/sites/all/themes/starterkit/images/logo-mobile.png"/><p class="date">' + today + '</p></div>');
		var myClass = jQuery(this).attr("class");
		jQuery("body").removeClass( function() {
		     toReturn = '';
		     classes = this.className.split(' ');
		     for( i in classes ) {
		         if( /print-/.exec( classes[i] ) ) {
		             toReturn += classes[i] +' ';
		         }
		     }
		     return toReturn ;
		});
		jQuery("body").addClass('print-' + myClass);
		
		window.print();
		jQuery(".printheader").remove();
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