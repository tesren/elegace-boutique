<?php

    /*
		==========================================
			LISTINGS CUSTOM POST TYPE
		==========================================

    */   
    function bikinis_custom_post_type(){

        $labels = array(
            'name' => 'Trajes de baño',
            'singular_name' => 'Traje de baño',
            'add_new' => 'Añadir Traje',
            'all_items' => 'Todos los Trajes',
            'add_new_item' => 'Añadir Traje',
            'edit_item' => 'Editar Traje',
            'new_item' => 'Añadir Traje',
            'view_item' => 'Ver Traje',
            'search_item' => 'Buscar Traje',
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
            'menu_icon' => 'dashicons-palmtree',
            'menu_positions' => 7,
            'exclude_from_search' => false

        );

        register_post_type('bikinis', $args);

    }

    add_action('init', 'bikinis_custom_post_type');

          
add_filter( 'rwmb_meta_boxes', 'bikinis_register_meta_boxes' );

function bikinis_register_meta_boxes( $meta_boxes ) {


    $meta_boxes[] = [
        'title'      => 'Detalles',
        'post_types' => 'bikinis',

        'fields' => [
            [
                'name' => 'Precio',
                'id'   => 'price',
                'type' => 'number',
                'required'=> true,
            ],  
            [
                'name' => 'Promoción',
                'id'   => 'featured_bikini',
                'desc' => 'Las promociones se mostraran en la página de inicio',
                'type' => 'checkbox',
                'std'  => 0, // 0 or 1
            ],
            [
                'name'    => 'Tallas disponobles',
                'id'      => 'bikinis_sizes',
                'type'    => 'checkbox_list',
                'inline'  => true,
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
                'name'            => 'Piezas',
                'id'              => 'bikini_pieces',
                'type'            => 'select',
                // Array of 'value' => 'Label' pairs
                'options'         => array(
                    'Una pieza'             => 'Una pieza',
                    'Dos piezas'            => 'Dos piezas',
                    'Mas de dos piezas'     => 'Mas de dos piezas',
                ),
                // Allow to select multiple value?
                'multiple'        => false,
                // Placeholder text
                'placeholder'     => 'Select an Item',
                // Display "Select All / None" button?
                'select_all_none' => false,
            ],
                        
            [
                'id'               => 'bikini_gallery',
                'name'             => 'Fotos del bikini',
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