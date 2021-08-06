<?php

    /*
		==========================================
			LISTINGS CUSTOM POST TYPE
		==========================================

    */   
    function clothes_custom_post_type(){

        $labels = array(
            'name' => 'Ropa',
            'singular_name' => 'Ropa',
            'add_new' => 'Añadir Ropa',
            'all_items' => 'Toda la Ropa',
            'add_new_item' => 'Añadir Ropa',
            'edit_item' => 'Editar Ropa',
            'new_item' => 'Añadir Ropa',
            'view_item' => 'Ver Ropa',
            'search_item' => 'Buscar Ropa',
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
                //'comments',
            ),
            'menu_icon' => 'dashicons-tag',
            'menu_positions' => 7,
            'exclude_from_search' => false

        );

        register_post_type('clothes', $args);

    }

    add_action('init', 'clothes_custom_post_type');

          
add_filter( 'rwmb_meta_boxes', 'clothes_register_meta_boxes' );

function clothes_register_meta_boxes( $meta_boxes ) {


    $meta_boxes[] = [
        'title'      => 'Detalles',
        'post_types' => 'clothes',

        'fields' => [
            [
                'name' => 'Precio',
                'id'   => 'price',
                'type' => 'number',
                'required'=> true,
            ],  
            [
                'name' => 'Promoción',
                'id'   => 'featured_clothes',
                'desc' => 'Las promociones se mostraran en la página de inicio',
                'type' => 'checkbox',
                'std'  => 0, // 0 or 1
            ],
            [
                'name'    => 'Tallas disponibles',
                'id'      => 'clothes_sizes',
                'type'    => 'checkbox_list',
                'inline'  => true,
                'required'=> true,
                // Options of checkboxes, in format 'value' => 'Label'
                'options' => array(
                    'XS'    => 'Extra chica',
                    'S'     => 'Chica',
                    'M'     => 'Mediana',
                    'L'     => 'Grande',
                    'XL'    => 'Extra grande',
                ),
                'select_all_none' => false,
            ],
            [
                'name' => 'Material',
                'id'   => 'material',
                'type' => 'text',
                'desc' => 'Especifique de que material o materiales está hecho el artículo',
            ],
            [
                'name' => 'Marca',
                'id'   => 'brand',
                'type' => 'text',
                'desc' => 'Opcional',
            ],
            [
                'name' => 'Color',
                'id'   => 'color',
                'type' => 'text',
                'desc' => 'Especifique el color del artículo',
            ],
            [
                'name'    => 'Envíos',
                'id'      => 'delivery',
                'type'    => 'checkbox_list',
                'inline'  => true,
                // Options of checkboxes, in format 'value' => 'Label'
                'options' => array(
                    'Locales'        => 'Locales',
                    'Nacionales'     => 'Nacionales',
                    'Internacionales'=> 'Internacionales',
                ),
                'select_all_none' => false,
            ],            
            [
                'id'               => 'image_clothes',
                'name'             => 'Fotos del articulo',
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