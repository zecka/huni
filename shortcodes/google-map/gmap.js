(function($) {
	$(document).ready( function() {
		window.initMap = function(){
			$('.huni-map').each(function(){
				console.log('HUNI MAP')
				var $this=$(this);
				var displayID=$this.children(".huni-map-display").attr("id");
				var mapStyle=$this.children(".huni-mapstyle").html();
				var mapStyle = $.parseJSON(mapStyle);
				var mapLng=parseFloat($this.data('lng'));
				var mapLat=parseFloat($this.data('lat'));
	
				
					var uluru = {lat: mapLat, lng: mapLng};
	
					var map = new google.maps.Map(document.getElementById(displayID), {
						zoom: 4,
						center: uluru,
						styles: mapStyle,
	
					});
					
					$this.children(".huni-marker").each(function(){
						
						var icon = $(this).data('icon');
						var iconMap = new google.maps.MarkerImage(icon,
							/* dimensions de l'image */
							new google.maps.Size(parseInt($(this).data('icon-width')),parseInt($(this).data('icon-height'))),
							/* Origine de l'image 0,0. */
							new google.maps.Point(0,0),
							/* l'ancre (point d'accrochage sur la map) du picto
							(varie en fonction de ces dimensions) */
							new google.maps.Point(parseInt($(this).data('anchor_x')),parseInt($(this).data('anchor_y')))
						);
						
						
	
						var marker = new google.maps.Marker({
							position: {lat: $(this).data('lat'), lng: $(this).data('lng')},
							map: map,
							icon: iconMap
	
						});
						
						var infowindow = new google.maps.InfoWindow({
							content: $(this).html(),
						});
						
						marker.addListener('click', function() {
							infowindow.open(map, marker);
						});
					});
					
					
					
	
				
			});
		}

	
	
	});
	
})(jQuery)

/*
	$('li').each(function(){
   		var $this = $(this);
	    $this.children("li").each(function(){
	        $this; // parent li
	        this; // child li
	    });
	});
*/