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
	'opt_name'				 => $opt_name,
	// This is where your data is stored in the database and also becomes your global variable name.
	'display_name'			=> $theme->get( 'Name' ),
	// Name that appears at the top of your panel
	'display_version'		  => $theme->get( 'Version' ),
	// Version that appears at the top of your panel
	'menu_type'				  => 'menu',
	//Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
	'allow_sub_menu'		 => true,
	// Show the sections below the admin menu item or not
	'menu_title'			  => __( 'Huni Options', HUNI_TEXT_DOMAIN ),
	'page_title'			  => __( 'Huni Options', HUNI_TEXT_DOMAIN ),
	);
	
Redux::setArgs( $opt_name, $args );

// Set variable for multiple_use_field


$layout_options=array(
		'no-sidebar' => array(
			'alt' => '1 Column',
			'img' => ReduxFramework::$_url . 'assets/img/1col.png'
		),
		'sidebar-left' => array(
			'alt' => '2 Column Left',
			'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
		),
		'sidebar-right' => array(
			'alt' => '2 Column Right',
			'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
		),
		'two-sidebar' => array(
			'alt' => '3 Column Middle',
			'img' => ReduxFramework::$_url . 'assets/img/3cm.png'
		)
	);

/*
 *	LET'S START, CREAT PAGE AND FIELD
 */
 
 Redux::setSection( $opt_name, array(
	'title'				  => __( 'Option générale', HUNI_TEXT_DOMAIN ),
	'id'			   => 'basic',
	'desc'				 => __( 'These are really basic fields!', HUNI_TEXT_DOMAIN ),
	'customizer_width' => '400px',
	'icon'				 => 'el el-home'
) );



