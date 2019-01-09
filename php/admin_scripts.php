<?php  
// ACTIVACION DE WIDGETS
function widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Calibri Widgets', 'calibriTh' ),
			'id'            => 'wid-1',
			'description'   => __( 'Agregar funciones especiales al sitio Calibrí.', 'calibriTh' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( array(
		'name'          => 'Informacion en el footer',
		'id'            => 'Informacion_footer',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) 
	);	
}
add_action( 'widgets_init', 'widgets_init' );
// REGISTRO DE MENUS DINAMICOS
function register_my_menus(){

    register_nav_menus(array(
                            'header-nav' => 'Menu principal',                            )
    );
}
// REMOVER ATRIBUTOS NATIVOS DEL MENU
function wp_nav_menu_remove_attributes( $menu ){
    return $menu = preg_replace('/ id=\"(.*)\" class=\"(.*)\"/iU', '/', $menu );
}
add_filter( 'wp_nav_menu', 'wp_nav_menu_remove_attributes' );
add_action('init' , 'register_my_menus' );
// AGREGAR CLASE PERSONALIZADA A LINK DE RESERVA
function custom_nav_menu_link_attributes($atts, $item, $args, $depth){
	global $post;
	$post_slug=$post->post_name;
	if ($item->ID == 41) {
		if ($post_slug == 'pagina-inicio' ) {
		    $class = 'solicitar-reserva';
		    $atts['class'] = (!empty($atts['class'])) ? $atts['class'].' '.$class : $class; 

		}
	}
    return $atts;
}
add_filter('nav_menu_link_attributes', 'custom_nav_menu_link_attributes', 10, 4);

?>