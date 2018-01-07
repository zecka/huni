<?php
/*			

	GMAP SHORTCODE
	[huni-gmap]
	
	
		[huni-marker
			address="Rue du rhône 5, 1200 genève"
			lat="40.7611092"
			lng="-74.0001543}"
			icon="marker.png"
		]
			Content into the marker
		[/huni-marker]
		
		[huni-marker
			address="Rue du test 5, 1200 genève"
			lat="31.8"
			lng="12.1"
			icon="marker2.png"
		]
			Content into the marker
		[/huni-marker]
		
		
		[huni-mapstyle]
			[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
		[/huni-mapstyle]
		
	[/huni-gmap]
*/
static $counter = 0;
add_action('wp_enqueue_scripts', 'huni_gmap_enqueue');
function huni_gmap_enqueue(){
	wp_register_script('huni-gmap', get_template_directory_uri().'/shortcodes/google-map/gmap.js', array('jquery'), HUNI_VERSION, true);

}


add_shortcode('huni-gmap', 'huni_gmap_shortcode');
function huni_gmap_shortcode($atts , $content = null ){
		// Attributes
	extract( shortcode_atts( array(
		'title' => '',
		'price' => '',
		'description' => '',
		'before_price' => '$',
		'after_price' => '',
		'button_text' => 'Get Started',
		'button_link' => '#',
		'lat'		 => false,
		'lng'		=> false,
		'width'		=> '100%',
		'height'	=> '400px',
	
	), $atts, 'huni-gmap' ) );
	
	wp_enqueue_script('huni-gmap');
	global $huni_options;
	
	/*
	 * DEFINE VARIABLE
	 *
	 */
	 
	 // INCREMENT
	ob_start();
	huni_map_increment();
	$map_increment=ob_get_clean();
	
	
	
	// MAP SUB SHORTCODE
	$subshortcode=huni_shortcode_map($content);
		
	// PRIMARY VIEW
	if ($lat===false){ $lat=$subshortcode['huni-marker'][0]['lat'];}
	if ($lng===false){ $lng=$subshortcode['huni-marker'][0]['lng'];}
	if ($lat===false){ $lat=$subshortcode['huni-marker'][0]['lat'];}


	 
	
	/*****************
	 *  START DISPLAY
	 ********************
	 */
	 
	 
	ob_start();

	?>
	<style>
		.huni-map-setting{
			display: none;
		}
	</style>
	<?
	
	echo '<div class="huni-map"
				data-lng="'.$lng.'" 
				data-lat="'.$lat.'" 
				data-increment="'.$map_increment.'"
		>';
		if(!array_key_exists('huni-marker', $subshortcode)){
			
					echo '<div class="huni-marker huni-map-setting"
					data-address="'.$marker['address'].'" 
					data-lat="'.$lat.'" 
					data-lng="'.$lng.'" 
					data-icon="'.$icon.'" 
			></div>';
			
		}
		
		foreach($subshortcode['huni-marker'] as $key=>$marker){ 
			
			// Define variable
			$icon=get_template_directory_uri() .'/assets/img/map-marker.png';
			if(array_key_exists('icon', $marker)){
				$icon=$marker['icon'];
			}
			
			// Define variable icon_width and icon_height with the data of url image
			list($icon_width, $icon_height) = getimagesize($icon);
			
			if(array_key_exists('icon-width', $marker)){
				$icon_width=$marker['icon-width'];
			}
			if(array_key_exists('icon-height', $marker)){
				$icon_height=$marker['icon-height'];
			}
			
			$anchor_x_px=$icon_width/2;
			$anchor_y_px=$icon_height;
			
			if(array_key_exists('anchor_x', $marker)){
				switch($marker['anchor_x']){
					case 'left':
						$anchor_x=0;
					break;
					case 'center':
						$anchor_x=$icon_width/2;
					break;
					case 'right':
						$anchor_x=$icon_width;
					break;
				}
			}
			if(array_key_exists('anchor_y', $marker)){
				switch($marker['anchor_y']){
					case 'top':
						$anchor_y=0;
					break;
					case 'center':
						$anchor_y=$icon_height/2;
					break;
					case 'bottom':
						$anchor_y=$icon_height;
					break;
				}
			}

			echo '<div class="huni-marker huni-map-setting"
					data-address="'.$marker['address'].'" 
					data-lat="'.$marker['lat'].'" 
					data-lng="'.$marker['lng'].'" 
					data-icon="'.$icon.'"
					data-icon-width="'.$icon_width.'" 
					data-icon-height="'.$icon_height.'"
					data-anchor_x="'.$anchor_x.'" 
					data-anchor_y="'.$anchor_y.'"
			>';
			echo $marker['content'];
			
			echo'</div>';
		}
		?>
		
		<div id="huni-mapstyle<?php echo $map_increment; ?>" class="huni-mapstyle huni-map-setting"><?php echo $subshortcode['huni-mapstyle'][0]['content'] ?></div>
		<div id="map<?php echo $map_increment; ?>" class="huni-map-display" style="width:<?php echo $width; ?>; height: <?php echo $height; ?>;"></div>
	</div> <!-- .huni-map -->


<?php

	return ob_get_clean();
	
}

add_shortcode('huni-marker', 'huni_marker_shortcode');
function huni_marker_shortcode($atts , $content = null ){
	return 0;
}
add_shortcode('huni-mapstyle', 'huni_mapstyle_shortcode');
function huni_mapstyle_shortcode($atts , $content = null ){
	return 0;	
}






function huni_shortcode_map($str, $att = null) {
    $res = array();
    $reg = get_shortcode_regex();
    preg_match_all('~'.$reg.'~',$str, $matches);
    foreach($matches[2] as $key => $name) {
       
        $parsed = shortcode_parse_atts($matches[3][$key]);
        $parsed = is_array($parsed) ? $parsed : array();
        
        if(array_key_exists($name, $res)) {
            $arr = array();    
            if(is_array($res[$name])) {
                $arr = $res[$name];
            } else {
                $arr[] = $res[$name];
            }

        }
        
        $content['content'] = $matches[5][$key];
        $content['content'] = preg_replace('/\t/', '',  $content['content']);
        $content['content'] = ltrim($content['content']);
        $content['content'] = rtrim($content['content']);
	    
	    $content['content'] = str_replace("\r", "<br>", $content['content']);
		$content['content'] = str_replace("\n", "<br>", $content['content']);
		$content['content'] = str_replace("'", "\'", $content['content']);

		$attributes=array_key_exists($att, $parsed) ? $parsed[$att] : $parsed ;			
        $res[$name][] = array_merge($content, $attributes);

    }
    return $res;
}

function huni_map_increment()
{
    static $counter = 0;

    echo $counter;

    $counter++;
}

require('example.php');