Redux::setSection( $opt_name, array(
		'title'			   => __( 'Branding', HUNI_TEXT_DOMAIN ),
		'id'				=> 'basic-branding',
		'subsection'		  => true,
		'customizer_width' => '450px',
		'desc'				  => __( 'For full documentation on this field, visit: ', HUNI_TEXT_DOMAIN ) . '<a href="//docs.reduxframework.com/core/fields/checkbox/" target="_blank">docs.reduxframework.com/core/fields/checkbox/</a>',
		'fields'		   => array(
			array(
				'id'		=> 'opt-checkbox',
				'type'		  => 'checkbox',
				'title'	   => __( 'Checkbox Option', HUNI_TEXT_DOMAIN ),
				'subtitle' => __( 'No validation can be done on this field type', HUNI_TEXT_DOMAIN ),
				'desc'		  => __( 'This is the description field, again good for additional info.', HUNI_TEXT_DOMAIN ),
				'default'  => '1'// 1 = on | 0 = off
			),
			array(
				'id'		=> 'logo-dark',
				'type'		  => 'media',
				'url'		 => true,
				'height'   => '110',
				'width'	   => 110,
				'title'	   => __( 'Logo Dark', HUNI_TEXT_DOMAIN ),
				'compiler' => 'true',
				'desc'		  => __( 'Your logo in dark for light background', HUNI_TEXT_DOMAIN ),
				'subtitle' => __( 'PNG is outdated please use SVG', HUNI_TEXT_DOMAIN ),
				'default'  => array( 'url' => get_template_directory_uri().'/assets/img/huni-logo-black.svg' ),

			),
			array(
				'id'		=> 'logo-light',
				'type'		  => 'media',
				'url'		 => true,
				'title'	   => __( 'Logo Light', HUNI_TEXT_DOMAIN ),
				'compiler' => 'true',
				'desc'		  => __( 'Your logo in light for dark background', HUNI_TEXT_DOMAIN ),
				'subtitle' => __( 'PNG is outdated please use SVG', HUNI_TEXT_DOMAIN ),
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
			'title'		=> __('Header type', HUNI_TEXT_DOMAIN),
			'id'		=> 'header-type',
			'type'		=> 'select',
			'options'	=> array(
				'default' 	=> __('Default', HUNI_TEXT_DOMAIN),
				'advanced'		=>__('Advanced', HUNI_TEXT_DOMAIN),
				'left'		=>__('Left', HUNI_TEXT_DOMAIN),
			),
			'default'	=> 'default',	
		),
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
			'id'		  => 'transparent-header',
			'type'	  => 'switch',
			'title'	  => __( 'Transparent Header', HUNI_TEXT_DOMAIN ),
			'subtitle' => __( 'Enable transparent header position absolute', HUNI_TEXT_DOMAIN ),
			'default'  => false,
		),
		
		/* ================================================
			         SECONDARY NAV
		================================================   */
		array(
			'title'		=> __('Display secondary menu button on header'),
			'id'		=> 'secondary-on-header',
			'type'		=> 'switch',
			'default'	=> true,
		),
		
		array(
				'id'	 => 'section-end',
				'type'	 => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		

		array(
			'title'		=> __('Display search on header'),
			'id'		=> 'search-on-header',
			'type'		=> 'switch',
			'default'	=> true,
		),
		array(
			'title'		=> __('Display logo on sticky header'),
			'id'		=> 'logo-on-sticky',
			'type'		=> 'switch',
			'default'	=> true,
		),
		
		array(
			'title'		=> __('Display search bar on sticky'),
			'id'		=> 'search-on-sticky',
			'type'		=> 'switch',
			'default'	=> true,
		),
		
		array(
			'id'	   => 'section-start',
			'type'	   => 'section',
			'title'	   => __( 'Secondary Nav Button', HUNI_TEXT_DOMAIN ),
			//'subtitle' => __( 'Secondary Nav button style', 'redux-framework-demo' ),
			'indent'   => false, // Indent all options below until the next 'section' option is set.
		),
		array(
			'title'		=> __('Display secondary nav button on header'),
			'id'		=> 'secondary-on-header',
			'type'		=> 'switch',
			'default'	=> true,
		),
		array(
			'title'		=> __('Display secondary nav button on stick header'),
			'id'		=> 'secondary-on-sticky',
			'type'		=> 'switch',
			'default'	=> true,
		),
		
		array(
			'title'		=> __('Secondary nav button 1 text', HUNI_TEXT_DOMAIN),
			'id'		=> 'secondary-btn-1-txt',
			'type'		=> 'text',
			'default'	=> 'shop',
		),
		array(
			'title'		=> __('Secondary nav button 1 url', HUNI_TEXT_DOMAIN),
			'id'		=> 'secondary-btn-1-url',
			'type'		=> 'text',
			'default'	=> '#',
		),
		array(
			'title'		=> __('Secondary nav button 2 text', HUNI_TEXT_DOMAIN),
			'id'		=> 'secondary-btn-2-txt',
			'type'		=> 'text',
			'default'	=> 'contact',
		),
		array(
			'title'		=> __('Secondary nav button 2 url', HUNI_TEXT_DOMAIN),
			'id'		=> 'secondary-btn-2-url',
			'type'		=> 'text',
			'default'	=> '#',
		),
	)
));

