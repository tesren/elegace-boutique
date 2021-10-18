<?php

    /*
		==========================================
			LISTINGS CUSTOM POST TYPE
		==========================================

    */   
    function accessories_custom_post_type(){

        $labels = array(
            'name' => 'Accesorios',
            'singular_name' => 'Accesorio',
            'add_new' => 'Añadir Accesorios',
            'all_items' => 'Todos los Accesorios',
            'add_new_item' => 'Añadir Accesorio',
            'edit_item' => 'Editar Accesorio',
            'new_item' => 'Añadir Accesorio',
            'view_item' => 'Ver Accesorio',
            'search_item' => 'Buscar Accesorio',
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
            'menu_icon' => 'dashicons-superhero-alt',
            'menu_positions' => 7,
            'exclude_from_search' => false

        );

        register_post_type('accessories', $args);

    }

    add_action('init', 'accessories_custom_post_type');

          
add_filter( 'rwmb_meta_boxes', 'accessories_register_meta_boxes' );

function accessories_register_meta_boxes( $meta_boxes ) {


    $meta_boxes[] = [
        'title'      => 'Detalles',
        'post_types' => 'accessories',

        'fields' => [
            [
                'name' => 'Precio',
                'id'   => 'price',
                'type' => 'number',
                'required'=> false,
            ],  
            [
                'name' => 'Promoción',
                'desc' => 'Las promociones se mostraran en la página de inicio',
                'id'   => 'featured_accessory',
                'type' => 'checkbox',
                'std'  => 0, // 0 or 1
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
                'name' => 'Inventario',
                'id'   => 'inventory',
                'desc' => 'Ingrese la cantidad de prendas en existencia, cuando sea 0, el artículo no se mostrará en el sitio web',
                'type' => 'number',
                'std' => '1',
                'required' => true
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
                'id'               => 'article_gallery',
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