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
                        <a href="<?php echo get_the_permalink($cloth->ID); ?>"><?php echo get_the_title($cloth->ID); ?></a>
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
                  <?php $bImages = rwmb_meta('bikini_gallery', array('size' => 'large', 'limit' => '1' ), $bikini->ID);?>
                    <img alt="<?php echo $bImages[0]['title'] ?>" src="<?php echo $bImages[0]['url']; ?>" class="img-fluid">
                    <div class="overlay">	
                        <a href="<?php echo get_the_permalink($bikini->ID); ?>" class="buy-btn">Más Info</a>	
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="<?php echo get_the_permalink($bikini->ID); ?>"><?php echo get_the_title($bikini->ID); ?></a>
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
                  <?php $aImages = rwmb_meta('accessory_gallery', array('size' => 'large', 'limit' => '1' ), $accesory->ID);?>
                    <img alt="<?php echo $aImages[0]['title'] ?>" src="<?php echo $aImages[0]['url']; ?>" class="img-fluid">
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
                  <?php $sImages = rwmb_meta('image_shoes', array('size' => 'large', 'limit' => '1' ), $shoe->ID);?>
                    <img alt="<?php echo $sImages[0]['title'] ?>" src="<?php echo $sImages[0]['url']; ?>" class="img-fluid">
                    <div class="overlay">	
                        <a href="<?php echo get_the_permalink($shoe->ID);?>" class="buy-btn">Más Info</a>	
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="<?php echo get_the_permalink($shoe->ID);?>"><?php echo get_the_title($shoe->ID); ?></a>
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

      <div class="row justify-content-evenly align-items-center text-center">

        <div class="col-11 col-md-3">
          <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/CRUx_O7tvpd/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="13" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/CRUx_O7tvpd/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> Ver esta publicación en Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/CRUx_O7tvpd/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Una publicación compartida por Ropa, accesorios y calzado (@eleganceboutique.mx)</a></p></div></blockquote> <script async src="//www.instagram.com/embed.js"></script>
          <!-- <img src="<?php echo get_template_directory_uri() .'/assets/images/insta1.jpeg';?>" class="img-fluid" alt=""> -->
        </div>

        <div class="col-11 col-md-3">
          <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/CR9o6PSt0RD/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="13" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/CR9o6PSt0RD/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> Ver esta publicación en Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/CR9o6PSt0RD/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Una publicación compartida por Ropa, accesorios y calzado (@eleganceboutique.mx)</a></p></div></blockquote> <script async src="//www.instagram.com/embed.js"></script>
        </div>

        <div class="col-11 col-md-3 pt-3 pt-md-0">
            <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/CSFXUdZNolc/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="13" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/CSFXUdZNolc/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> Ver esta publicación en Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/CSFXUdZNolc/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Una publicación compartida por Ropa, accesorios y calzado (@eleganceboutique.mx)</a></p></div></blockquote> <script async src="//www.instagram.com/embed.js"></script>
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
        <div class="col-10 col-md-6 mt-0 mt-md-4">
          
          <div class="b-titulo1 text-center mt-2 mt-md-5">INFO DE CONTACTO</div>

          <p class="mt-4 mb-4"><strong>Sucursal Pza. Caracol</strong><br>Av. Francisco Medina Ascencio, Las Glorias, 48333 Puerto Vallarta, Jal.</p>

          <p><strong>Sucursal Glorias</strong><br>Av. Francisco Medina Ascencio, Las Glorias, 48333 Puerto Vallarta, Jal.</p>

          <div class="d-flex align-items-center pb-3 margin-top-2"><i class="fas fa-phone mr-1 fa-2x"></i><p>322 2255 531</p></div>
          <div class="d-flex align-items-center pb-3"><i class="fas fa-envelope mr-1 fa-2x"></i><p>Info.boutique@gmail.com</p></div>
          <div class="d-flex align-items-center pb-3"><i class="fab fa-whatsapp mr-1 fa-2x"></i><p>322 1165 360</p></div>
        </div>

        <div class="col-11 col-md-6">

          <div class="b-titulo1 text-center">CONTACTO</div>

          <form id="boutiqueContactForm" action="<?php echo '' ?>" method="POST" data-url="<?php echo admin_url('admin-ajax.php');?>">
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