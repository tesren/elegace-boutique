 
        <!--boton de busqueda-->
        <button title="Buscar" type="button" class="btn btn-search shadow-5" data-bs-toggle="modal" data-bs-target="#searchModal">
            <i class="fas fa-search"></i>
        </button>

         <!--Search Modal -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title fs-2" id="searchModalLabel">Busqueda</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <?php get_search_form( ); ?>
                    </div>

                    </div>
                </div>
        </div><!-- End Modal -->

        <footer class="text-center bg-light">
            <img style="height: 5rem;" src="<?php echo get_template_directory_uri() .'/assets/images/logo_boutique.svg';?>" class="mt-4 img-fluid" alt="logo">
            <!-- Grid container -->
            <div class="container pt-4 fill-brown">
                <h3>Nuestras Redes</h3>
                <!-- Section: Social media -->
                <section class="mb-4">
                <!-- Facebook -->
                <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="https://www.facebook.com/boutique.elegance.mx"
                    role="button"
                    data-mdb-ripple-color="dark"
                    target="_blank"
                    ><i class="fab fa-facebook-f fill-brown"></i
                ></a>
                <!-- Instagram -->
                <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="https://www.instagram.com/eleganceboutique.mx/"
                    role="button"
                    data-mdb-ripple-color="dark"
                    target="_blank"
                    ><i class="fab fa-instagram fill-brown"></i
                ></a>
                <!-- Whastapp -->
                <a
                    class="btn btn-link btn-floating btn-lg text-dark m-1"
                    href="#"
                    role="button"
                    data-mdb-ripple-color="dark"
                    target="_blank"
                    ><i class="fab fa-whatsapp fill-brown"></i>
                </a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center text-dark p-3">
                Todos los derechos reservados ©2021 |
                <a class="text-dark" href=""> Boutique Elegance</a>
            </div>
            <!-- Copyright -->
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <!--font awesome-->
        <script src="https://kit.fontawesome.com/164e915f72.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js"></script>
        <?php wp_footer();  ?>
    </body>
</html>