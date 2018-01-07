<?php

define( 'HUNI_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'HUNI_TEXT_DOMAIN', 'huni' );


/*
 * Load Redux Frameweok
 *
 *
 */
 
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/inc/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( get_template_directory() . '/inc/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $huni_options ) && file_exists( dirname( __FILE__ ) . '/configs/admin/huni-options.php' ) ) {
    require_once( get_template_directory() . '/configs/admin/huni-options.php' );
    require_once( get_template_directory() . '/configs/admin/huni-options-save.php' );

}
if ( !isset( $huni_options ) && file_exists( dirname( __FILE__ ) . '/configs/admin/options-theme-sample.php' ) ) {
    require_once( get_template_directory() . '/configs/admin/options-theme-sample.php' );

}


/**
 *
 * Require Plugin
 *
 *	
*/

require_once get_template_directory() . '/configs/admin/require-plugins-TGM.php';


add_action('wp_enqueue_scripts', 'huni_enqueue_scripts');
function huni_enqueue_scripts(){
	wp_enqueue_style('main', get_template_directory_uri().'/assets/css/style.css', '', HUNI_VERSION);
	wp_enqueue_style( 'load-fa', get_template_directory_uri().'/assets/fontawesome/css/font-awesome.min.css', '', '4.7.0');
	wp_enqueue_script('huni-script', get_template_directory_uri().'/assets/js/huni.js', array("jquery"), HUNI_VERSION, true);
}

get_template_part('configs/post-type/portfolio');
get_template_part('configs/images');
get_template_part('configs/excerpt');
get_template_part('configs/nav');
get_template_part('configs/sidebar');
get_template_part('configs/beaver/beaver-settings');
get_template_part('configs/beaver/beaver-helpers');

get_template_part('controllers/single/author-avatar');
get_template_part('controllers/single/comments');
get_template_part('controllers/archive/numeric-pagination');
get_template_part('controllers/header/header-class');
get_template_part('controllers/sidebar');
get_template_part('controllers/helpers');

get_template_part('controllers/social-links');

get_template_part('partials/breadcrumb');
get_template_part('partials/single/comment-content');

include_once( get_template_directory().'/shortcodes/beaver-modules/beaver-init.php');
get_template_part('shortcodes/box-highlight');
get_template_part('shortcodes/pricing-box');
get_template_part('shortcodes/google-map/google-map');


/*********
 * BELOW FUNCTIONS NEED TO BE ORDERED IN RIGHT FOLDER
 */
 
