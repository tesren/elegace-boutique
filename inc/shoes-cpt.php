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
                //'comments',
            ),
            'menu_icon' => 'dashicons-store',
            'menu_positions' => 7,
            'exclude_from_search' => false

        );

        register_post_type('shoes', $args);

    }

    add_action('init', 'shoes_custom_post_type');

    function boutique_shoes_custom_taxonomies(){

        //add new taxonomi heirarchical
        $labels = array(
            'name' => 'Categorías de Zapatos', //Puede ser casas, depas, terrenos
            'singular_name' => 'Categoría',
            'search_items' => 'Buscar Categoría',
            'all_items' => 'Todas las Categorías',
            'parent_item' => 'Categoría Padre', 
            'parent_item_colon' => 'Categoría Pafre:',
            'edit_item' => 'Editar Categoría',
            'update_item' => 'Cambiar Categoría',
            'add_new_item' => 'Agregar Nueva Categoría', 
            'new_item_name' => 'Nueva Categoría',
            'manu_name' => 'Categorías'
        );

        $args = array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_in_menu' => true,
            'show_ui' => true,
            'show_admin_column' => true, //muestra u oculta la columna en vista admon para filtrar
            'query_var' => true,
            'rewrite' => array('slug' => 'category_shoes') //Este parametro saldra en la URL
        );

        register_taxonomy('category_shoes', 'shoes', $args );

    }

    add_action('init', 'boutique_shoes_custom_taxonomies');

          
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
                'required'=> false,
            ],            
            [
                'name' => 'Precio con Descuento',
                'id'   => 'discounted_price',
                'type' => 'number',
                'placeholder'=> 'Por Favor llene el precio normal antes',
                'desc' => 'Por Favor llene el precio normal antes',
                'required'=> false,
            ],
            [
                'name' => 'Artículo destacado',
                'desc' => 'Los artículos destacados se mostraran en la página de inicio',
                'id'   => 'featured_shoes',
                'type' => 'checkbox',
                'std'  => 0, // 0 or 1
            ],
            [
                'name'       => 'Categoría',
                'id'         => 'article_category',
                'type'       => 'taxonomy',

                // Taxonomy slug.
                'taxonomy'   => 'category_shoes',

                // How to show taxonomy.
                'field_type' => 'radio_list',
            ],
            [
                'name'    => 'Tallas disponibles',
                'id'      => 'shoes_sizes',
                'type'    => 'checkbox_list',
                'inline'  => true,
                'required'=> true,
                // Options of checkboxes, in format 'value' => 'Label'
                'options' => array(
                    '20'    => '20',
                    '20.5'    => '20.5',
                    '21'     => '21',
                    '21.5'     => '21.5',
                    '22'     => '22',
                    '22.5'     => '22.5',
                    '23'     => '23',
                    '23.5'     => '23.5',
                    '24'    => '24',
                    '24.5'    => '24.5',
                    '25'    => '25',
                    '25.5'    => '25.5',
                    '26'     => '26',
                    '26.5'     => '26.5',
                    '27'     => '27',
                    '27.5'     => '27.5',
                    '28'     => '28',
                    '28.5'     => '28.5',
                    '29'    => '29',
                    '29.5'    => '29.5',
                    '30'    => '30',
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
                'name' => 'Inventario',
                'id'   => 'inventory',
                'desc' => 'Ingrese la cantidad de prendas en existencia, cuando sea 0, el artículo no se mostrará en el sitio web',
                'type' => 'number',
                'std' => '1',
                'required' => true
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
                'id'               => 'article_gallery',
                'name'             => 'Fotos de los zapatos',
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