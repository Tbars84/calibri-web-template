<?php
// REGISTRO DE METABOXES PARA ADMINISTRACION PRESONALIZADA
add_filter( 'rwmb_meta_boxes', 'wp_meta_boxes' );

function wp_meta_boxes( $meta_boxes ) {
    //INCLUDES PARA LOS PODS ADMINISTRATIVOS
    include("metaboxes/metaBox-pages.php");
    include("metaboxes/metaBox-servicios.php");
    return $meta_boxes;
}

add_action( 'admin_init', 'hide_editor' );

function hide_editor() {
	// Get the Post ID.
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	if( !isset( $post_id ) ) return;
	// Hide the editor on the page titled 'Homepage'
	$homepgname = get_the_title($post_id);

	remove_post_type_support('page', 'editor');

	// Hide the editor on a page with a specific page template
	// Get the name of the Page Template file.
	$template_file = get_post_meta($post_id, '_wp_page_template', true);
		if($template_file == 'my-page-template.php'){ // the filename of the page template
			remove_post_type_support('page', 'editor');
		}
}

?>