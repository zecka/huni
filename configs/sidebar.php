<?php
$args = array(
	'name'          =>  __( 'Blog sidebar', HUNI_TEXT_DOMAIN ), 
	'id'            => "sidebar-blog",
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => "</div>\n",
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => "</h4>\n",
);
register_sidebar( $args );

$args = array(
	'name'          =>  __( 'Single sidebar', HUNI_TEXT_DOMAIN ), 
	'id'            => "single",
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => "</div>\n",
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => "</h4>\n",
);
register_sidebar( $args );

$args = array(
	'name'          =>  __( 'Single sidebar secondary', HUNI_TEXT_DOMAIN ), 
	'id'            => "single-secondary",
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => "</div>\n",
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => "</h4>\n",
);
register_sidebar( $args );

$args = array(
	'name'          =>  __( 'Archive sidebar', HUNI_TEXT_DOMAIN ), 
	'id'            => "archive",
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => "</div>\n",
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => "</h4>\n",
);
register_sidebar( $args );

$args = array(
	'name'          =>  __( 'Archive Sidebar Secondary', HUNI_TEXT_DOMAIN ), 
	'id'            => "archive-secondary",
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => "</div>\n",
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => "</h4>\n",
);
register_sidebar( $args );
