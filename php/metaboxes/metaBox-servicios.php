<?php
    $meta_boxes[] = array(
        'title'      => __( 'Información servicios', 'textdomain' ),
        'post_types' => 'servicio-calibri',
        'fields'     => array(
            // array(
            //     'name' => esc_html__( 'Imagen Principal', 'images-servicio' ),
            //     'label_description' => esc_html__( 'Imagen donde se sube el logo de la página' ),                
            //     'id' => 'images-servicio',
            //     'type' => 'plupload_image',
            //     'max_file_uploads' => 10,
            //     'max_status'       => true
            // ),
            array(
                'id'   => 'texto-descripcion',
                'name' => __( 'Texto', 'textdomain' ),
                'rows' => 5,
                'type'    => 'wysiwyg',
                'std'     => esc_html__( '' ),
            ),
            // CHECKBOX LIST
            array(
                'name'    => esc_html__( 'Lista de Comodidades', 'textdomain' ),
                'id'      => "comodidades",
                'type'    => 'checkbox_list',
                // Options of checkboxes, in format 'value' => 'Label'
                'options' => array(
                    'Wifi'       => esc_html__( 'Wifi gratuito', 'textdomain' ),
                    'Cocina compartida'     => esc_html__( 'Cocina compartida', 'textdomain' ),
                    'Zona de lavandería'        => esc_html__( 'Zona de lavandería', 'textdomain' ),
                    'Zona de trabajo colaborativo'        => esc_html__( 'Zona de trabajo colaborativo', 'textdomain' ),
                    'Baño compartido'        => esc_html__( 'Baño compartido', 'textdomain' ),
                    'Aire acondicionado'        => esc_html__( 'Aire acondicionado', 'textdomain' ),
                    'Zona TV / Salón de uso compartido'     => esc_html__( 'Zona TV / Salón de uso compartido', 'textdomain' ),
                    'Sala de reuniones'     => esc_html__( 'Sala de reuniones', 'textdomain' ),
                    'Sala de cine'     => esc_html__( 'Sala de cine', 'textdomain' ),
                    'Elementos básicos de aseo'     => esc_html__( 'Elementos básicos de aseo', 'textdomain' ),
                    'Agua caliente'     => esc_html__( 'Agua caliente', 'textdomain' ),
                    'Closet'     => esc_html__( 'Closet', 'textdomain' ),
                    'Pet friendly'     => esc_html__( 'Pet friendly', 'textdomain' )
                ),
                // Display options in a single row?
                // 'inline' => true,
                // Display "Select All / None" button?
                'select_all_none' => true,
            ),          
        ),
    );

?>