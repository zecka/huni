<?php
define( 'HUNI_VERSION', '1.0.0' );

add_action('wp_enqueue_scripts', 'huni_enqueue_scripts');
function huni_enqueue_scripts(){
	wp_enqueue_style('main', get_template_directory_uri().'/assets/css/main', '', HUNI_VERSION);
}