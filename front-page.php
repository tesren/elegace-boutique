<?php get_header();

$clothes = get_posts(array(
  'post_type' => 'clothes',
  'numberposts' => -1,
  'meta_query'=> array(
      array(
          'key' => 'featured_clothes',
          'compare' => '=',
          'value' => 1,
      )
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
      )
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
      )
  ),
));

$testimonials = get_posts(array(
  'post_type' => 'testimonials',
  'numberposts' => -1,
));?>

<div class="d-flex justify-content-center align-items-center bg-image" style="background-image: url('http://boutique.punto401.com/wp-content/themes/boutique/assets/images/cover01.jpeg');
  background-position: center;
    background-size: cover; height: 90vh;">
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
                  <?php $cImages = rwmb_meta('image_clothes', array('size' => 'large', 'limit' => '1' ), $cloth->ID);?>
                    <img alt="<?php echo $cImages[0]['title'] ?>" src="<?php echo $cImages[0]['url']; ?>" class="img-fluid">
                    <div class="overlay">	
                        <a href="<?php echo get_the_permalink($cloth->ID); ?>" class="buy-btn">Más Info</a>	
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="#"><?php echo get_the_title($cloth->ID); ?></a>
                        <span> 
                          TALLAS:
                          <strong> 
                          <?php $tallas = rwmb_meta('clothes_sizes', $args=[] , $cloth->ID);
                          foreach($tallas as $talla):
                            echo $talla." ";
                          endforeach;?>
                          </strong>
                        </span>
                    </div>
                    <a href="#" class="price">$<?php echo number_format($cloth->price); ?></a>
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
                  <?php $bImages = rwmb_meta('bikini_gallery', array('size' => 'large', 'limit' => '1' ), $bikini->ID);?>
                    <img alt="<?php echo $bImages[0]['title'] ?>" src="<?php echo $bImages[0]['url']; ?>" class="img-fluid">
                    <div class="overlay">	
                        <a href="<?php echo get_the_permalink($bikini->ID); ?>" class="buy-btn">Más Info</a>	
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="#"><?php echo get_the_title($bikini->ID); ?></a>
                        <span> 
                          TALLAS:
                          <strong> 
                          <?php $tallas = rwmb_meta('bikinis_sizes', $args=[] , $bikini->ID);
                          foreach($tallas as $talla):
                            echo $talla." ";
                          endforeach;?>
                          </strong>
                        </span>
                    </div>
                    <a href="#" class="price">$<?php echo number_format($bikini->price); ?></a>
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
                  <?php $aImages = rwmb_meta('accessory_gallery', array('size' => 'large', 'limit' => '1' ), $accesory->ID);?>
                    <img alt="<?php echo $aImages[0]['title'] ?>" src="<?php echo $aImages[0]['url']; ?>" class="img-fluid">
                    <div class="overlay">	
                        <a href="<?php echo get_the_permalink($accesory->ID); ?>" class="buy-btn">Más Info</a>	
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="#"><?php echo get_the_title($accesory->ID); ?></a>
                    </div>
                    <a href="#" class="price">$<?php echo number_format($accesory->price); ?></a>
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
                  <?php $sImages = rwmb_meta('image_shoes', array('size' => 'large', 'limit' => '1' ), $shoe->ID);?>
                    <img alt="<?php echo $sImages[0]['title'] ?>" src="<?php echo $sImages[0]['url']; ?>" class="img-fluid">
                    <div class="overlay">	
                        <a href="<?php echo get_the_permalink($shoe->ID);?>" class="buy-btn">Más Info</a>	
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="#"><?php echo get_the_title($shoe->ID); ?></a>
                        <span> 
                          TALLAS:
                          <strong> 
                          <?php $tallas = rwmb_meta('shoes_sizes', $args=[] , $shoe->ID);
                          foreach($tallas as $talla):
                            echo $talla." ";
                          endforeach;?>
                          </strong>
                        </span>
                    </div>
                    <a href="#" class="price">$<?php echo number_format($shoe->price); ?></a>
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
        
        <div class="col-md-4 p-5">
          <div class="cardbox">
            <a href="/wordpress-boutique/accessories">
              <img src="<?php echo get_template_directory_uri() .'/assets/images/bolso.jpg';?>" class="img-fluid img-cat" alt="">
              <div class="be-bg-brown p-2"><div class="cardbox-titulo text-center">Accesorios</div></div>
            </a>
          </div>
        </div>

        <div class="col-md-4 p-5">
          <div class="cardbox">
            <a href="/wordpress-boutique/clothes">
              <img src="<?php echo get_template_directory_uri() .'/assets/images/ropa.jpeg';?>" class="img-fluid img-cat" alt="">
              <div class="be-bg-brown p-2"><div class="cardbox-titulo text-center">Ropa</div></div>
            </a>
          </div>
        </div>

        <div class="col-md-4 p-5">
          <div class="cardbox">
            <a href="/wordpress-boutique/shoes">
              <img src="<?php echo get_template_directory_uri() .'/assets/images/zapatos.jpg';?>" class="img-fluid img-cat" alt="">
              <div class="be-bg-brown p-2"><div class="cardbox-titulo text-center">Zapatos</div></div>
            </a>
          </div>
        </div>

      </div>
    </div>

    <!--INSTAGRAM-->

    <div class="instagram mb-5">

      <div class="row">
        <div class="text-center instagram-tiutlo mt-5">VISITA NUESTRO INSTAGRAM</div>
        <p class="text-center">#bikini #fashion #dresses</p>
      </div>

      <div class="row justify-content-center align-items-center text-center">

        <div class="col-5 col-md-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/insta1.jpeg';?>" class="img-fluid" alt="">
        </div>

        <div class="col-5 col-md-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/insta1.jpg';?>" class="img-fluid" alt="">
        </div>

        <div class="col-5 col-md-2 pt-3 pt-md-0">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/insta3.jpg';?>" class="img-fluid" alt="">
        </div>

        <div class="col-5 col-md-2 pt-3 pt-md-0">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/insta4.jpg';?>" class="img-fluid" alt="">
        </div>

        <div class="col-5 col-md-2 pt-3 pt-md-0">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/insta2.jpeg';?>" class="img-fluid" alt="">
        </div>
      </div>

      <div class="text-center mt-5 pb-5">
          <a href="https://www.instagram.com/eleganceboutique.mx/" class="button-brown text-center p-2" target="_blank">
            Ir a Instagram
          </a>
      </div>
      
    </div>

    <!--MAPA-->

    <div class="mt-5">
      <div class="row">
        <div class="promociones">
          <div class="b-titulo2 text-center">Puerto Vallarta</div>
          <div class="b-titulo1 text-center">SUCURSALES</div>
        </div>
      </div>
    </div>

    <div style="height: 50vh;" id="map">
    </div>

    <!--TESTIMONOIOS-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    
      <div class="carousel-inner">

      <?php if(!empty($testimonials)): 
        foreach($testimonials as $testimonial): ?>

        <div class="carousel-item active">
          <div class="mt-5">
            <div class="row">
              <div class="promociones">
                <div class="b-titulo2 text-center">Clientes</div>
                <h2 class="text-center">TESTIMONIOS</h2>
                <p class="px-5 pt-3 pb-3 text-center"><?php echo get_the_content(null,false, $testimonial->ID);?></p>
                <div class="d-flex justify-content-center user"> 
                  <?php $testImages = rwmb_meta('test_profile_pic', array('size' => 'large', 'limit' => '1' ), $testimonial->ID); ?>
                  <img style="border-radius:50%;" src="<?php echo $testImages[0]['url'] ?>" alt="<?php echo $testImages[0]['title'] ?>">
                </div>
                <h2 class="text-center"><?php echo get_the_title($testimonial->ID);?></h2>
                <div class="b-titulo2 text-center">Cliente</div>
              </div>
            </div>
          </div>
        </div>

      <?php endforeach;
      endif; ?>
       
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!--NEWSLETTER-->

    <div class="instagram mt-5 pt-5 pb-5">

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

    </div>

    <!--FORMULARIO-->
    <div class="bg-gris mt-5 p-4 pt-5 pb-5 p-md-5">
      <div class="row justify-content-center">
        <div class="col-10 col-md-6">
          
          <div class="b-titulo1 text-center">INFO DE CONTACTO</div>

          <p class="mt-4 mb-4"><strong>Sucursal Pza. Caracol</strong><br>Av. Francisco Medina Ascencio, Las Glorias, 48333 Puerto Vallarta, Jal.</p>

          <p><strong>Sucursal Glorias</strong><br>Av. Francisco Medina Ascencio, Las Glorias, 48333 Puerto Vallarta, Jal.</p>

          <div class="d-flex align-items-center pb-3 margin-top-2"><i class="fas fa-phone mr-1 fa-2x"></i><p>322 2255 531</p></div>
          <div class="d-flex align-items-center pb-3"><i class="fas fa-envelope mr-1 fa-2x"></i><p>Info.boutique@gmail.com</p></div>
          <div class="d-flex align-items-center pb-3"><i class="fab fa-whatsapp mr-1 fa-2x"></i><p>322 1165 360</p></div>
        </div>

        <div class="col-11 col-md-6">

          <div class="b-titulo1 text-center">CONTACTO</div>

          <form id="boutiqueContactForm" action="#" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Nombre">
            </div>

            <div class="form-group">
              <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Correo electronico">
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="exampleFormControlInput1" name="subject" placeholder="Asunto">
            </div>

            <div class="form-group">
              <textarea class="form-control" id="exampleFormControlTextarea1" name = "message" placeholder="Mensaje" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-outline-secondary btn-lg btn-block w-100">Enviar</button>
            </div>
            
          </form>


        </div>
      </div>
    </div>
  </div>
        
        

<?php get_footer(); ?>