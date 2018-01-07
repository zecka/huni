<?php
define( 'HUNI_BEAVER_MODULES_PATH', get_template_directory().'/shortcodes/beaver-modules' );
define( 'HUNI_BEAVER_MODULES_URL', get_template_directory_uri().'/shortcodes/beaver-modules' );


/**
 * Custom modules
 */
function huni_load_modules_beaver() {
	if ( class_exists( 'FLBuilder' ) ) {
	    require_once 'pricing-box/pricing-box-beaver.php';
	    require_once 'google-map/google-map-beaver.php';

	}
}
add_action( 'init', 'huni_load_modules_beaver' );