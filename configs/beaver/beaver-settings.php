<?php 
/*
 * Override default beaver builder settings
 * https://wpbeaches.com/override-beaver-builder-global-settings-including-media-query-breakpoints/
 */

function my_builder_register_settings_form( $form, $id ) {
  
  if ( 'row' == $id ) {
    // Modify the $form array for rows as needed.
    
    $form['tabs']['style']['sections']['background']['fields']['bg_type']['options']['primary'] = _x( 'Primary color', 'Background type.', 'fl-builder' );
    $form['tabs']['style']['sections']['background']['fields']['bg_type']['options']['primary-gradient'] = _x( 'Primary color gradient', 'Background type.', 'fl-builder' );

    $form['tabs']['style']['sections']['background']['fields']['bg_type']['options']['secondary'] = _x( 'Secondary color', 'Background type.', 'fl-builder' );
    $form['tabs']['style']['sections']['background']['fields']['bg_type']['options']['secondary-gradient'] = _x( 'Secondary color gradient', 'Background type.', 'fl-builder' );
    
     $form['tabs']['style']['sections']['background']['fields']['bg_type']['options']['primary-secondary-gradient'] = _x( 'Primary to Secondary color gradient', 'Background type.', 'fl-builder' );

    

  }
  elseif ( 'button' == $id ) {
    // Modify the $form array for button modules as needed.
  }
  
  return $form;
}
add_filter( 'fl_builder_register_settings_form', 'my_builder_register_settings_form', 10, 2 );
