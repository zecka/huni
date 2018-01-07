<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 
		
 */
$items=$settings->pricing_items;
?>


[huni-pricing 
	title="<?php echo $settings->title; ?>" 
	price="<?php echo $settings->price; ?>" 
	description="<?php echo $settings->description; ?>" 
	before_price="<?php echo $settings->before_price; ?>" 
	after_price="<?php echo $settings->after_price; ?>" 
	button_text="<?php echo $settings->button_text; ?>" 
	button_link="<?php echo $settings->button_link; ?>"
	bg_color="<?php echo $settings->bg_color; ?>"
	txt_color="<?php echo $settings->txt_color; ?>"
	bullet_color="<?php echo $settings->bullet_color; ?>"
	button_color="<?php echo $settings->button_color; ?>"

]
<?php if(!empty($items) && $items[0]!=''){
	echo '<ul>';
	foreach($items as $item){
		if($item!=''){
			echo '<li>'.$item.'</li>';
		}
	}
	echo '</ul>';
}
?>
[/huni-pricing]