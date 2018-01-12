<?php
function huni_ajax_search(){
	$search_icon='<a href="#" class="huni-search icon-link"><i class="fa fa-search"></i></a>';
	$search='<div class="huni-modal-search"><a href="#" class="close"></a><div class="modal-search-content">'.get_search_form(false).'</div></div>';
	return $search_icon.$search;
}