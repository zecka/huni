<?php
define( 'HUNI_VERSION', '1.0.0' );
define( 'HUNI_TEXT_DOMAIN', 'huni' );

/*
 * Load Redux Frameweok
 *
 *
 */
 
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/configs/admin/options-theme.php' ) ) {
    require_once( dirname( __FILE__ ) . '/configs/admin/options-theme.php' );
}

if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/configs/admin/options-theme-sample.php' ) ) {
    require_once( dirname( __FILE__ ) . '/configs/admin/options-theme-sample.php' );
}

add_action('wp_enqueue_scripts', 'huni_enqueue_scripts');
function huni_enqueue_scripts(){
	wp_enqueue_style('main', get_template_directory_uri().'/assets/css/style.css', '', HUNI_VERSION);
	wp_enqueue_style( 'load-fa', get_template_directory_uri().'/assets/fontawesome/css/font-awesome.min.css', '', '4.7.0');
	wp_enqueue_script('huni-script', get_template_directory_uri().'/assets/js/huni.js', array("jquery"), HUNI_VERSION, true);
}

get_template_part('configs/images');
get_template_part('configs/excerpt');
get_template_part('configs/nav');
get_template_part('configs/sidebar');
get_template_part('controllers/single/author-avatar');
get_template_part('controllers/single/comments');
get_template_part('partials/breadcrumb');
get_template_part('partials/single/comment-content');
get_template_part('shortcodes/box-highlight');


