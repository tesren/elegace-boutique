<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head><meta charset="euc-jp">
      
      <title>Elegance Boutique - Tienda de Ropa en Puerto Vallarta</title>
      <?php if( is_singular() && pings_open( get_queried_object() )  ) : ?>
      <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
      <?php endif; ?>
      <?php wp_head();?>
      <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Tienda de Ropa, accesorios y calzado en Puerto Vallarta, Jalisco">

      <!--Jquery para que funcione el slider-->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

      <!--fuente-->
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    </head>
    
    <body <?php body_class();?>>
  <header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <a class="navbar-brand ms-3" href="<?php echo get_home_url(); ?>">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/logo_boutique.svg';?>" id="logo-header" alt="logo">
      </a>

      <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <?php
                      wp_nav_menu( array(
                          'theme_location'    => 'primary',
                          'depth'             => 2,
                          'container'         => 'div',
                          'container_class'   => 'collapse navbar-collapse justify-content-end pe-4 pe-lg-5 text-end',
                          'container_id'      => 'navbarSupportedContent',
                          'menu_class'        => 'navbar-nav ms-auto',
                          'menu_id'           => 'boutique_navbar',
                          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                          'walker'            => new WP_Bootstrap_Navwalker(),
                      ) );
                      ?>
      
    </nav>

  </header>


    
    

  <?php
      // wp_nav_menu(
      //     [
      //         'menu'        => 'primary',
      //         'container'   => '',
      //         'theme_location' => 'primary',
      //         'items_wrap'  => '<ul>%3$s</ul>',
      //         'walker' => new Walker_Nav_Primary(),
      //     ]
      // )
  ?>