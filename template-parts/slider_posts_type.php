<?php 
// Register Custom Post Type
function Slider() {

	$labels = array(
		'name'                  => _x( 'Sliders', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Slider', 'text_domain' ),
		'name_admin_bar'        => __( 'Slider', 'text_domain' ),
		'archives'              => __( 'Slider Archives', 'text_domain' ),
		'attributes'            => __( 'Slider Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Slider:', 'text_domain' ),
		'all_items'             => __( 'All Sliders', 'text_domain' ),
		'add_new_item'          => __( 'Add New Slider', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Slider', 'text_domain' ),
		'edit_item'             => __( 'Edit Slider', 'text_domain' ),
		'update_item'           => __( 'Update Slider', 'text_domain' ),
		'view_item'             => __( 'View Slider', 'text_domain' ),
		'view_items'            => __( 'View Slider', 'text_domain' ),
		'search_items'          => __( 'Search Slider', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Slider', 'text_domain' ),
		'items_list'            => __( 'Slider list', 'text_domain' ),
		'items_list_navigation' => __( 'Sliders list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Slider', 'text_domain' ),
		'description'           => __( 'Slider', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-category',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Slider', $args );

}
add_action( 'init', 'Slider', 0 );
