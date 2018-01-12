<?php

function huni_portfolio_custom_fields( $meta_boxes ) {
	$prefix = 'huni-';

	$meta_boxes[] = array(
		'id' => 'portfolio-option',
		'title' => esc_html__( 'Option Portfolio Item', 'text-domain' ),
		'post_types' => array( 'portfolio' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'huni_external_url',
				'type' => 'url',
				'name' => esc_html__( 'External URL', 'text-domain' ),
				'desc' => esc_html__( 'Set an external url for this item, single page will redirect to external url', 'text-domain' ),
			),
			array(
				'id' => $prefix . 'huni_gallery',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Portfolio Gallery', 'text-domain' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'huni_portfolio_custom_fields' );
