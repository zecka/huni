<?php

if ( ! function_exists( 'huni_paging_nav' ) ) :
	
	function huni_paging_nav() {
		global $wp_query, $wp_rewrite;
		
		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}
		
		$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args = array();
		$url_parts = explode( '?', $pagenum_link );
		
		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}
		
		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
		
		$format = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
		
		// Set up paginated links.
		$links = paginate_links( array(
			'base' => $pagenum_link,
			'format' => $format,
			'total' => $wp_query->max_num_pages,
			'current' => $paged,
			'mid_size' => 2,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( '<i class="fa fa-angle-double-left" aria-hidden="true"></i>', HUNI_TEXT_DOMAIN),
			'next_text' => __( '<i class="fa fa-angle-double-right" aria-hidden="true"></i>', HUNI_TEXT_DOMAIN),
			'type' => 'list',
		) );
		if ( $links ) :
		
			?>
			<nav class="navigation paging-navigation" role="navigation">
			
				<div class="pagination loop-pagination">
					<?php echo $links; ?>
				</div><!-- .pagination -->
			</nav><!-- .navigation -->
		<?php
		endif;
	}
endif;
?>