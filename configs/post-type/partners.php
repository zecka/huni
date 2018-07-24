<?php

if ( ! function_exists('huni_partner_post_type') ) {
	
	// Register Custom Post Type
function huni_partner_post_type() {

	$labels = array(
		'name'                  => _x( 'Partners', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Partner', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Partners', 'text_domain' ),
		'name_admin_bar'        => __( 'Partners', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Partner', 'text_domain' ),
		'description'           => __( 'Partners logo', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail'),
		'taxonomies'            => array( 'partner_cat' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'partner', $args );

}
add_action( 'init', 'huni_partner_post_type', 0 );
	
}

if ( ! function_exists('huni_partner_cat_taxonomy') ) {

// Register Custom Taxonomy
function huni_partner_cat_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Partner categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Partner category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Category', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'partner_cat', array( 'partner' ), $args );

}
add_action( 'init', 'huni_partner_cat_taxonomy', 0 );

}



function huni_partner_custom_fields( $meta_boxes ) {

	$meta_boxes[] = array(
		'id' => 'partner-option',
		'title' => esc_html__( 'Option Portfolio Item', 'text-domain' ),
		'post_types' => array( 'partner' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => 'huni_partner_external_url',
				'type' => 'url',
				'name' => esc_html__( 'External URL', 'text-domain' ),
				'desc' => esc_html__( 'Set an external url for this item, single page will redirect to external url', 'text-domain' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'huni_partner_custom_fields' );
