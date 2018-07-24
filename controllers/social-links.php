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
			if($social_item=='pinterest'){
				$social_links[$social_item]['icon']='fa fa-pinterest-p';
			}
		}
	}
	return $social_links;
		
}

function huni_display_social_links(){ 
	$socials=get_huni_social_links();?>
	<div class="social-links">
		<?php foreach($socials as $key=>$social_item){ ?>
			<a href="<?php echo $social_item['url']; ?>"><i class="<?php echo $social_item['icon']; ?>" aria-hidden="true"></i></a>
		<?php } ?>
	</div>
	
<?php
}
?>