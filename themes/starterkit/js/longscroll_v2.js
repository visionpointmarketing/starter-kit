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

function preloader() {
	if (document.images) {
		var img1 = new Image();
		var img2 = new Image();
		var img3 = new Image();
		var img4 = new Image();

		img1.src = "../images/a1.jpg";
		img1.src = "../images/a2.jpg";
		img1.src = "../images/a3.jpg";
		img1.src = "../images/a4.jpg";
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