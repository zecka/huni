<?php
/*=============================================
=            BREADCRUMBS			            =
=============================================*/
function huni_breadcrumb() {
    $sep = ' > ';
    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to  homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;
	
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category(', ');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', HUNI_TEXT_DOMAIN ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', HUNI_TEXT_DOMAIN ), get_the_date( _x( 'F Y', 'monthly archives date format', HUNI_TEXT_DOMAIN ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', HUNI_TEXT_DOMAIN ), get_the_date( _x( 'Y', 'yearly archives date format', HUNI_TEXT_DOMAIN ) ) );
            } else {
                _e( 'Blog Archives', HUNI_TEXT_DOMAIN );
            }
        }
	
	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }
	
	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
        echo '</div>';
    }
}
/*
* Credit: http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/
*/

?>