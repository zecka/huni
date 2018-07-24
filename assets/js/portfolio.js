jQuery(function($) {
	$(document).ready( function() {
		
		/* Code principal */
		function huni_portfolio_isotope() {
			var $container = $('#portfolio-list, .portfolio-list');
			$container.imagesLoaded(function(){
				$container.isotope({
					itemSelector: '.item-portfolio',
					layoutMode: 'masonry'
				});
			});
		} 
		huni_portfolio_isotope();
		
		/* Filtre */
		$('.filter a').click(function() {
			var selector = $(this).attr('data-filter');
			$('#portfolio-list').isotope({ filter: selector });
			$(this).parents('ul').find('a').removeClass('alt');
			$(this).addClass('alt');
			return false;
		});
		
		/* Redimensionnement */
		var isIE8 = $.browser.msie && +$.browser.version === 8;
		if (isIE8) {
			document.body.onresize = function () {
				huni_portfolio_isotope();
			};
		} else {
			$(window).resize(function () {
				huni_portfolio_isotope();
			});
		}
		
		/* Orientation */
		window.addEventListener("orientationchange", function() {
			huni_portfolio_isotope();
		});
		
	});
});