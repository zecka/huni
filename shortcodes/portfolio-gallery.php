<?php
add_shortcode('portfolio-gallery', 'huni_display_portfolio_gallery');
function huni_display_portfolio_gallery($atts){
	extract(shortcode_atts(array(
		'portfolio_id' => get_the_id(),
		'column'	   => 3,
	), $atts));
	$images = rwmb_meta( 'huni_gallery', array( 'size' => 'medium', $portfolio_id ) );
	
	$col=12/(int)$column;
	?>
	<div id="portfolio-list">
		<div class="row padding0">
			<?php
			foreach($images as $image_id => $image){
				echo "<article class='item-portfolio col-$col padding0'>";
				echo '<a href="', $image['full_url'], '" data-fancybox="portfolio"><img src="', $image['url'], '"></a>';
				echo '</article>';
			}
			?>
		</div>
	</div>
	
	
	<?php
	return ob_get_clean();
}
