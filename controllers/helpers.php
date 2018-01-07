<?php
function huni_get_current_layout(){
	if(is_single()){
		$layout="single";
	}elseif(is_archive() || is_category() || is_home()){
		$layout="archive";
	}elseif(is_page()){
		$layout="page";
	}else{
		$layout="unknow";
	}
	return $layout;
}
