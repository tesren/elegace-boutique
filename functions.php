<?php

function v4you_theme_support()
{
    //Add dinamyc title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support( 'custom-header' );
    add_theme_support( 'widgets' );
    add_theme_support('html5', array('comment-list', 'comment-form') );
}

add_action('after_setup_theme', 'v4you_theme_support');

//ENABLE MENU FUNCTION

function boutique_menus()
{    
    $locations = array(
        'primary' => __( 'Primary Menu', 'boutique' ),
        'pre-header' => __('Pre Header Menu', 'boutique'),
        'footer' => "Footer menu Items",
    );
    
    register_nav_menus( $locations );
}

add_action('init', 'boutique_menus');



function cb_register_styles()
{
    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style('cb-style', get_template_directory_uri() . "/style.css", array('cb-bootstrap'), $version , 'all');
    wp_enqueue_style('cb-bootstrap', get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), '5.1.3', 'all');
    wp_enqueue_style('lightslider', get_template_directory_uri() . "/assets/css/lightslider.css", array(), $version , 'all');
    wp_enqueue_style('cb-style-primary', get_template_directory_uri() . "/assets/css/cb_styles.css", array(), $version , 'all');
   
}

add_action('wp_enqueue_scripts', 'cb_register_styles');


function cb_register_scripts()
{
    
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_script('v4you_jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), '3.5.1', true);
    wp_enqueue_script('cb_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array(), '5.1.3', true);
    wp_enqueue_script('cb_fontawesome', 'https://kit.fontawesome.com/164e915f72.js', array(), '5.15.1', true);
    wp_enqueue_script('lightslider', get_template_directory_uri() .  '/assets/js/lightslider.js', array(), $version, true);
    wp_enqueue_script('v4you_main', get_template_directory_uri() .  '/assets/js/v4you_main.js', array('v4you_jquery'), $version, true);
    
}

add_action('wp_enqueue_scripts', 'cb_register_scripts');


// Async load
function os_async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async"; 
}

add_filter( 'clean_url', 'os_async_scripts', 11, 1 );


/*      ==========================================
			INCLUDE WALKER FILTER
		==========================================

	*/
    /**
     * Register Custom Navigation Walker
     */
    function register_navwalker(){
        require_once get_template_directory() . '/classes/class-wp-bootstrap-navwalker.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker' );

     /**
     * Register Custom Comments Walker
     */
    function register_commentswalker(){
        require_once get_template_directory() . '/inc/walker-comments.php';
    }
    add_action( 'after_setup_theme', 'register_commentswalker' );


    require get_template_directory() . '/inc/ajax.php';

    require get_template_directory() . '/inc/testimonials-cpt.php';

    require get_template_directory() . '/inc/shoes-cpt.php';

    require get_template_directory() . '/inc/bikinis-cpt.php';

    require get_template_directory() . '/inc/clothes-cpt.php';

    require get_template_directory() . '/inc/accessories-cpt.php';

    function check_post_type_and_remove_media_buttons() {
        global $current_screen;
        // Replace following array items with your own custom post types
        $post_types = array('bikinis','clothes', 'accessories', 'testimonials', 'shoes');
        if (in_array($current_screen->post_type,$post_types)) {
        remove_action('media_buttons', 'media_buttons');
        }
    }

    add_action('admin_head','check_post_type_and_remove_media_buttons');

    function boutique_get_category($postID, $taxonomy){
        
        $terms_list = array_reverse(wp_get_post_terms( $postID, $taxonomy ) );

        if ( ! empty( $terms_list ) && ! is_wp_error( $terms_list ) ) {
            foreach ( $terms_list as $term ) {
                echo $term->name;
            }
        }
    }
?>