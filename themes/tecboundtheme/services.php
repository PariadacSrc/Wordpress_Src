<?php /*Template Name: Services*/
    get_header(); 
    
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
    
?>

    <!-- start banner Area -->

    <?php $image = get_field('imagen_de_fondo'); ?>

    <?php if( !empty($image) ): ?>

        <section class="banner-area relative general-banner servicebanner" id="home" style="background-image: url('<?php echo $image['url']; ?>')">

    <?php else: ?>
        <section class="banner-area relative general-banner servicebanner" id="home">
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


    <?php

        // check if the repeater field has rows of data
        if( have_rows('bloque') ):

            // loop through the rows of data
            while ( have_rows('bloque') ) : the_row();


                if (get_sub_field('tipo_de_bloque')=='verticales') {
                    

                    ?>

                        <section class="vertical-globarea tablevar">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        

                                        <?php

                                            $services = get_sub_field('seccion');


                                            foreach ($services as $servkey => $servvalue) {
                                                
                                                if (strlen($servvalue['titulo'])>19 && strlen($servvalue['titulo'])<30) {
                                                    $style = 'longservice';
                                                }elseif(strlen($servvalue['titulo'])>=30){
                                                    $style = 'tolongservice';
                                                }else{
                                                    $style = '';
                                                }

                                                ?>

                                                    <div id="<?php echo $servvalue['id']; ?>">
                                                        <figure>
                                                            <i class="<?php echo $servvalue['icono']; ?>"></i>
                                                        </figure>
                                                        <div>
                                                            <div class="col-4">
                                                                <h3 class="<?php echo $style; ?>"><?php echo $servvalue['titulo']; ?><span class="collapse-icon" data-target="#text-colapse<?php echo $servkey; ?>" data-hidden="0"></span></h3>
                                                            </div>

                                                            <div class="col-8 fullcolapse" id="text-colapse<?php echo $servkey; ?>">
                                                                <p><?php echo $servvalue['descripcion']; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php


                                            }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </section>


                    <?php



                }elseif(get_sub_field('tipo_de_bloque')=='horizontales'){



                    ?>
                        <section class="background-slider horizontal-coolelements">
                            <div class="container">

                                <?php

                                    $rows = array_chunk(get_sub_field('seccion'), 4);


                                    foreach ($rows as $rkey => $services) {

                                        echo '<div class="row">';

                                        foreach ($services as $servkey => $servvalue) {

                                            ?>

                                                <div id="<?php echo $servvalue['id']; ?>" class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                    <div>
                                                        <figure>
                                                            <i class="<?php echo $servvalue['icono']; ?>"></i>
                                                        </figure>
                                                        <div>
                                                            <h4><?php echo $servvalue['titulo']; ?></h4>
                                                            <p><?php echo $servvalue['descripcion']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                        }

                                        echo '</div>';
                                    }

                                ?>
                            </div>
                        </section>

                    <?php
                        

                }else{

                }


            endwhile;

        else :

            // no rows found

        endif;

    ?>


<?php   endwhile; 

    else : ?>

        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php   
    
    endif;
        
        get_footer(); ?>