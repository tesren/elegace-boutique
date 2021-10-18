<?php get_header();?>

    <?php
        $args = array(
            'post_type' => 'accessories',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => 'inventory',
                    'type' => 'NUMERIC',
                    'value' => 0,
                    'compare' => '>'
                ),
            ),

        );

        $query = new WP_Query($args);
        
    ?>

    <?php if($query -> have_posts() ): 
            
            $i = 1;
            ?>
        <div class="row justify-content-evenly">
            <h1 class="text-center my-5">Todos los Accesorios </h1>
            <?php while($query -> have_posts()):  $query -> the_post();?>

            <div class="col-md-6 col-lg-3">
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
                            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                        </div>
                        <a href="<?php echo get_the_permalink(); ?>" class="price">$<?php echo number_format(rwmb_meta('price')); ?></a>
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
