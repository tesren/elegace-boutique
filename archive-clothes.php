<?php get_header();?>

       
    <?php if( have_posts() ): 
            
            $i = 1;
            ?>

        <div class="row justify-content-center my-5">
            <h1 class="text-center col-md-6">Toda la Ropa </h1>
        </div>

        <div class="row justify-content-evenly">
            <?php while( have_posts()):  the_post();?>

            <div class="col-md-3">
                <div class="box">
                    <div class="slide-img">
                    <?php $sImages = rwmb_meta('article_gallery', array('size' => 'large', 'limit' => '1' ), get_the_ID() );?>
                        <img alt="<?php echo $sImages[0]['title'] ?>" src="<?php echo $sImages[0]['url']; ?>" class="img-fluid">
                        <div class="overlay">	
                            <a href="<?php echo get_the_permalink(); ?>" class="buy-btn">Más Info</a>	
                        </div>
                    </div>
                    <div class="detail-box">
                        <div class="type">
                            <a href="#"><?php echo get_the_title(); ?></a>
                        </div>
                        <a href="#" class="price">$<?php echo number_format(rwmb_meta('price')); ?></a>
                    </div>
                </div>		
            </div>


            <?php   
                $i++;
                endwhile; 
                the_posts_pagination();
                ?>
        </div><!--row-->
    <?php endif; ?>

        
        
<?php get_footer(); ?>