<?php get_header(); ?>
<article>
<h1><?php the_title();?></h1>

<?php 
        if ( have_posts() ){
            
            while( have_posts() ){
                
                the_post();
                the_content();
            }
            
        }
    ?>
</article>
<?php get_footer(); ?>