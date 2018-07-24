<?php
add_action('wp_enqueue_scripts', 'huni_enqueue_portfolio_scripts');
function huni_enqueue_portfolio_scripts(){

	wp_register_script('isotope', get_template_directory_uri().'/inc/isotope/isotope.pkgd.min.js', array('jquery'), '1.5.19', false);
	wp_register_script('imageloaded', get_template_directory_uri().'/inc/isotope/imagesloaded.pkgd.min.js', array('jquery'), '1.5.19', false);

	if (is_post_type_archive('portfolio') || is_singular('portfolio')) {	
		wp_enqueue_script('isotope');
		wp_enqueue_script('imageloaded');
		wp_enqueue_script('portfolio-script', get_template_directory_uri().'/assets/js/portfolio.js', array("jquery"), HUNI_VERSION, true);

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

	$meta_boxes[] = array(
		'id' => 'portfolio-option',
		'title' => esc_html__( 'Option Portfolio Item', HUNI_TEXT_DOMAIN ),
		'post_types' => array( 'portfolio' ),
		'context' => 'normal',
		'priority' => 'high',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => 'huni_external_url',
				'type' => 'url',
				'name' => esc_html__( 'External URL', HUNI_TEXT_DOMAIN ),
				'desc' => esc_html__( 'Set an external url for this item, single page will redirect to external url', HUNI_TEXT_DOMAIN ),
			),
			array(
				'id' => 'huni_gallery',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Portfolio Gallery', HUNI_TEXT_DOMAIN ),
			),
			array(
				'id' => 'huni_gallery_slot',
				'type' => 'select',
				'name' => esc_html__( 'Portfolio gallery slot', HUNI_TEXT_DOMAIN ),
				'options' => array(
					'before_content'	=> __('Before content', HUNI_TEXT_DOMAIN),
					'after_content'		=> __('After content', HUNI_TEXT_DOMAIN),
					'shortcode'			=> __('Within Shortcode [huni_portfolio id="{portfolio_id}"]'),
				)
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'huni_portfolio_custom_fields' );









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