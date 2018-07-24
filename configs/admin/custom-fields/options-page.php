<?php

function huni_option_pages_custom_fields( $meta_boxes ) {
	$prefix = 'huni-';

	$meta_boxes[] = array(
		'id' => 'page-options',
		'title' => esc_html__( 'Page Options', HUNI_TEXT_DOMAIN ),
		'post_types' => array( 'portfolio', 'post', 'page' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'sidebar',
				'name' => esc_html__( 'Sidebar Position', HUNI_TEXT_DOMAIN ),
				'type' => 'select',
				'placeholder' => esc_html__( 'Select an Item', HUNI_TEXT_DOMAIN ),
				'options' => array(
					'default' => 'Default',
					'right' => 'Right',
					'left' => 'Left',
				),
				'std' => 'default',
			),
			array(
				'id' => $prefix . 'enable-page-title',
				'name' => esc_html__( 'Enable page title', HUNI_TEXT_DOMAIN ),
				'type' => 'select',
				'placeholder' => esc_html__( 'Select an Item', HUNI_TEXT_DOMAIN ),
				'options' => array(
					'default' => 'Default value',
					'display' => 'Display',
					'hide' => 'Hidden',
				),
				'std' => 'default',
			),
			
			array(
				'id' => $prefix . 'header-type',
				'name' => esc_html__( 'Header type', HUNI_TEXT_DOMAIN ),
				'type' => 'select',
				//'placeholder' => esc_html__( 'Select an header type', HUNI_TEXT_DOMAIN ),
				'options' => array(
					'default' => 'Default value',
					'normal' => 'Normal',
					'transparent' => 'Transparent',
				),
				'std' => 'default',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'huni_option_pages_custom_fields' );


