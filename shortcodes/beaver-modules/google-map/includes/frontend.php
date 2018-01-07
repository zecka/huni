<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 
		
 */
$markers=$settings->markers;
$markers_ouput="";




foreach($markers as $marker){
	$marker_icon='http://icons.iconarchive.com/icons/paomedia/small-n-flat/32/map-marker-icon.png';
	if($marker->marker_icon!=''){
		$marker_icon=$marker->marker_icon_src;
	}
	$markers_ouput.='
	[huni-marker
			address="'.$marker->title.'"
			lat="'.$marker->lat.'"
			lng="'.$marker->lng.'"
			icon="'.$marker_icon.'"
			anchor_x="'.$marker->anchor_x.'"
			anchor_y="'.$marker->anchor_y.'"
		]'.$marker->content.'[/huni-marker]';
}


?>


[huni-gmap 
	width="<?php echo $settings->width; ?>" 
	height="<?php echo $settings->height; ?>" 
	zoom="<?php echo $settings->zoom; ?>" 

]

<?php echo $markers_ouput; ?>
[huni-mapstyle]
<?php 
	if($settings->map_style!=''){
		echo json_encode($settings->map_style);
	}else{
		echo '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]';	
	}
	
	 ?>
[/huni-mapstyle]
[/huni-gmap]