<?php

add_action('redux/options/huni_options/saved', 'huni_redux_save_option');
function huni_redux_save_option(){
	
	global $huni_options;  // This is your opt_name.
	
	require( get_template_directory(). '/inc/scssphp/scss.inc.php' );
	
	$variables=array(
		"primary-color" => $huni_options['primary-color'],
		"secondary-color" => $huni_options['secondary-color'],
		"primary-font" => $huni_options['body-font']['font-family'],
		"title-font" => $huni_options['title-font']['font-family'],
		"logo-width" => $huni_options['logo-width'],
		"logo-height" => $huni_options['logo-height'],
		
		"is-redux" => true,

	);
	$inputFilename=get_template_directory() . '/assets/sass/style.scss';
	$outputFilename='style.css';
	$inputPath=get_template_directory() . '/assets/sass/';
	$outputPath=get_template_directory() . '/assets/css/';
	
	$compiler = new Leafo\ScssPhp\Compiler();
	$compiler->addImportPath($inputPath);
	$compiler->setVariables($variables);
	$input = file_get_contents($inputFilename);
	$compiler->setVariables($variables);
	$output = $compiler->compile($input);
	file_put_contents($outputPath.$outputFilename, $output);	
	
}