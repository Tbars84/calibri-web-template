<?php  
function pref_services() {
	// slug: servicio-calibri
	$args = array (
		'label' => esc_html__( 'Servicios Calibri', 'text-domain' ),
		'labels' => array(
			'menu_name' => esc_html__( 'Servicios Calibri', 'text-domain' ),
			'name_admin_bar' => esc_html__( 'servicio calibri', 'text-domain' ),
			'add_new' => esc_html__( 'Agregar Nuevo', 'text-domain' ),
			'add_new_item' => esc_html__( 'Agregar Nuevo servicio calibri', 'text-domain' ),
			'new_item' => esc_html__( 'Nuevo servicio calibri', 'text-domain' ),
			'edit_item' => esc_html__( 'Editar servicio calibri', 'text-domain' ),
			'view_item' => esc_html__( 'Ver servicio calibri', 'text-domain' ),
			'update_item' => esc_html__( 'Actualizar servicio calibri', 'text-domain' ),
			'all_items' => esc_html__( 'Todos Servicios Calibri', 'text-domain' ),
			'search_items' => esc_html__( 'BUscar Servicios Calibri', 'text-domain' ),
			'parent_item_colon' => esc_html__( 'Herencia de servicio calibri', 'text-domain' ),
			'not_found' => esc_html__( 'No se encuentra la busqueda', 'text-domain' ),
			'not_found_in_trash' => esc_html__( 'No se encuentra la busqueda en papelera', 'text-domain' ),
			'name' => esc_html__( 'Servicios Calibri', 'text-domain' ),
			'singular_name' => esc_html__( 'servicio calibri', 'text-domain' ),
		),
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => false,
		'show_in_rest' => false,
		'menu_icon' => 'dashicons-money',
		'capability_type' => 'page',
		'hierarchical' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite_no_front' => false,
		'supports' => array(
			'title',
			'thumbnail',
		),
		'taxonomies' => array(
			'category',
		),
		'rewrite' => true,
	);

	register_post_type( 'servicio-calibri', $args );
}
add_action( 'init', 'pref_services' );
?>