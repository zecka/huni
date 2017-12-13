<?php 
	// Add Shortcode
function zk_box_highlight_shortcode( $atts , $content = null ) {
	
	return '<div class="zk-box-highlight">'.$content.'</div>'; 

}
add_shortcode( 'zk-box-highlight', 'zk_box_highlight_shortcode' );


?>