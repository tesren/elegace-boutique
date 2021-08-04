<?php get_header(); ?>

  <article>
  
   <?php 
        if ( have_posts() ):
            
            while( have_posts() ): the_post();?>

                <div class="container my-5">

                    <div class="row">

                        <div class="col-md-7">

                            <?php $images = rwmb_meta('image_clothes', array( 'size' => 'full' ));?>

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

                        <div class="col-md-5">
                            <h1 class="my-3" style="color:#937b6f;"><?php the_title();?></h1>
                            <span class="fw-bold fs-4 d-block">$<?php echo number_format(rwmb_meta('price')); ?></span>
                            <span class="fs-5 mt-3 d-block">Tallas disponibles: 
                                <strong>
                                    <?php $tallas = rwmb_meta('clothes_sizes');
                                    foreach($tallas as $talla){
                                        echo $talla." ";
                                    }?>
                                </strong>
                            </span>
                            <div class="fs-5 mt-4"><?php echo the_content(); ?></div>
                        </div>


                    </div>

                    <div class="row justify-content-center text-center mt-5">
                        <?php comments_template(); ?>
                    </div>

                </div>

        <?php endwhile;
            
        endif;
    ?>
</article>
<?php get_footer(); ?>