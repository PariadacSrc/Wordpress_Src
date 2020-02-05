<?php /*Template Name: Contact-Us*/
    get_header(); 
    
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
    
?>

    <!-- start banner Area -->

    <?php $image = get_field('imagen_de_fondo'); ?>

    <?php if( !empty($image) ): ?>

        <section class="banner-area relative general-banner contactbanner" id="home" style="background-image: url('<?php echo $image['url']; ?>')">

    <?php else: ?>
        <section class="banner-area relative general-banner contactbanner" id="home">
    <?php endif; ?>

        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-right">
                <div class="banner-content col-lg-8 One-titlee">
                    <div>
                        <h1 class="text-white"><span><?php echo get_field("subtitulo_del_banner_principal"); ?></span>
                            <?php echo get_field("titulo_principal_del_banner"); ?></h1>
                        <p class="pt-20 pb-20 text-white"><?php echo get_field("descripcion_del_banner"); ?>
                        </p>
                        <?php
                            $link = get_field('url_principal');
                            if( $link ){
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                echo '<a href="'.esc_url($link_url).'" target="'.esc_attr($link_target).'" class=""><i class="tecbound-coolarrow"></i> <span>'.esc_html($link_title).'</span></a>';
                            }

                        ?>
                        
                    </div>
                </div>                                          
            </div>
            <div class="cutearrow">
                <i class="tecbound-chevron-down"></i>
            </div>
        </div>                  
    </section>
    <!-- End banner Area -->


    <!-- Start contact-page Area -->
    <section class="contact-page-area section-gap">
        <div class="container contact-container">

            <?php

                // check if the repeater field has rows of data
                if( have_rows('bloque') ):

                    // loop through the rows of data
                    while ( have_rows('bloque') ) : the_row();


                        ?>


                            <div class="row">
                                <div class="col-12 contact-title">
                                    <h3 class=""><?php echo get_sub_field('titulo'); ?></h3>
                                    <hr>
                                </div>
                            </div>

                            <div class="row showinline">
                                <div class="col-lg-4 col-12">
                                    <div class="single-contact-address d-flex fixflex flex-row">
                                        <div class="fixdisplay">
                                            <i class="tecbound-map-pin icon-contact fixicon"></i>
                                        </div>
                                        <div class="contact-details fixdisplay">
                                            <h5 class="fixtext"><?php echo get_sub_field('direccion'); ?></h5>
                                        </div>
                                        <?php if (strlen(get_sub_field('link_del_mapa_para_movil'))>0): ?>
                                            <div class="icon-contact2 fixdisplay fixlinkicon">
                                                <a href="<?php echo get_sub_field('link_del_mapa_para_movil'); ?>" class=""><i class="tecbound-coolarrow"></i><span>Get Directions</span></a>
                                                <hr>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="single-contact-address d-flex fixflex">
                                            <div class="fixdisplay">
                                                <i class="tecbound-mail icon-contact fixicon"></i>
                                            </div>
                                            <div class="contact-details fixdisplay">
                                                <h5 class="fixtext"><?php echo get_sub_field('correo'); ?></h5>
                                                <hr>
                                            </div>
                                        </div>
                                    <div class="single-contact-address d-flex fixflex contact-top">
                                        <div class="fixdisplay">
                                            <i class="tecbound-phone icon-contact fixicon"></i>
                                        </div>
                                        <div class="contact-details fixdisplay">
                                            <h5 class="fixtext"><?php echo get_sub_field('telefono'); ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <?php if (strlen(get_sub_field('mapa'))>0): ?>
                                        <iframe width="100%" height="300px" frameborder="0" style="border:0" src="<?php echo get_sub_field('mapa'); ?>" allowfullscreen></iframe>
                                    <?php endif; ?>
                                </div>
                            </div>


                        <?php


                    endwhile;

                else :

                    // no rows found

                endif;

            ?>


        </div>  
    </section>
    <!-- End contact-page Area -->


<?php   endwhile; 

    else : ?>

        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php   
    
    endif;
        
        get_footer(); ?>