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
		// DO NOT DISPLAY SIDEBAR
	}
	
	echo $huni_options['layout-'.$page];
	
		
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
