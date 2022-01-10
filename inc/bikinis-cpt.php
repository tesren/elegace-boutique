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
                //'comments',
            ),
            'menu_icon' => 'dashicons-palmtree',
            'menu_positions' => 7,
            'exclude_from_search' => false

        );

        register_post_type('bikinis', $args);

    }

    add_action('init', 'bikinis_custom_post_type');

    function boutique_bikinis_custom_taxonomies(){

        //add new taxonomi heirarchical
        $labels = array(
            'name' => 'Categorías de Bikinis', //Puede ser casas, depas, terrenos
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
            'rewrite' => array('slug' => 'category_bikini') //Este parametro saldra en la URL
        );

        register_taxonomy('category_bikini', 'bikinis', $args );

    }

    add_action('init', 'boutique_bikinis_custom_taxonomies');

          
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
                'id'   => 'featured_bikini',
                'type' => 'checkbox',
                'std'  => 0, // 0 or 1
            ],
            [
                'name'       => 'Categoría',
                'id'         => 'article_category',
                'type'       => 'taxonomy',

                // Taxonomy slug.
                'taxonomy'   => 'category_bikini',

                // How to show taxonomy.
                'field_type' => 'radio_list',
            ],
            [
                'name'    => 'Tallas disponibles',
                'id'      => 'bikinis_sizes',
                'type'    => 'checkbox_list',
                'inline'  => true,
                'required'         => true,
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
                'required'         => true,
                // Array of 'value' => 'Label' pairs
                'options'         => array(
                    '1 pieza'             => '1 pieza',
                    '2 piezas'            => '2 piezas',
                    'Mas de 2 piezas'     => 'Mas de 2 piezas',
                ),
                // Allow to select multiple value?
                'multiple'        => false,
                // Placeholder text
                'placeholder'     => 'Select an Item',
                // Display "Select All / None" button?
                'select_all_none' => false,
            ],
            [
                'name' => 'Material',
                'id'   => 'material',
                'type' => 'text',
                'desc' => 'Especifique de que material o materiales está hecho el artículo',
            ],
            [
                'name' => 'Color',
                'id'   => 'color',
                'type' => 'text',
                'desc' => 'Especifique el color del artículo',
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