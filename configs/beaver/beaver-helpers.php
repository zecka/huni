<?php
	
function huni_is_beaver(){
	if(class_exists('FLBuilderModel')){
		if ( FLBuilderModel::is_builder_enabled() ) {
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
