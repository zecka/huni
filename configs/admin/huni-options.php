<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if ( ! class_exists( 'Redux' ) ) {
	return;
}


// This is your option name where all the Redux data is stored.
$opt_name = "huni_options";


	/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

 $args = array(
	// TYPICAL -> Change these values as you need/desire
	'opt_name'			   => $opt_name,
	// This is where your data is stored in the database and also becomes your global variable name.
	'display_name'		   => $theme->get( 'Name' ),
	// Name that appears at the top of your panel
	'display_version'	   => $theme->get( 'Version' ),
	// Version that appears at the top of your panel
	'menu_type'			   => 'menu',
	//Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
	'allow_sub_menu'	   => true,
	// Show the sections below the admin menu item or not
	'menu_title'		   => __( 'Huni Options', HUNI_TEXT_DOMAIN ),
	'page_title'		   => __( 'Huni Options', HUNI_TEXT_DOMAIN ),
	);
	
Redux::setArgs( $opt_name, $args );



/*
 *	LET'S START, CREAT PAGE AND FIELD
 */
 
 Redux::setSection( $opt_name, array(
	'title'			   => __( 'Option générale', 'redux-framework-demo' ),
	'id'			   => 'basic',
	'desc'			   => __( 'These are really basic fields!', 'redux-framework-demo' ),
	'customizer_width' => '400px',
	'icon'			   => 'el el-home'
) );



Redux::setSection( $opt_name, array(
		'title'			   => __( 'Branding', 'redux-framework-demo' ),
		'id'				=> 'basic-branding',
		'subsection'		  => true,
		'customizer_width' => '450px',
		'desc'				  => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/checkbox/" target="_blank">docs.reduxframework.com/core/fields/checkbox/</a>',
		'fields'		   => array(
			array(
				'id'		=> 'opt-checkbox',
				'type'		  => 'checkbox',
				'title'	   => __( 'Checkbox Option', 'redux-framework-demo' ),
				'subtitle' => __( 'No validation can be done on this field type', 'redux-framework-demo' ),
				'desc'		  => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
				'default'  => '1'// 1 = on | 0 = off
			),
			array(
				'id'		=> 'logo-dark',
				'type'		  => 'media',
				'url'		 => true,
				'height'   => '110',
				'width'	   => 110,
				'title'	   => __( 'Logo Dark', 'redux-framework-demo' ),
				'compiler' => 'true',
				'desc'		  => __( 'Your logo in dark for light background', 'redux-framework-demo' ),
				'subtitle' => __( 'PNG is outdated please use SVG', 'redux-framework-demo' ),
				'default'  => array( 'url' => get_template_directory_uri().'/assets/img/huni-logo-black.svg' ),

			),
			array(
				'id'		=> 'logo-light',
				'type'		  => 'media',
				'url'		 => true,
				'title'	   => __( 'Logo Light', 'redux-framework-demo' ),
				'compiler' => 'true',
				'desc'		  => __( 'Your logo in light for dark background', 'redux-framework-demo' ),
				'subtitle' => __( 'PNG is outdated please use SVG', 'redux-framework-demo' ),
				'default'  => array( 'url' => get_template_directory_uri().'/assets/img/huni-logo-white.svg' ),

			),
		)
) );

Redux::setSection($opt_name, array(
	'title'		=> __('Social Links', HUNI_TEXT_DOMAIN),
	'id'		=> 'basic-social',
	'subsection'		 => true,
	'fields'	=> array(
		array(
			'id'	  	 => 'facebook-url',
			'type'	=> 'text',
			'title'	=> 'Facebook URL',
			'default' => '#',
		),
		array(
			'id'	  	 => 'twitter-url',
			'type'	=> 'text',
			'title'	=> 'Twitter URL',
			'default' => '#',
		),
		array(
			'id'	  	 => 'pinterest-url',
			'type'	=> 'text',
			'title'	=> 'Pinterest URL',
			'default' => '#',
		),
		array(
			'id'	  	 => 'dribbble-url',
			'type'	=> 'text',
			'title'	=> 'Dribbble URL',
			'default' => '#',
		),
		array(
			'id'	  	 => 'instagram-url',
			'type'	=> 'text',
			'title'	=> 'Instagram URL',
		),
		array(
			'id'	  	 => 'linkedin-url',
			'type'	=> 'text',
			'title'	=> 'Linkedin URL',
		),
	)
));

