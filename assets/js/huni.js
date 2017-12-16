(function($) {
	$(document).ready( function() {
		$('.hamburger-menu').click(function(){
			$('.hamburger-menu').toggleClass("active");
			$('.navs-wrap').toggleClass("active");
			$('header').toggleClass("inverted");
		});
	});
	
	
	$(window).scroll(function() {
		var sticky = $('header .header-wrap'),
			scroll = $(window).scrollTop();
			headerHeight=$('header').outerHeight();

		if (scroll > 50){
			$('header').css('height',headerHeight);

			sticky.addClass('sticky');
		}
		else{
			sticky.removeClass('sticky');
			$('header').css('padding-top',"");

		}
	});
	
	
})(jQuery)