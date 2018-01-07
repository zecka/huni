<?php
add_action('wp_enqueue_scripts', 'huni_enqueue_portfolio_scripts');
function huni_enqueue_portfolio_scripts(){

	wp_register_script('isotope', get_template_directory_uri().'/inc/isotope/isotope.pkgd.min.js', array('jquery'), '1.5.19', false);
	wp_register_script('imageloaded', get_template_directory_uri().'/inc/isotope/imagesloaded.pkgd.min.js', array('jquery'), '1.5.19', false);
	if (is_post_type_archive('portfolio')) {	
		wp_enqueue_script('isotope');
		wp_enqueue_script('imageloaded');
	}

}
if ( ! function_exists('huni_portfolio_post_type') ) {

	// Register Custom Post Type
	function huni_portfolio_post_type() {

		$labels = array(
			'name'                  => _x( 'Portfolio', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Portfolio', 'text_domain' ),
			'name_admin_bar'        => __( 'Portfolio', 'text_domain' ),
			'archives'              => __( 'Portfolio archive', 'text_domain' ),
			'attributes'            => __( 'Item Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Items', 'text_domain' ),
			'add_new_item'          => __( 'Add New Item', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Item', 'text_domain' ),
			'edit_item'             => __( 'Edit Item', 'text_domain' ),
			'update_item'           => __( 'Update Item', 'text_domain' ),
			'view_item'             => __( 'View Item', 'text_domain' ),
			'view_items'            => __( 'View Items', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Portfolio', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
			'taxonomies'            => array( 'portfolio_cat' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'menu_icon'      => 'dashicons-portfolio',

		);
		register_post_type( 'portfolio', $args );

	}
	add_action( 'init', 'huni_portfolio_post_type', 0 );

}



if ( ! function_exists( 'huni_portfolio_cat_taxonomy' ) ) {

	// Register Custom Taxonomy
	function huni_portfolio_cat_taxonomy() {

		$labels = array(
			'name'                       => _x( 'Categories portfolio', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Category portfolio', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Category', 'text_domain' ),
			'all_items'                  => __( 'All Items', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'New Item Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Item', 'text_domain' ),
			'edit_item'                  => __( 'Edit Item', 'text_domain' ),
			'update_item'                => __( 'Update Item', 'text_domain' ),
			'view_item'                  => __( 'View Item', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No items', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,

		);
		register_taxonomy( 'portfolio_cat', array( 'portfolio' ), $args );

	}
	add_action( 'init', 'huni_portfolio_cat_taxonomy', 0 );

}





function huni_portfolio_custom_fields( $meta_boxes ) {
	$prefix = 'huni-';

	$meta_boxes[] = array(
		'id' => 'portfolio-option',
		'title' => esc_html__( 'Option Portfolio Item', 'text-domain' ),
		'post_types' => array( 'portfolio' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'huni_external_url',
				'type' => 'url',
				'name' => esc_html__( 'External URL', 'text-domain' ),
				'desc' => esc_html__( 'Set an external url for this item, single page will redirect to external url', 'text-domain' ),
			),
			array(
				'id' => $prefix . 'huni_gallery',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Portfolio Gallery', 'text-domain' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'huni_portfolio_custom_fields' );




/* Ajout du JavaScript isotope sur le portfolio */
function huni_isotope_js() {
	if (!is_admin() && is_post_type_archive('portfolio')) { ?>
		<script>
		jQuery(function($) {
			$(document).ready( function() {
				
				/* Code principal */
				function huni_portfolio_isotope() {
					var $container = $('#portfolio-list');
					$container.imagesLoaded(function(){
						$container.isotope({
							itemSelector: '.item-portfolio',
							layoutMode: 'masonry'
						});
					});
				} 
				huni_portfolio_isotope();
				
				/* Filtre */
				$('.filter a').click(function() {
					var selector = $(this).attr('data-filter');
					$('#portfolio-list').isotope({ filter: selector });
					$(this).parents('ul').find('a').removeClass('alt');
					$(this).addClass('alt');
					return false;
				});
				
				/* Redimensionnement */
				var isIE8 = $.browser.msie && +$.browser.version === 8;
				if (isIE8) {
					document.body.onresize = function () {
						huni_portfolio_isotope();
					};
				} else {
					$(window).resize(function () {
						huni_portfolio_isotope();
					});
				}
				
				/* Orientation */
				window.addEventListener("orientationchange", function() {
					huni_portfolio_isotope();
				});
				
			});
		});
		</script>
<?php } 
}
add_action ('wp_footer', 'huni_isotope_js');



/* Ajout des termes dans les classes CSS des éléments du portfolio */
function huni_item_portfolio_class( $classes, $class, $ID ) {
	$taxonomy = 'portfolio_cat';
	$terms = get_the_terms( (int) $ID, $taxonomy );
	if( !empty( $terms ) ) {
		foreach( (array) $terms as $order => $term ) {
			if( !in_array( $term->slug, $classes ) ) {
				$classes[] = $term->slug;
			}
		}
	}
	$classes[]='col-4';
	return $classes;
}
add_filter('post_class', 'huni_item_portfolio_class', 10, 3);


/* Nombre d'items à afficher dans le portfolio */
function ntp_cpt_item( $query ) {
 if ( is_post_type_archive( 'portfolio' ) ) {
 $query->set( 'posts_per_page', 99 );
 return;
 }
}
add_action( 'pre_get_posts', 'ntp_cpt_item', 1 );