Redux::setSection($opt_name, array(
	'title'			=> __('Blog', HUNI_TEXT_DOMAIN),
	'id'			=> 'basic-blog',
	'subsection'	=> true,
	'fields'		=> array(
		array(
			'title'		=> __('Enable Blog introduction texte'),
			'id'		=> 'enable-blog-intro',
			'type'		=> 'switch',
			'default'	=> true,
		),
		array(
			'title'		=> __('Blog intro title', HUNI_TEXT_DOMAIN),
			'id'		=> 'blog-intro-title',
			'type'		=> 'text',
			'default'	=> 'A blog about good food',
			'required' => array( 'enable-blog-intro', '=', '1' ),
		),
		array(
			'title'		=> __('Blog Intro', HUNI_TEXT_DOMAIN),
			'descrition' => __('A small description of your blog on the top of archive page and blog page', HUNI_TEXT_DOMAIN),
			'id'		=> 'blog-intro',
			'type'		=> 'textarea',
			'default'	=> 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec rutrum congue leo eget malesuada.',
			'required' => array( 'enable-blog-intro', '=', '1' ),
		),
		array(
			'title'		=> __('Enable Social Share on single page'),
			'id'		=> 'social-share-single',
			'type'		=> 'switch',
			'default'	=> true,
		),
		array(
			'title'		=> __('Enable Social Share on archive page'),
			'id'		=> 'social-share-archive',
			'type'		=> 'switch',
			'default'	=> true,
		),
		array(
			'title'		=> __('Enable Author info in single page'),
			'id'		=> 'author-info',
			'type'		=> 'switch',
			'default'	=> true,
		),
		array(
			'id'		=> 'layout-archive',
			'type'		=> 'image_select',
			'title'		=> __( 'Layout Archive', HUNI_TEXT_DOMAIN ),
			//Must provide key => value(array:title|img) pairs for radio options
			'options'	=> $layout_options,
			'default'	=> 'no-sidebar',
		),
		array(
			'id'		=> 'layout-single',
			'type'		=> 'image_select',
			'title'		=> __( 'Layout Single', HUNI_TEXT_DOMAIN ),
			//Must provide key => value(array:title|img) pairs for radio options
			'options'	=> $layout_options,
			'default'	=> 'sidebar-right',
		)
	)
));
Redux::setSection($opt_name, array(
	'title'			=> __('Contact Page', HUNI_TEXT_DOMAIN),
	'id'			=> 'basic-contact',
	'subsection'	=> true,
	'fields'		=> array(
		array(
			'title'		=> __('Email', HUNI_TEXT_DOMAIN),
			'id'		=> 'contact-mail',
			'type'		=> 'text',
			'validate'	=> 'email',
			'default'	=> 'introzap_info@gmail.com',
		),
		array(
			'title'		=> __('Address', HUNI_TEXT_DOMAIN),
			'id'		=> 'contact-address',
			'type'		=> 'textarea',
			'default'	=> 'Barisal City , NY 10036, United States',
		),
		array(
			'title'		=> __('Phone', HUNI_TEXT_DOMAIN),
			'id'		=> 'contact-phone',
			'type'		=> 'text',
			'default'	=> '+8801713879773',
		),
		array(
			'title'		=> __('Map Marker Latitude', HUNI_TEXT_DOMAIN),
			'id'		=> 'contact-lat',
			'type'		=> 'text',
			'default'	=> '40.7611092',
		),
		array(
			'title'		=> __('Map Marker Longitude', HUNI_TEXT_DOMAIN),
			'id'		=> 'contact-lng',
			'type'		=> 'text',
			'default'	=> '-74.0001543',
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

Redux::setSection($opt_name, array(
	'title'			=> __('Footer', HUNI_TEXT_DOMAIN),
	'id'			=> 'footer',
	'subsection' 	=> true,
	'fields'		=> array(
		array(
			'title'			=> __('Enable partners block in footer', HUNI_TEXT_DOMAIN),
			'id'			=>'footer_partners',
			'type'			=> 	'switch',
			'default'   	=> true,
			'description'	=> 'Add logo on custom post type "partners"',
		),
		array(
			'title'			=>__('Partners block intro text', HUNI_TEXT_DOMAIN),
			'id'			=> 'intro_partners',
			'type'			=> 'textarea',
			'required' 		=> array( 'footer_partners', '=', '1' ),
		),
		
		array(
			'title'			=> __('Enable call to action in footer', HUNI_TEXT_DOMAIN),
			'id'			=>'footer_cta',
			'type'			=> 	'switch',
			'default'   	=> true,
			'description'	=> 'Add logo on custom post type "partners"',
		),
		array(
			'title'			=>__('Call to action title', HUNI_TEXT_DOMAIN),
			'id'			=> 'footer_cta_title',
			'type'			=> 'textarea',
			'required' 		=> array( 'footer_cta', '=', '1' ),
		),
		array(
			'title'			=>__('Call to action texte', HUNI_TEXT_DOMAIN),
			'id'			=> 'footer_cta_txt',
			'type'			=> 'textarea',
			'required' 		=> array( 'footer_cta', '=', '1' ),
		),
		array(
			'title'			=>__('Call to action url', HUNI_TEXT_DOMAIN),
			'id'			=> 'footer_cta_url',
			'type'			=> 'text',
			'required' 		=> array( 'footer_cta', '=', '1' ),
		),
		array(
			'title'			=>__('Call to action button text', HUNI_TEXT_DOMAIN),
			'id'			=> 'footer_cta_btn_txt',
			'type'			=> 'text',
			'required' 		=> array( 'footer_cta', '=', '1' ),
		),
		
		array(
			'title'			=> __('Add a mailchimp form on footer', HUNI_TEXT_DOMAIN),
			'id'			=>'footer_mailchimp',
			'type'			=> 	'switch',
			'default'   	=> true,
			'description'	=> 'First you need to install mailchimp for wordpress <a href="https://fr.wordpress.org/plugins/mailchimp-for-wp/">https://fr.wordpress.org/plugins/mailchimp-for-wp/</a>',
		),
		array(
			'title'			=>__('Mailchimp form shortcode', HUNI_TEXT_DOMAIN),
			'id'			=> 'footer_mailchimp_shortcode',
			'type'			=> 'textarea',
			'required' 		=> array( 'footer_mailchimp', '=', '1' ),
			'description'	=> 'Default huni form code: &lt;input type=&quot;email&quot; name=&quot;EMAIL&quot; placeholder=&quot;Your email address&quot; required /&gt;
&lt;input class=&quot;button&quot; type=&quot;submit&quot; value=&quot;Submit&quot; /&gt;'
		),
		
		array(
			'title'			=>__('Footer copyright', HUNI_TEXT_DOMAIN),
			'id'			=> 'footer_copyright',
			'type'			=> 'textarea',
			'default'		=> 'Copyright 2018 © <a href="https://www.zeckart.com">Huni</a> All rights reserved.',
		),
		
		array(
			'title'			=> __('Display a pre-footer widget zone', HUNI_TEXT_DOMAIN),
			'id'			=>'prefooter',
			'type'			=> 	'switch',
			'default'   	=> true,
		),
	)
	
));
Redux::setSection( $opt_name, array(
		'title'	 => __( 'Typography', HUNI_TEXT_DOMAIN ),
		'id'	 => 'typography',
		'desc'	 => __( 'For full documentation on this field, visit: ', HUNI_TEXT_DOMAIN ) . '<a href="//docs.reduxframework.com/core/fields/typography/" target="_blank">docs.reduxframework.com/core/fields/typography/</a>',
		'icon'	 => 'el el-font',
		'fields' => array(
			array(
				'id'		=> 'body-font',
				'type'		  => 'typography',
				'title'	   => __( 'Body Font', HUNI_TEXT_DOMAIN ),
				'subtitle' => __( 'Specify the body font properties.', HUNI_TEXT_DOMAIN ),
				'google'   => true,
				'font-backup'	=> false,
				'all_styles'  	=> false,
				'font-size'		=> false,
				'text-align'	=> false,
				'line-height'	=> false,
				'color'			=> false,
				'subsets'		=> false,
				'units'		  => 'px',
				'default'  => array(
					'color'			=> '#dd9933',
					'font-size'	  => '16px',
					'line-height' => '19px',
					'font-family' => 'Roboto',
					'font-weight' => '300',
				),
			),
			array(
				'id'				=> 'title-font',
				'type'		  	=> 'typography',
				'title'		  	=> __( 'Title font', HUNI_TEXT_DOMAIN ),
				'font-backup'	=> false,
				'all_styles'  	=> false,
				'font-size'		=> false,
				'text-align'	=> false,
				'line-height'	=> false,
				'color'			=> false,
				'subsets'		=> false,
				// Defaults to px
				'subtitle'		 => __( 'Typography option with each property can be called individually.', HUNI_TEXT_DOMAIN ),
				'default'		=> array(
					'color'			=> '#333',
					'font-style'  => '700',
					'font-family' => 'Roboto',
					'google'		=> true,
				),
			),
		)
) );



