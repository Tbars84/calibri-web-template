<?php
    $categories_names = [];
    $terms = get_terms( 'category', array(
        'orderby'    => 'count',
        'hide_empty' => 0
    ) );

    foreach($terms as $category_list_item){
        if(! empty($category_list_item->name) ){
            // array_push($categories_names, $category_list_item->name);
            $categories_names[$category_list_item->name] = esc_html__( $category_list_item->name, 'textdomain' );
        }
    }
    $meta_boxes[] = array(
        'title'      => __( 'Seccion 1', 'textdomain' ),
        'post_types' => 'page',
        'fields'     => array(
            array(
                'name' => esc_html__( 'Imagen Principal', 'img-principal' ),
                'label_description' => esc_html__( 'Imagen donde se sube el logo de la página' ),                
                'id' => 'img-principal',
                'type' => 'plupload_image',
                'max_file_uploads' => 1,
                'max_status'       => true
            ),
            array(
                'id'   => 'texto-introduccion',
                'name' => __( 'Texto', 'textdomain' ),
                'rows' => 5,
                'type'    => 'wysiwyg',
                'std'     => esc_html__( '' ),
            ),
            array(
                'name' => esc_html__( 'Background Seccion', 'img-bg' ),
                'label_description' => esc_html__( 'Imagen donde se sube el logo de la página' ),                
                'id' => 'img-bg',
                'type' => 'plupload_image',
                'max_file_uploads' => 1,
                'max_status'       => true
            ),
        ),
    );
    $meta_boxes[] = array(
        'title'      => __( 'Seccion 2', 'textdomain' ),
        'post_types' => 'page',
        'fields'     => array(
            array(
                'name' => esc_html__( 'Imagen seccion 2', 'img-seccion-2' ),
                'label_description' => esc_html__( 'Imagen de sección 2' ),
                'id' => 'img-seccion-2',
                'type' => 'plupload_image',
                'max_file_uploads' => 1,
                'max_status'       => true
            ),
            array(
                'name' => esc_html__( 'Imagen seccion 2 animada', 'subImg-seccion-2' ),
                'label_description' => esc_html__( 'Imagen Animada' ),                
                'id' => 'subImg-seccion-2',
                'type' => 'plupload_image',
                'max_file_uploads' => 1,
                'max_status'       => true
            ),            
            array(
                'id'   => 'titulo-seccion-2',
                'name' => __( 'Titulo Seccion 2', 'textdomain' ),
                'type'    => 'text'
            ),            
            array(
                'id'   => 'texto-seccion-2',
                'name' => __( 'Texto Seccion 2', 'textdomain' ),
                'rows' => 5,
                'type'    => 'wysiwyg',
                'std'     => esc_html__( '' ),
            ),

        ),
    );
    $meta_boxes[] = array(
        'title'      => __( 'Caracteristicas Dinámicas', 'textdomain' ),
        'post_types' => 'page',
        'fields'     => array(
            // SELECCIONAR CATEGORIA DE SLIDER
            array(
                'name'       => 'Seleccionar Categoria de Slider',
                'desc'  => esc_html__( 'Seleccionar categoria para filtrar el slider'),
                'id'         => 'select_taxonomy',
                'type'       => 'select',
                'options'     => $categories_names,
                'field_type' => 'select_advanced',            ),
            // DIVIDER
            array(
                'type' => 'divider',
            ),
            // SELECCIONAR FORMULARIO DE PAGINA
            array(
                'name'       => 'Seleccionar tipo de formulario',
                'id'         => 'select_form',
                'type'       => 'select',
                'options'     => array(
                    'Reservas'       => esc_html__( 'Reservas', 'textdomain' ),
                    'Contacto' => esc_html__( 'Contacto', 'textdomain' ),
                    'Ninguno' => esc_html__( 'Ninguno', 'textdomain' ),
                ),
                'field_type' => 'select_advanced',
            ),

        ),
    );

?>