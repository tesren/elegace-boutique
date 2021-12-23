<?php get_header(); ?>

  <article>
  
   <?php 
        if ( have_posts() ):
            
            while( have_posts() ): the_post();?>

                <div class="container my-5">

                    <div class="row">

                        <div class="col-lg-7">

                            <?php $images = rwmb_meta('article_gallery', array( 'size' => 'full' ));?>

                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                    <?php $i=1;
                                    foreach($images as $image): ?>
                                        <div class="carousel-item <?php if($i==1){echo 'active';}?>">
                                            <img src="<?php echo $image['url'] ?>" class="d-block w-100" alt="<?php echo $image['title'] ?>">
                                        </div>
                                    <?php $i++; 
                                    endforeach; ?>
                                  
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                        <div class="col-lg-5 px-4 px-lg-3">
                            <h1 class="my-3" style="color:#937b6f;"><?php the_title();?></h1>
                            <span class="fw-bold fs-4 d-block">MXN $<?php echo number_format(rwmb_meta('price')); ?></span>

                            <?php $envios = rwmb_meta('delivery');
                            if(!empty($envios)): ?>
                                <span class="fs-5 mt-3 d-block"><i class="fas fa-shipping-fast"></i> Envíos:
                                    <?php $j=0;
                                    foreach($envios as $envio): ?>
                                        <strong>
                                            <?php if($j==1 || $j==2){echo ", ".$envio;} else{echo $envio;} ?>
                                        </strong>
                                    <?php $j++; 
                                    endforeach ?>
                                </span>
                            <?php endif; ?>

                            <span class="fs-5 mt-3 d-block"><i class="fas fa-tags"></i> Tallas disponibles: 
                                <strong>
                                    <?php $tallas = rwmb_meta('shoes_sizes');
                                    foreach($tallas as $talla){
                                        echo $talla." ";
                                    }?>
                                </strong>
                            </span>
                            <?php if(!empty(rwmb_meta('material'))): ?>
                                <span class="fs-5 mt-3 d-block"><i class="fas fa-tshirt"></i> Material: <strong><?php echo rwmb_meta('material'); ?></strong></span>
                            <?php endif; ?>

                            <?php if(!empty(rwmb_meta('color'))): ?>
                                <span class="fs-5 mt-3 d-block"><i class="fas fa-palette"></i> Color: <strong><?php echo rwmb_meta('color'); ?></strong></span>
                            <?php endif; ?>

                            <?php if(!empty(rwmb_meta('brand'))): ?>
                                <span class="fs-5 mt-3 d-block">Marca: <strong><?php echo rwmb_meta('brand'); ?></strong></span>
                            <?php endif; ?>

                            <div class="fs-5 mt-4"><?php echo the_content(); ?></div>
                            
                            <?php $text = " Hola me interesa este artículo"; ?>
                            <a href="https://wa.me/523223030071?text=<?php echo get_the_permalink().$text; ?>" class="btn btn-outline-secondary mt-4 w-100" target="_blank">
                                <i class="fab fa-whatsapp me-1"></i>   
                                 Me Interesa
                            </a>
                        </div>


                    </div>

                 <!--    <div class="row justify-content-center text-center mt-5">
                        <?php //comments_template(); ?>
                    </div> -->

                    <?php 
                    $title = get_the_title();
                    $permalink = get_the_permalink();
                    $twitterHandler = ( get_option('twitter_handler') ? '&amp;via='.esc_attr( get_option('twitter_handler') ) : '' );

                    $twitter = 'https://twitter.com/intent/tweet?text=Vean este artículo: ' . $title . '&amp;url=' . $permalink . $twitterHandler .'';
                    $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
                    $whatsapp = 'https://api.whatsapp.com/send?text='. $permalink;
                ?>

                    <aside class="social-media">
                    
                        <a href="<?php echo $facebook ?>" class="s-item facebook" target="_blank" rel="noopener">
                            <span class="fab fa-facebook-f"></span>
                        </a>
                        
                        <a href="<?php echo $twitter ?>" class="s-item twitter" target="_blank" rel="noopener">
                            <span class="fab fa-twitter"></span>
                        </a>
                        

                        <a href="<?php echo $whatsapp ?>" class="s-item gplus" target="_blank" rel="noopener" data-action="share/whatsapp/share">
                            <span class="fab fa-whatsapp"></span>
                        </a>

                    </aside>

                </div>

        <?php endwhile;
            
        endif;
    ?>
</article>
<?php get_footer(); ?>