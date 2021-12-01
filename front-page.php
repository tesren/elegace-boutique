<?php get_header();

  $clothes = get_posts(array(
    'post_type' => 'clothes',
    'numberposts' => -1,
    'meta_query'=> array(
        array(
            'key' => 'featured_clothes',
            'compare' => '=',
            'value' => 1,
        ),
        array(
          'key' => 'inventory',
          'compare' => '>',
          'value' => 0,
      ),
    ),
  ));
  $bikinis = get_posts(array(
    'post_type' => 'bikinis',
    'numberposts' => -1,
    'meta_query'=> array(
        array(
            'key' => 'featured_bikini',
            'compare' => '=',
            'value' => 1,
        ),
        array(
          'key' => 'inventory',
          'compare' => '>',
          'value' => 0,
      )
    ),
  ));
  $accesories = get_posts(array(
    'post_type' => 'accessories',
    'numberposts' => -1,
    'meta_query'=> array(
        array(
            'key' => 'featured_accessory',
            'compare' => '=',
            'value' => 1,
        ),
        array(
          'key' => 'inventory',
          'compare' => '>',
          'value' => 0,
      ),
    ),
  ));
  $shoes = get_posts(array(
    'post_type' => 'shoes',
    'numberposts' => -1,
    'meta_query'=> array(
        array(
            'key' => 'featured_shoes',
            'compare' => '=',
            'value' => 1,
        ),
        array(
          'key' => 'inventory',
          'compare' => '>',
          'value' => 0,
      ),
    ),
  ));

  $testimonials = get_posts(array(
    'post_type' => 'testimonials',
    'numberposts' => -1,
  ));
?>


<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-inner p-0">
    <div class="carousel-item active">
      <img src="<?php echo get_template_directory_uri().'/assets/images/cover01.jpeg';?>" class="d-block w-100" alt="landing">
    </div>
    <div class="carousel-item">
      <img src="<?php echo get_template_directory_uri().'/assets/images/cover-2.webp';?>" class="d-block w-100" alt="landing 2" loading="lazy">
    </div>
    <div class="carousel-item">
      <img src="<?php echo get_template_directory_uri().'/assets/images/cover-3.webp';?>" class="d-block w-100" alt="landing 2" loading="lazy">
    </div>
  </div>
      <div class="mask">
        <div class="d-flex justify-content-center">
          <div class="text-white">
            <div class="be-bg-black p-2 mask-titulo1">Promociones</div>
          </div>
        </div>

        <div class="d-flex justify-content-center">
          <div class="text-white">
            <div class="be-bg-brown pt-2 pb-2 mask-titulo2">Nueva Coleccion</div>
          </div>
        </div>
      </div>

