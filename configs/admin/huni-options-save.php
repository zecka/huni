<?php

add_action('redux/options/huni_options/saved', 'huni_redux_save_option');
function huni_redux_save_option(){
	
	global $huni_options;  // This is your opt_name.
	
	require( get_template_directory(). '/inc/scssphp/scss.inc.php' );
	$variables=array(
		"primary-color" => $huni_options['primary-color'],
		"secondary-color" => $huni_options['secondary-color'],
		"primary-font" => $huni_options['body-font']['font-family'],
		"primary-font-weight" => $huni_options['body-font']['font-weight'],
		"title-font" => $huni_options['title-font']['font-family'],
		"title-font-weight" => $huni_options['title-font']['font-weight'],
		"logo-width" => $huni_options['logo-width'],
		"logo-height" => $huni_options['logo-height'],
		
		"search-on-header" => ($huni_options['search-on-header'])? 'true' : 'false',
		"secondary-on-header" => ($huni_options['secondary-on-header'])? 'true' : 'false',
		
		"logo-on-sticky" => ($huni_options['logo-on-sticky'])? 'true' : 'false',
		"secondary-on-sticky" => ($huni_options['secondary-on-sticky'])? 'true' : 'false',
		"search-on-sticky" => ($huni_options['search-on-sticky'])? 'true' : 'false',
		
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