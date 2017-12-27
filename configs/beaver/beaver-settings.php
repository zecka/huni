<?php 
/*
 * Override default beaver builder settings
 * 
 */



add_filter( 'fl_builder_register_settings_form', 'wb_builder_register_settings_form', 10, 2 );
/** 
 * Filter the Global Settings Options with array_merge.
 * Media breakpoints and form title have been changed.
 */
function wb_builder_register_settings_form( $form, $id ) {
	$form2 = array();
	if ( 'global' == $id ) {
		
	// Modify the Global $form config array.   
   $form2 = array(
	   'title' => __( 'Beavertron Global Settings', 'fl-builder' ),
	   'tabs' => array(
		   'general'  => array(
			   'sections'	   => array(
				   'rows'		   => array(
					   'fields'		   => array(
						   'row_padding'	   => array(
							   'type'			   => 'unit',
							   'label'			   => __('Padding', 'fl-builder'),
							   'default'		   => '20',
							   'placeholder'	   => '0',
							   'responsive'		   => true,
							   'description'	   => 'px'
						   ),
						   'row_width'		   => array(
							   'type'			   => 'text',
							   'label'			   => __('Max Width', 'fl-builder'),
							   'default'		   => '1170',
							   'maxlength'		   => '4',
							   'size'			   => '5',
							   'description'	   => 'px',
							   'help'			   => __('All rows will default to this width. You can override this and make a row full width in the settings for each row.', 'fl-builder')
						   ),
						   
					   )
				   ),
			   )
		   ),
	   ));
   } 
   $form3 = array_merge($form, $form2);
   
   return $form3;
}
