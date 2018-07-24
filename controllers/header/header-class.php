<?php 
function huni_header_class( $class='' ){
	echo 'class="' . join( ' ', get_huni_header_class( $class ) ) . '"';
}
function get_huni_header_class( $class = ''){
	
	$classes = array();


	if ( ! empty( $class ) ) {
		if ( !is_array( $class ) ){
			$class = preg_split( '#\s+#', $class );
   		}
   		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}
	$classes = array_map( 'esc_attr', $classes );

	$classes = apply_filters( 'huni_header_class', $classes, $class );

	return array_unique( $classes );
}

add_filter( 'huni_header_class','huni_header_transparent_class' );
function huni_header_transparent_class($classes){
	global $huni_options;
	if($huni_options['header-type']!='left'){
		$classes[] = 'inverted';
	}
	$classes[] = 'primarybg';
	if(is_front_page() || $huni_options['transparent-header']==true || rwmb_meta('huni-header-type') == 'transparent'){
		$classes[] = 'transparent';
	}
	return $classes;     
}

function huni_header_type_body_class($classes) {
	global $huni_options;
	$classes[]='header-type-'.$huni_options['header-type'];
    return $classes;
}

add_filter('body_class', 'huni_header_type_body_class');

function filter_nav_menu_item_title( $title, $item, $args, $depth ) { 
    // make filter magic happen here... 
    if(array_search('menu-item-has-children', $item->classes)){
		$title.=' <i class="huni-open-toggle"></i>';   
    }
    return $title; 
};         
// add the filter 
add_filter( 'nav_menu_item_title', 'filter_nav_menu_item_title', 10, 4 ); 