<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class FLBasicExampleModule
 */
class HuniGmapModule extends FLBuilderModule {

	/** 
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */	 
	public function __construct()
	{
		parent::__construct(array(
			'name'			=> __('Google Map', 'fl-builder'),
			'description'	=> __('A module to display a map', 'fl-builder'),
			'category'		=> __('Advanced Modules', 'fl-builder'),
			'dir'			=> HUNI_BEAVER_MODULES_PATH . '/google-map/',
			'url'			=> HUNI_BEAVER_MODULES_URL . '/google-map/',
		));
		
		add_filter('fl_builder_render_settings_field', array($this, 'extended_map_filters'), 10, 3);

	}
	
	public function extended_map_filters( $field, $name, $settings ) {
		if( isset($field) && 'map_style' == $name && $settings->map_style ) {
			$settings->map_style = trim(stripslashes(json_encode($settings->map_style)), '"');
		}
		return $field;
	}
}

/**
 * Register the module and its form settings.
 'title' => '',
		'price' => '',
		'description' => '',
		'before_price' => '$',
		'after_price' => '',
		'button_text' => 'Get Started',
		'button_link' => '#',
		
 */
FLBuilder::register_module('HuniGmapModule', array(
	'general'       => array(
		'title'         => __('General', HUNI_TEXT_DOMAIN),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'zoom'        => array(
						'type'          => 'select',
						'label'         => __('Zoom', HUNI_TEXT_DOMAIN),
						'default'       => '13',
						'options'       => array(
							'1'      => '1',
							'2'      => '2',
							'3'      => '3',
							'4'      => '4',
							'5'      => '5',
							'6'      => '6',
							'7'      => '7',
							'8'      => '8',
							'9'      => '9',
							'10'     => '10',
							'11'     => '11',
							'12'     => '12',
							'13'     => '13',
							'14'     => '14',
							'15'     => '15',
							'16'     => '16',
							'17'     => '17',
							'18'     => '18',
							'19'     => '19',
							'20'     => '20',
							'21'     =>	'21',
						),
						'preview'      => array(
							'type'         => 'refresh'
						)
					),
					'width'        => array(
						'type'          => 'text',
						'label'         => __('Width', HUNI_TEXT_DOMAIN),
						'default'       => '100%',
						'size'          => '10',
						'preview'      => array(
							'type'         => 'refresh'
						)
					),
					'height'        => array(
						'type'          => 'text',
						'label'         => __('Height', HUNI_TEXT_DOMAIN),
						'default'       => '400px',
						'size'          => '10',
						'preview'      => array(
							'type'         => 'refresh'
						)
					),
				)
			)
		)
	),
	'markersSection'       => array(
		'title'         => __('Markers', HUNI_TEXT_DOMAIN),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'markers'         => array(
						'type'          => 'form',
						'label'         => __('Marker', HUNI_TEXT_DOMAIN),
						'form'          => 'marker_group_form', // ID from registered form below
						'preview_text'  => 'title', // Name of a field to use for the preview text
						'multiple'      => true
					),
				)
			)
		)
	),
	'map_style'			=> array(
		'title'			=> __('Style', HUNI_TEXT_DOMAIN),
		'description'	=> __('Paste a style from <a href="http://snazzymaps.com" target="_blank">Snazzymaps</a> or <a href="http://www.mapstylr.com/" target="_blank">MapStylr</a>.', HUNI_TEXT_DOMAIN),
		'sections'	=> array(
			'map_style'			=> array(
				'title'			=> __('Style Code', HUNI_TEXT_DOMAIN),
				'fields'		=> array(
					'map_style'			=> array(
						'type'				=> 'textarea',
						'rows'				=> '15',
						'preview'      => array(
							'type'         => 'refresh'
						)
					)
				)
			)
		)
	)
));




/*
* Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('marker_group_form', array(
	'title' => __('Add Marker', HUNI_TEXT_DOMAIN),
	'tabs'  => array(
		'general'       => array( // Tab
			'title'         => __('General', HUNI_TEXT_DOMAIN), // Tab title
			'sections'      => array( // Tab Sections
				'general'       => array( // Section
					'title'         => '', // Section Title
					'fields'        => array( // Section Fields
						'title'       => array(
							'type'          => 'text',
							'label'         => __('Title', HUNI_TEXT_DOMAIN),
							'help'			=> __('Used to identify the markers in list', HUNI_TEXT_DOMAIN),
						),
						'lat'       => array(
							'type'          => 'text',
							'label'         => __('Latitude', HUNI_TEXT_DOMAIN),
							'placeholder'   => __('46.2034325', HUNI_TEXT_DOMAIN),
							'preview'         => array(
								'type'            => 'refresh'
							)
						),
						'lng'       => array(
							'type'          => 'text',
							'label'         => __('Longitude', HUNI_TEXT_DOMAIN),
							'placeholder'   => __('6.1500826'),
							'preview'         => array(
								'type'            => 'refresh'
							)
						),
						'marker_icon'        => array(
							'type'          => 'photo',
							'label'         => __('Marker Icon', HUNI_TEXT_DOMAIN),
							'preview'		=> array(
								'type'         => 'refresh'
							)
						),
						'anchor_x'       => array(
							'type'          => 'select',
							'label'         => __('Anchor Position horizontal', HUNI_TEXT_DOMAIN),
							'placeholder'   => __('12'),
							'description'	=> __('The anchor for this icon', HUNI_TEXT_DOMAIN ),
							'options'=> array(
								'left' => __('Left', HUNI_TEXT_DOMAIN),
								'center' => __('Center', HUNI_TEXT_DOMAIN),
								'right' => __('Right', HUNI_TEXT_DOMAIN),							
							),
							'default'	=>'center',
							'preview'         => array(
								'type'            => 'refresh'
							)
						),
						
						'anchor_y'       => array(
							'type'          => 'select',
							'label'         => __('Anchor Position vertical', HUNI_TEXT_DOMAIN),
							'placeholder'   => __('24'),
							'description'	=> __('The anchor for this icon', HUNI_TEXT_DOMAIN ),
							'options'=> array(
								'top' => __('Top', HUNI_TEXT_DOMAIN),
								'center' => __('Center', HUNI_TEXT_DOMAIN),
								'bottom' => __('Bottom', HUNI_TEXT_DOMAIN),	
							),
							'default'	=>'bottom',
							'preview'         => array(
								'type'            => 'refresh'
							)
						), 
						'content'        => array(
							'type'          => 'editor',
							'media_buttons' => true,
							'rows'          => 10
						),
					)
				)
			)
		)
	)
));