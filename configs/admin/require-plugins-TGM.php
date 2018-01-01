<?php


require_once get_template_directory() . '/inc/TGM-plugin-activation/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'huni_register_required_plugins' );

function huni_register_required_plugins() {
	$plugins = array(
		array(
				'name'      => 'Google Maps module for Beaver Builder',
				'slug'      => 'beaver-builder-googlemaps',
				'source'    => 'https://github.com/thierrypigot/beaver-builder-googlemaps/archive/master.zip',
			),
	);
	
	$config = array(
		'id'           => 'huni',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	
	tgmpa( $plugins, $config );

}
