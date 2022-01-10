<?php get_header();?>

    <?php
        $args = array(
            'post_type' => 'clothes',
            'posts_per_page' => 20,
            'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
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

        <div class="row justify-content-center my-5">
            <h1 class="text-center col-md-6">Toda la Ropa </h1>
        </div>

        <div class="row justify-content-evenly">
            <?php while($query -> have_posts()): $query -> the_post();?>

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
                        <a href="<?php echo get_the_permalink(); ?>" class="price link-dark">

                            <?php 
                                $discountedPrice = rwmb_meta('discounted_price');
                            ?>

                            <?php if($discountedPrice): ?>
                                <span class="text-decoration-line-through d-block">$<?php echo number_format(rwmb_meta('price')); ?></span>

                                <span class="">$<?php echo number_format($discountedPrice); ?></span>
                                <span class="p-1 badge bg-red">Oferta</span>
                            <?php else: ?>
                                $<?php echo number_format(rwmb_meta('price')); ?>
                            <?php endif; ?>
                        </a>
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