Redux::setSection($opt_name, array(
	'title'			=> __('Header', HUNI_TEXT_DOMAIN),
	'id'			=> 'basic-header',
	'subsection'	=> true,
	'fields'		=>array(
		array(
			'title'		=> __('Logo width', HUNI_TEXT_DOMAIN),
			'id'		=> 'logo-width',
			'type'		=> 'text',
			'default'	=> '118px',
		),
		array(
			'title'		=> __('Logo height', HUNI_TEXT_DOMAIN),
			'id'		=> 'logo-height',
			'type'		=> 'text',
			'default'	=> '42px',

		),
		array(
			'id'       => 'transparent-header',
			'type'     => 'switch',
			'title'    => __( 'Transparent Header', HUNI_TEXT_DOMAIN ),
			'subtitle' => __( 'Enable transparent header position absolute', HUNI_TEXT_DOMAIN ),
			'default'  => false,
		)
	)
));

Redux::setSection($opt_name, array(
	'title'	   => __('Contact Page', HUNI_TEXT_DOMAIN),
	'id'		   => 'basic-contact',
	'subsection'  => true,
	'fields'	   => array(
		array(
			'title'	  => __('Email', HUNI_TEXT_DOMAIN),
			'id'		  => 'contact-mail',
			'type'	  => 'text',
			'validate' => 'email',
			'default'  => 'introzap_info@gmail.com',
		),
		array(
			'title'	  => __('Address', HUNI_TEXT_DOMAIN),
			'id'		  => 'contact-address',
			'type'	  => 'textarea',
			'default'  => 'Barisal City , NY 10036, United States',
		),
		array(
			'title'	  => __('Phone', HUNI_TEXT_DOMAIN),
			'id'		  => 'contact-phone',
			'type'	  => 'text',
			'default'  => '+8801713879773',
		),
		array(
			'title'	  => __('Map Marker Latitude', HUNI_TEXT_DOMAIN),
			'id'		  => 'contact-lat',
			'type'	  => 'text',
			'default'  => '40.7611092',
		),
		array(
			'title'	  => __('Map Marker Longitude', HUNI_TEXT_DOMAIN),
			'id'		  => 'contact-lng',
			'type'	  => 'text',
			'default'  => '-74.0001543',
		),

		
	)
));

Redux::setSection($opt_name, array(
	'title'			=>  __('Colors', HUNI_TEXT_DOMAIN),
	'id'			=> 'basic-colors',
	'subsection'	=> true,
	'fields'		=> array(
		array(
			'title'		=> __('Primary color', HUNI_TEXT_DOMAIN),
			'id'		=> 'primary-color',
			'type'		=> 'color',
			'default'	=> '#c62650',
		),
		array(
			'title'		=> __('Secondary color', HUNI_TEXT_DOMAIN),
			'id'		=> 'secondary-color',
			'type'		=> 'color',
			'default'	=> '#5842dc',
		),
		array(
			'title'		=> __('Dark color', HUNI_TEXT_DOMAIN),
			'id'		=> 'dark-color',
			'type'		=> 'color',
			'default'	=> '#242f39',
		),
	)
));

Redux::setSection( $opt_name, array(
		'title'	 => __( 'Typography', 'redux-framework-demo' ),
		'id'	 => 'typography',
		'desc'	 => __( 'For full documentation on this field, visit: ', 'redux-framework-demo' ) . '<a href="//docs.reduxframework.com/core/fields/typography/" target="_blank">docs.reduxframework.com/core/fields/typography/</a>',
		'icon'	 => 'el el-font',
		'fields' => array(
			array(
				'id'	   => 'body-font',
				'type'	   => 'typography',
				'title'	   => __( 'Body Font', 'redux-framework-demo' ),
				'subtitle' => __( 'Specify the body font properties.', 'redux-framework-demo' ),
				'google'   => true,
				'units'		  => 'px',
				'default'  => array(
					'color'		  => '#dd9933',
					'font-size'	  => '16px',
					'line-height' => '19px',
					'font-family' => 'Roboto',
					'font-weight' => '300',
				),
			),
			array(
				'id'		  => 'title-font',
				'type'		  => 'typography',
				'title'		  => __( 'Title font', 'redux-framework-demo' ),
				'font-backup' => false,
				'all_styles'  => false,
				'font-size'	=> false,
				'text-align'	=> false,
				'line-height'	=> false,
				// Defaults to px
				'subtitle'	  => __( 'Typography option with each property can be called individually.', 'redux-framework-demo' ),
				'default'	  => array(
					'color'		  => '#333',
					'font-style'  => '700',
					'font-family' => 'Roboto',
					'google'	  => true,
					'font-size'	  => '16px',
					'line-height' => '40px'
				),
			),
		)
	) );