</div>

 <!--CARRUSEL-->
  <div class="container-fluid p-0 pt-5">
    <div class="row">
      <div class="b-titulo2 text-center">SOLO LO MEJOR</div>
      <h1 class="text-center">NUESTRAS PROMOCIONES</h1>
    </div>


 
    <section class="slider">
      <ul id="autoWidth" class="cs-hidden">
          
      <?php if(!empty($clothes)):?>
        <?php foreach($clothes as $cloth): setup_postdata($cloth); ?>
            <li class="item-a">
              <div class="box">
                <div class="slide-img">
                  <?php $cImages = rwmb_meta('article_gallery', array('size' => 'large', 'limit' => '1' ), $cloth->ID);?>
                    <img alt="<?php echo $cImages[0]['title'] ?>" src="<?php echo $cImages[0]['url']; ?>" loading="lazy" class="img-fluid" >
                    <?php $fecha_alta = get_the_date('Y-m-d H:i:s');
                    //if($fecha_alta):?>
                    <!-- <span class="new-tag px-2">Nuevo</span> -->
                    <div class="overlay">	
                        <a href="<?php echo get_the_permalink($cloth->ID); ?>" class="buy-btn">Más Info</a>	
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="<?php echo get_the_permalink($cloth->ID); ?>"><?php echo get_the_title($cloth->ID); ?></a>
                    </div>
                    <a href="<?php echo get_the_permalink($cloth->ID); ?>" class="price">$<?php echo number_format($cloth->price); ?></a>
                </div>
              </div>		
            </li>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if(!empty($bikinis)):?>
        <?php foreach($bikinis as $bikini): setup_postdata($bikini); ?>
            <li class="item-b">
              <div class="box">
                <div class="slide-img">
                  <?php $bImages = rwmb_meta('article_gallery', array('size' => 'large', 'limit' => '1' ), $bikini->ID);?>
                    <img alt="<?php echo $bImages[0]['title'] ?>" src="<?php echo $bImages[0]['url']; ?>" loading="lazy" class="img-fluid">
                    <div class="overlay">	
                        <a href="<?php echo get_the_permalink($bikini->ID); ?>" class="buy-btn">Más Info</a>	
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="<?php echo get_the_permalink($bikini->ID); ?>"><?php echo get_the_title($bikini->ID); ?></a>
                    </div>
                    <a href="<?php echo get_the_permalink($bikini->ID); ?>" class="price">$<?php echo number_format($bikini->price); ?></a>
                </div>
              </div>		
            </li>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if(!empty($accesories)):?>
        <?php foreach($accesories as $accesory): setup_postdata($accesory); ?>
            <li class="item-c">
              <div class="box">
                <div class="slide-img">
                  <?php $aImages = rwmb_meta('article_gallery', array('size' => 'large', 'limit' => '1' ), $accesory->ID);?>
                    <img alt="<?php echo $aImages[0]['title'] ?>" src="<?php echo $aImages[0]['url']; ?>" loading="lazy" class="img-fluid">
                    <div class="overlay">	
                        <a href="<?php echo get_the_permalink($accesory->ID); ?>" class="buy-btn">Más Info</a>	
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="<?php echo get_the_permalink($accesory->ID); ?>"><?php echo get_the_title($accesory->ID); ?></a>
                    </div>
                    <a href="<?php echo get_the_permalink($accesory->ID); ?>" class="price">$<?php echo number_format($accesory->price); ?></a>
                </div>
              </div>		
            </li>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if(!empty($shoes)):?>
        <?php foreach($shoes as $shoe): setup_postdata($shoe); ?>
            <li class="item-b">
              <div class="box">
                <div class="slide-img">
                  <?php $sImages = rwmb_meta('article_gallery', array('size' => 'large', 'limit' => '1' ), $shoe->ID);?>
                    <img loading="lazy" alt="<?php echo $sImages[0]['title'] ?>" src="<?php echo $sImages[0]['url']; ?>" class="img-fluid">
                    <div class="overlay">	
                        <a href="<?php echo get_the_permalink($shoe->ID);?>" class="buy-btn">Más Info</a>	
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="<?php echo get_the_permalink($shoe->ID);?>"><?php echo get_the_title($shoe->ID); ?></a>
                    </div>
                    <a href="<?php echo get_the_permalink($shoe->ID);?>" class="price">$<?php echo number_format($shoe->price); ?></a>
                </div>
              </div>		
            </li>
        <?php endforeach; ?>
      <?php endif; ?>
          
        
      </ul>
    </section>

    <script>
      // JavaScript Document
      $(document).ready(function() {
      $('#autoWidth').lightSlider({
      autoWidth:true,
      loop:true,
      onSliderLoad: function() {
          $('#autoWidth').removeClass('cS-hidden');
      } 
      });  
      });
    </script>

    <!--GALERIA-->
    <div class="pt-5">
      <div class="row">
        <div class="promociones">
          <div class="b-titulo2 text-center">Elegance Boutique</div>
          <div class="b-titulo1 text-center">Categorías</div>
        </div>
      </div>

      <div class="row justify-content-center">
        
        <div class="col-md-4 p-3 p-lg-5">
          <div class="cardbox">
            <a href="<?php echo get_home_url(); ?>/accessories">
              <img src="<?php echo get_template_directory_uri() .'/assets/images/bolso.webp';?>" class="img-fluid img-cat" loading="lazy" alt="">
              <div class="be-bg-brown p-2"><div class="cardbox-titulo text-center">Accesorios</div></div>
            </a>
          </div>
        </div>

        <div class="col-md-4 p-3 p-lg-5">
          <div class="cardbox">
            <a href="<?php echo get_home_url(); ?>/clothes">
              <img src="<?php echo get_template_directory_uri() .'/assets/images/ropa.webp';?>" loading="lazy" class="img-fluid img-cat" alt="">
              <div class="be-bg-brown p-2"><div class="cardbox-titulo text-center">Ropa</div></div>
            </a>
          </div>
        </div>

        <div class="col-md-4 p-3 p-lg-5">
          <div class="cardbox">
            <a href="<?php echo get_home_url(); ?>/shoes">
              <img src="<?php echo get_template_directory_uri() .'/assets/images/zapatos.webp';?>" loading="lazy" class="img-fluid img-cat" alt="">
              <div class="be-bg-brown p-2"><div class="cardbox-titulo text-center">Zapatos</div></div>
            </a>
          </div>
        </div>

      </div>
    </div>

    <!--INSTAGRAM-->

    <div class="instagram mb-5" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/images/cover1.jpg');">

      <div class="row">
        <div class="text-center instagram-tiutlo mt-5">VISITA NUESTRO INSTAGRAM</div>
        <p class="text-center">#bikini #fashion #dresses</p>
      </div>

      <div class="row justify-content-evenly align-items-center text-center">

        <!--Instagram feed-->
        <div class="col-12"><?php echo do_shortcode('[insta-gallery id="1"]', true);?></div>

      </div>
      
    </div>

    <!--MAPA-->

    <div class="mt-5 mb-2">
      <div class="row">
        <div class="promociones">
          <div class="b-titulo2 text-center">Puerto Vallarta</div>
          <div class="b-titulo1 text-center">Sucursal Plaza Caracol</div>
        </div>
      </div>
    </div>

    <div style="height: 50vh;">
      <iframe title="Ubicacion sucursal Plaza Caracol" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d933.4256034943534!2d-105.23363847077192!3d20.6409831991381!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842145ee10f1ee11%3A0x3aaafc9b1a5fcaaa!2sBoutique%20Elegance%20Plaza%20Caracol!5e0!3m2!1ses-419!2smx!4v1628281295228!5m2!1ses-419!2smx" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <div class="mt-5 mb-2">
      <div class="row">
        <div class="promociones">
          <div class="b-titulo2 text-center">Puerto Vallarta</div>
          <div class="b-titulo1 text-center">Sucursal Parota Center</div>
        </div>
      </div>
    </div>

    <div style="height: 50vh;">
      <iframe title="Ubicacion sucursal Plaza Parota" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d933.4388397668572!2d-105.22156489153235!3d20.63882622920495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842145a8a62da707%3A0x7e53903753494db2!2sParota%20Center!5e0!3m2!1ses-419!2smx!4v1628532551345!5m2!1ses-419!2smx" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>


    <!--TESTIMONOIOS-->
    <?php if(!empty($testimonials)): ?>

      <div id="carouselTestimonials" class="carousel slide" data-ride="carousel">
      
        <div class="carousel-inner">

        
          <?php $j = 0;
            foreach($testimonials as $testimonial): ?>

            <div class="carousel-item <?php if($j==0){echo 'active';} ?>">
              <div class="mt-5">
                <div class="row">
                  <div class="promociones">
                    <div class="b-titulo2 text-center">Clientes</div>
                    <h2 class="text-center">TESTIMONIOS</h2>
                    <div class="px-5 pt-3 pb-3 text-center"><?php echo get_the_content(null,false, $testimonial->ID);?></div>
                    <div class="d-flex justify-content-center user"> 
                      <?php $testImages = rwmb_meta('test_profile_pic', array('size' => 'medium', 'limit' => '1' ), $testimonial->ID); ?>
                      <img style="border-radius:50%;" src="<?php echo $testImages[0]['url'] ?>" alt="<?php echo $testImages[0]['title'] ?>" loading="lazy">
                    </div>
                    <h2 class="text-center"><?php echo get_the_title($testimonial->ID);?></h2>
                    <div class="b-titulo2 text-center">Cliente</div>
                  </div>
                </div>
              </div>
            </div>

          <?php $j++;
            endforeach; ?>
        
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselTestimonials" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselTestimonials" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    <?php endif; ?>
    <!--NEWSLETTER-->

    <!-- <div class="instagram mt-5 pt-5 pb-5">

      <div class="row justify-content-center align-items-center pt-5 pb-5">

          <div class="barra-titulo text-center">SOLO LO MEJOR</div>
          <div class="text-center barra-titulo2">SUSCRIBITE A NUESTRO NEWSLETTER</div>
      
        <div class="col-11">
          <div class="input-group mb-3">
            <input type="email" class="form-control pt-3 pb-3" id="exampleFormControlInput1" placeholder="Correo electronico">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary p-3" type="button">Suscribir</button>
            </div>
          </div>
        </div>

      </div>

    </div> -->

    <!--Info de contacto-->
    <div class="bg-gris mt-5 p-4 pt-5 pb-5 p-md-5">
      <div class="row justify-content-center">
        <div class="col-10 col-lg-6 mt-0 mt-md-4">
          
          <div class="b-titulo1 text-center mt-1 mt-lg-5">INFO DE CONTACTO</div>

          <p class="mt-4 mb-4"><strong>Sucursal Plaza Caracol</strong><br>Av. Francisco Medina Ascencio, Las Glorias, 48333 Puerto Vallarta, Jal.</p>

          <p><strong>Sucursal Plaza Parota</strong><br>Av. Francisco Medina Ascencio, Las Glorias, 48333 Puerto Vallarta, Jal.</p>

          <div class="d-flex align-items-center pb-3 margin-top-2"><i class="fas fa-phone mr-1 fa-2x"></i><p>322 2255 531</p></div>
          <div class="d-flex align-items-center pb-3"><i class="fas fa-phone mr-1 fa-2x"></i><p>322 1165 360</p></div>
          <div class="d-flex align-items-center pb-3"><i class="fas fa-envelope mr-1 fa-2x"></i><p>Info.boutique@gmail.com</p></div>
          
        </div>

        <!--formulario de contacto-->
        <div class="col-11 col-lg-6">

          <div class="b-titulo1 text-center mt-4 mt-lg-1">CONTACTO</div>

          <?php echo do_shortcode( '[contact-form-7 id="31" title="Formulario de contacto 1"]', true ) ?>

        </div>
      </div>
    </div>
  </div>
        
        

<?php get_footer(); ?>