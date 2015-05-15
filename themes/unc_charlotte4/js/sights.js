jQuery( document ).ready(function () {
	
	var userFeed = new Instafeed({
		get: 'user',
		userId: 1802894417,
		limit:3,
		resolution:'standard_resolution',
		accessToken: '1802894417.467ede5.8fd8ec2dd0944d89b7cb8aa0c1f927b9',
		template: '<div class="item"><a href="{{link}}" target="_blank"><img src="{{image}}" /><h3>@UNCCBANDS</h3></a></div>'
	});
	userFeed.run();

});