(function($) {
	$(document).ready( function() {
		$('.hamburger-menu').click(function(){
			$('.hamburger-menu').toggleClass("active");
			$('.navs-wrap').toggleClass("active");
			$('header').toggleClass("inverted");
		});
	});
})(jQuery)