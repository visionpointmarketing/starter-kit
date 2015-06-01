jQuery( document ).ready(function () {

	jQuery('.l-footer').appendTo('#a3');
	frontWaypoints();

});

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
				{ offset: 1 }
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
				{ offset: 0 }
		);
}