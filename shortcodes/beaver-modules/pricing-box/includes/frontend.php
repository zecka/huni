<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 
		
 */

?>


[huni-pricing 
	title="<?php echo $settings->title; ?>" 
	price="<?php echo $settings->price; ?>" 
	description="<?php echo $settings->description; ?>" 
	before_price="<?php echo $settings->before_price; ?>" 
	after_price="<?php echo $settings->after_price; ?>" 
	button_text="<?php echo $settings->button_text; ?>" 
	button_link="<?php echo $settings->button_link; ?>"
]

[/huni-pricing]