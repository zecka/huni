<?php 
function get_huni_social_list(){
	return array(
		'facebook',
		'twitter',
		'dribbble',
		'pinterest',
		'linkedin',
		'instagram'
	);
}

function get_huni_social_links(){
	global $huni_options;
	$social_links=array();
	
	$social_list=get_huni_social_list();
	
	foreach($social_list as $social_item){
		if($huni_options[$social_item.'-url']!=''){
			$social_links[$social_item]['url']=$huni_options[$social_item.'-url'];
			$social_links[$social_item]['name']=$social_item;
			$social_links[$social_item]['icon']='fa fa-'.$social_item;
		}
	}
	return $social_links;
		
}
?>