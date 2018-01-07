<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class FLBasicExampleModule
 */
class HuniPricingModule extends FLBuilderModule {

	/** 
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */	 
	public function __construct()
	{
		parent::__construct(array(
			'name'			=> __('Pricing Box', 'fl-builder'),
			'description'	=> __('A module to display pricing', 'fl-builder'),
			'category'		=> __('Advanced Modules', 'fl-builder'),
			'dir'			=> HUNI_BEAVER_MODULES_PATH . '/pricing-box/',
			'url'			=> HUNI_BEAVER_MODULES_URL . '/pricing-box/',
			'editor_export' => true, // Defaults to true and can be omitted.
			'enabled'		=> true, // Defaults to true and can be omitted.
		));
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
FLBuilder::register_module('HuniPricingModule', array(
	'general'		=> array( // Tab
		'title'			=> __('General', 'fl-builder'), // Tab title
		'sections'		=> array( // Tab Sections
			'general'		=> array( // Section
				//'title'		  => __('Section Title', 'fl-builder'), // Section Title
				'fields'		=> array( // Section Fields
					'title'	   => array(
						'type'			=> 'text',
						'label'			=> __('Title', 'fl-builder'),
					),
					'price'	   => array(
						'type'			=> 'unit',
						'label'			=> __('Price', 'fl-builder'),					),
					'before_price'	   => array(
						'type'			=> 'text',
						'label'			=> __('Currency before price', 'fl-builder'),
						'description'	=> 'Currency symbole before price',
					),
					'after_price'	  => array(
						'type'			=> 'text',
						'label'			=> __('Currency after price', 'fl-builder'),
						'description'	=> 'Currency symbole after price',
					),
					'description' => array(
						'type'			=> 'textarea',
						'label'			=> __('Description', 'fl-builder'),
						'default'		=> '',
						'rows'			=> '3',
					),
					'button_text'	   => array(
						'type'			=> 'text',
						'label'			=> __('Button text', 'fl-builder'),
						'description'	=> __('Text display in the button', 'fl-builder'),
					),
					'button_link'	   => array(
						'type'			=> 'text',
						'label'			=> __('Button URL', 'fl-builder'),
						'description'	=> __('The url of the button', 'fl-builder'),
					),
					'bg_color'		=> array(
						'type'			=> 'select',
						'label'			=>__('Background Color', 'fl-builder'),
						'options'		=> array(
							'bg-primary'		=> __('Primary Color', HUNI_TEXT_DOMAIN),
							'bg-secondary' 	=> __('Secondary Color', HUNI_TEXT_DOMAIN),
							'bg-primarydark'	=> __('Primary Dark Color', HUNI_TEXT_DOMAIN),
							'bg-white'			=> __('White', HUNI_TEXT_DOMAIN),
							'bg-black'			=> __('Black', HUNI_TEXT_DOMAIN),
							'bg-gray'			=> __('Light Gray', HUNI_TEXT_DOMAIN),


						),
						'default'		=> 'bg-primary',
					),
					'txt_color'	=> array(
						'type'		=> 'select',
						'label'		=> __('Text Color', HUNI_TEXT_DOMAIN),
						'options'	=> array(
							'txt-default'		=> __('Default text color', HUNI_TEXT_DOMAIN),
							'txt-primary'		=> __('Primary Color', HUNI_TEXT_DOMAIN),
							'txt-secondary' 	=> __('Secondary Color', HUNI_TEXT_DOMAIN),
							'txt-primarydark'	=> __('Primary Dark Color', HUNI_TEXT_DOMAIN),
							'txt-white'			=> __('White', HUNI_TEXT_DOMAIN),
							'txt-black'			=> __('Black', HUNI_TEXT_DOMAIN),
							'txt-gray'			=> __('Light Gray', HUNI_TEXT_DOMAIN),

						),
						'default'	=> 'txt-white',
					),
					'button_color'	=> array(
						'type'		=> 'select',
						'label'		=> __('button color', HUNI_TEXT_DOMAIN),
						'options'	=> array(
							'primary'		=> __('Primary Color', HUNI_TEXT_DOMAIN),
							'secondary' 	=> __('Secondary Color', HUNI_TEXT_DOMAIN),
							'white'			=> __('White', HUNI_TEXT_DOMAIN),
							'black'			=> __('Black', HUNI_TEXT_DOMAIN),
						),
						'default' => 'white' 
					),
					'bullet_color'	=> array(
						'type'		=> 'select',
						'label'		=> __('Bullet point color', HUNI_TEXT_DOMAIN),
						'options'	=> array(
							'primary'		=> __('Primary Color', HUNI_TEXT_DOMAIN),
							'secondary' 	=> __('Secondary Color', HUNI_TEXT_DOMAIN),
							'white'			=> __('White', HUNI_TEXT_DOMAIN),
							'black'			=> __('Black', HUNI_TEXT_DOMAIN),
						),
						'default' => 'white' 
					)
			        
				)
			),
			'multiple'       => array( // Section
                'title'         => __('Pricing item', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'pricing_items'          => array(
                        'type'          => 'text',
                        'label'         => __('Pricing item', 'fl-builder'),
                        'multiple'      => true // Doesn't work with editor or photo fields
                    )
                )
            )
		),
		
	)
));