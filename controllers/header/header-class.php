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

   	$classes[] = 'inverted';
	$classes[] = 'primarybg';
	if(is_front_page() || $huni_options['transparent-header']==true){
		$classes[] = 'transparent';
	}
    return $classes;     
}