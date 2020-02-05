        
        <?php wp_footer(); ?>
        <!-- start footer Area -->      
        <footer class="footer-area section-gap-footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3 col-sm-3">
                        <div class="single-footer-widget">
                            <a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo('template_url' ); ?>/assets/img/logo_footer.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-sm-6">
                        <div class="single-footer-widget">
                            <ul class="footer-links">

                                <?php $menu= wp_get_nav_menu_items( 'footer-menu'); 


                                    foreach ($menu as $key => $value) {


                                        if ($value->object_id == $pageid):

                                            ?> <li class="nav-item active"><a href="<?php echo $value->url; ?>" ><?php echo $value->title; ?></a></li> <?php

                                        else:

                                            ?> <li class="nav-item"><a href="<?php echo $value->url; ?>" ><?php echo $value->title; ?></a></li> <?php

                                        endif;

                                    }

                                ?>

                            </ul>
                        </div>
                    </div>                      
                    <div class="col-12 col-lg-3 col-sm-3 social-widget">
                        <br>
                        <div class="single-footer-widget">
                            <div class="footer-social d-flex align-items-center">
                                <a href="https://www.facebook.com/tecbound/ " target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/tecboundtech" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/company/tecboubd-technology/" target="_blank"><i class="fa fa-linkedin"></i></a>
                                <a href="https://www.instagram.com/tecbound/" target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <p class="footer-text">
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <span><i>|</i></span> Powered by Tecbound and 
                            <a href="https://www.williamjoseph.com" target="_blank"> Designed by William Joseph</a> 
                            <br>
                            <a href="<?php echo get_custom('terminos_y_condiciones'); ?>">Term and Conditions</a> <span><i>|</i></span> <a href="<?php echo get_custom('politicas_de_privacidad'); ?>">Privacy Policy</a>
                        </p>
                        
                    </div>                          
                </div>
            </div-->
        </footer>   
        <!-- End footer Area -->        

        <script src="<?php bloginfo('template_url' ); ?>/assets/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="<?php bloginfo('template_url' ); ?>/assets/js/vendor/bootstrap.min.js"></script>           
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
            <script src="<?php bloginfo('template_url' ); ?>/assets/js/easing.min.js"></script>         
        <script src="<?php bloginfo('template_url' ); ?>/assets/js/hoverIntent.js"></script>
        <script src="<?php bloginfo('template_url' ); ?>/assets/js/superfish.min.js"></script>  
        <script src="<?php bloginfo('template_url' ); ?>/assets/js/jquery.ajaxchimp.min.js"></script>
        <script src="<?php bloginfo('template_url' ); ?>/assets/js/jquery.magnific-popup.min.js"></script>  
        <script src="<?php bloginfo('template_url' ); ?>/assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="<?php bloginfo('template_url' ); ?>/assets/js/justified.min.js"></script>                  
        <script src="<?php bloginfo('template_url' ); ?>/assets/js/jquery.sticky.js"></script>
        <script src="<?php bloginfo('template_url' ); ?>/assets/js/jquery.nice-select.min.js"></script>
        <script src="<?php bloginfo('template_url' ); ?>/assets/vendor/slick/slick.min.js" type="text/javascript"></script>         
        <script src="<?php bloginfo('template_url' ); ?>/assets/js/parallax.min.js"></script>       
        <script src="<?php bloginfo('template_url' ); ?>/assets/js/mail-script.js"></script>    
        <script src="<?php bloginfo('template_url' ); ?>/assets/js/main.js"></script>   
        <!--<script src="<?php bloginfo('template_url' ); ?>/assets/js/analytics.js"></script>-->
    </body>
</html>