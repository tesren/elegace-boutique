<?php

    /*
		==========================================
			LISTINGS CUSTOM POST TYPE
		==========================================

    */   
    function shoes_custom_post_type(){

        $labels = array(
            'name' => 'Zapatos',
            'singular_name' => 'Zapato',
            'add_new' => 'Añadir Zapato',
            'all_items' => 'Todos los Zapatos',
            'add_new_item' => 'Añadir Zapato',
            'edit_item' => 'Editar Zapato',
            'new_item' => 'Añadir Zapato',
            'view_item' => 'Ver Zapato',
            'search_item' => 'Buscar Zapato',
            'not_found' => 'Sin resultados',
            'parent_item_colon' => 'Parent item'

        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' =>  true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'supports' => array(
                'title',
                'editor',
                //'excerpt',
                //'thumbnail',
                'revisions',
                'comments',
            ),
            'menu_icon' => 'dashicons-store',
            'menu_positions' => 7,
            'exclude_from_search' => false

        );

        register_post_type('shoes', $args);

    }

    add_action('init', 'shoes_custom_post_type');

          
add_filter( 'rwmb_meta_boxes', 'shoes_register_meta_boxes' );

function shoes_register_meta_boxes( $meta_boxes ) {


    $meta_boxes[] = [
        'title'      => 'Detalles',
        'post_types' => 'shoes',

        'fields' => [
            [
                'name' => 'Precio',
                'id'   => 'price',
                'type' => 'number',
                'required'=> true,
            ],            
            [
                'name' => 'Promoción',
                'id'   => 'featured_shoes',
                'desc' => 'Las promociones se mostraran en la página de inicio',
                'type' => 'checkbox',
                'std'  => 0, // 0 or 1
            ],
            [
                'name'    => 'Tallas disponibles',
                'id'      => 'shoes_sizes',
                'type'    => 'checkbox_list',
                'inline'  => true,
                // Options of checkboxes, in format 'value' => 'Label'
                'options' => array(
                    '20'    => '20',
                    '21'     => '21',
                    '22'     => '22',
                    '23'     => '23',
                    '24'    => '24',
                    '25'    => '25',
                    '26'     => '26',
                    '27'     => '27',
                    '28'     => '28',
                    '29'    => '29',
                    '30'    => '30',
                ),
                'select_all_none' => false,
            ],            
            [
                'id'               => 'image_shoes',
                'name'             => 'Foto del cliente',
                'type'             => 'image_upload',
            
                // Delete file from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same file for multiple posts
                'force_delete'     => false,
            
                // Maximum file uploads.
                'max_file_uploads' => 10,
            
                // Do not show how many files uploaded/remaining.
                'max_status'       => 'false',
            
                // Image size that displays in the edit page.
                'image_size'       => 'thumbnail',
            ],
            
        ]

    ];
    

    // More fields..

    return $meta_boxes;
}