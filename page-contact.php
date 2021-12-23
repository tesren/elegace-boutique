<?php get_header(); ?>

    <?php if ( have_posts() ):
        
        while( have_posts() ): the_post(); ?>

            <!--Info de contacto-->
            <div class="bg-gris mt-0 p-4 pt-5 pb-5 p-md-5">
                <div class="row justify-content-center">
                    <div class="col-10 col-lg-6 mt-0 mt-md-4">
                    
                    <div class="b-titulo1 text-center mt-1 mt-lg-5">INFO DE CONTACTO</div>

                    <p class="mt-4 mb-4"><strong>Sucursal Plaza Caracol</strong><br>Av. Francisco Medina Ascencio, Las Glorias, 48333 Puerto Vallarta, Jal.</p>

                    <p><strong>Sucursal Plaza Parota</strong><br>Av. Francisco Medina Ascencio, Las Glorias, 48333 Puerto Vallarta, Jal.</p>

                    <div class="d-flex align-items-center pb-3 margin-top-2"><i class="fas fa-phone mr-1 fa-2x"></i><p>322 2255 531</p></div>
                    <div class="d-flex align-items-center pb-3"><i class="fas fa-phone mr-1 fa-2x"></i><p>322 1165 360</p></div>
                    <div class="d-flex align-items-center pb-3"><i class="fas fa-envelope mr-1 fa-2x"></i><p>ventas@eleganceboutiquemx.com</p></div>
                    
                    </div>

                    <!--formulario de contacto-->
                    <div class="col-11 col-lg-6" id="boutiqueContactForm">

                    <div class="b-titulo1 text-center mt-4 mt-lg-1">CONTACTO</div>

                    <?php echo do_shortcode( '[contact-form-7 id="31" title="Formulario de contacto 1"]', true ) ?>

                    </div>
                </div>
            </div>

            <?php echo the_content(); ?>
        <?php endwhile;?>
    <?php endif;?>

<?php get_footer(); ?>