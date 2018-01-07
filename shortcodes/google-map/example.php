<?php
	
function huni_gmap_example(){
	
	echo do_shortcode('[huni-gmap]
	
		[huni-marker
			address="Rue du rhône 5, 1200 genève"
			lat="46.2034325"
			lng="6.1500826"
		]
			Content into the marker
			with
			new line
		[/huni-marker]
		
		[huni-marker
			address="Rue du test 5, 1200 genève"
			lat="31.8"
			lng="12.1"
			icon="http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png"
			icon-width="32"
			icon-height="32"
			anchor-x="center"
			anchor-y="bottom"
		]
			Content into the marker
		[/huni-marker]
		
		[huni-marker
			address="Rue du test 15, 1200 genève"
			lat="34.8"
			lng="19.1"
			icon="http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png"
			icon-width="32"
			icon-height="32"
		]
			Content into the marker
		[/huni-marker]
		
		
		[huni-mapstyle]
			[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
		[/huni-mapstyle]
		
	[/huni-gmap]');
}