<?php
define( 'HUNI_VERSION', '1.0.0' );
define( 'HUNI_TEXT_DOMAIN', 'huni' );

add_action('wp_enqueue_scripts', 'huni_enqueue_scripts');
function huni_enqueue_scripts(){
	wp_enqueue_style('main', get_template_directory_uri().'/assets/css/style.css', '', HUNI_VERSION);
	wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
}

get_template_part('configs/images');
get_template_part('configs/excerpt');
get_template_part('configs/nav');
get_template_part('controllers/single/author-avatar');
get_template_part('partials/breadcrumb');
get_template_part('partials/single/comment-content');
get_template_part('shortcodes/box-highlight');
