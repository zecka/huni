<?php
/*
Template Name: Contact
*/
 get_header(); ?>
<section id="intro-contact">
	<div class="container">
		<div class="intro-contact">
			<div class="row">
				<div class="col-8">
					<h2>Introzap feel free contact us, welcome </h2>
					<p>With the first month behind us and feet firmly planted in February, we are now well into 2017 now and have many exciting things happening at introzap.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container-8 text-center contact-form-intro">
		<h2>Let's talk</h2>
		<p>Suspe ndisse suscipit sagittis leo sit met dimentum estibulum issim posuere cubilia Curae Suspendisse at consectetur massa. Curabitur non ipsum nisinec dapibus elit. Donec nec</p>
	</div>
	<div class="container">
		<form class="contact-form">
			<div class="row">
				<div class="col-4">
					<input type="text" name="name" placeholder="Name">
				</div>
				<div class="col-4">
					<input type="email" name="email" placeholder="Email">
				</div>
				<div class="col-4">
					<input type="text" name="subject" placeholder="Subject">
				</div>
			</div>
			<textarea placeholder="Message"></textarea>
			<input type="submit" class="button" value="Send Message">
		</form>
	</div>

	<div class="row">
		<div class="col-6">
			    <div id="map"></div>
			    <script>
			      function initMap() {
			
						/* Déclaration de l'icône personnalisée */
						var monIconPerso = new google.maps.MarkerImage("<?php echo get_template_directory_uri() ?>/assets/img/map-marker.png",
							  /* dimensions de l'image */
							  new google.maps.Size(34,48),
							  /* Origine de l'image 0,0. */
							  new google.maps.Point(0,0),
							  /* l'ancre (point d'accrochage sur la map) du picto
							  (varie en fonction de ces dimensions) */
							  new google.maps.Point(32,64)
						);
											
						var myposition = {lat: 40.7611092, lng: -74.0001543};
				        var map = new google.maps.Map(document.getElementById('map'), {
				          zoom: 10,
				          center: myposition,
				          // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
                    
				          
				        });
				        var marker = new google.maps.Marker({
				          position: myposition,
				          map: map,
				          icon: monIconPerso
				        });
			      }
			    </script>
		</div>
		<div class="col-6 contact-aside">
			<ul class="contact-info">
				<li><i class="fa fa-map-o" aria-hidden="true"></i> <span>Barisal City , NY 10036, United States</span></li>
				<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>introzap_info@gmail.com</span></li>
				<li><i class="fa fa-phone" aria-hidden="true"></i> <span>+8801713879773</span></li>
			</ul>
			<ul class="contact-socials">
				<li>
					<a href="#"><i class="fa fa-facebook"></i></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-twitter"></i></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-dribbble"></i></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-linkedin"></i></a>
				</li>
			<ul>
		</div>
	</div>
</section>

<?php get_footer(); ?>
