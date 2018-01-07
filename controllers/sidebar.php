<?php

function huni_sidebar($position='single-left'){
	global $huni_options;
	$sidebar='sidebar-blog';
	$active_position=array();
	$position_array=explode('-', $position);
	$page=$position_array[0];
	$pageposition=$position_array[1];


	if($huni_options['layout-'.$page]=='sidebar-left'){
		$active_position[]=$page.'-left';
		$sidebar=$page;
	}
	elseif($huni_options['layout-'.$page]=='sidebar-right'){
		$active_position[]=$page.'-right';
		$sidebar=$page;
	}
	elseif($huni_options['layout-'.$page]=='two-sidebar'){
		$active_position[]=$page.'-right';
		$active_position[]=$page.'-left';
		if($pageposition=='left'){
			$sidebar=$page; // eg single-right
		}
		else{
			$sidebar=$page.'-secondary'; // eg single-right
		}
	}
	else{
			$active_position=array();

		// DO NOT DISPLAY SIDEBAR
	}
	
	
		
	if(in_array($position, $active_position)){
	?>
		<aside class="col-3">
			<?php if ( is_active_sidebar( $sidebar ) ) : ?>
				<div id="sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</div>
			<?php endif; ?>
		</aside>
	<?php
	}
}

function huni_main_class(){
	
		global $huni_options;
	$sidebar='sidebar-blog';
	
	$page=huni_get_current_layout();


	
	if($huni_options['layout-'.$page]=='two-sidebar'){
		$main_class="col-6";
	}elseif($huni_options['layout-'.$page]=='no-sidebar'){
		$main_class="col-12";
	}
	else{
		// DO NOT DISPLAY SIDEBAR
		$main_class="col-9";

	}
	
	echo $main_class;
}