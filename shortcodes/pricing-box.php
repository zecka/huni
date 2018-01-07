<?php

add_shortcode('huni-pricing', 'huni_pricing_box_shortcode');
function huni_pricing_box_shortcode($atts , $content = null ){
		// Attributes
	extract( shortcode_atts( array(
		'title' => '',
		'price' => '',
		'description' => '',
		'before_price' => '$',
		'after_price' => '',
		'button_text' => 'Get Started',
		'button_link' => '#',
		'bg_color'	=> 'bg-white',
		'txt_color'	=> 'txt-default',
		'bullet_color' => 'secondary',
		'button_color' => 'secondary',



	), $atts, 'huni-pricing' ) );
	
	ob_start();
	?>
	<div class="pricing-wrap <?php echo $bg_color; ?> <?php echo $txt_color; ?> bullet-<?php echo $bullet_color; ?>">
		<div class="princing-box">
			<h4 class="text-center"><?php echo $title; ?></h4>
			<div class="price text-center">
				<?php echo $before_price; ?><?php echo $price; ?><?php echo $after_price; ?>
			</div>
			<p><?php echo $description; ?></p>
			<?php echo $content; ?>
			
			<a href="<?php echo $button_link ?>" class="button alt <?php echo $button_color ?>"><?php echo $button_text; ?></a>
			
		</div>
	</div>
	<?php
	return ob_get_clean();
}

