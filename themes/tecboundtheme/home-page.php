<?php /*Template Name: Home Page*/
    get_header(); 
    
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
    
?>

    
    <!-- start banner Area -->

    <?php $image = get_field('imagen_de_fondo'); ?>

    <?php if( !empty($image) ): ?>

        <section class="banner-area relative general-banner homebanner" id="home" style="background-image: url('<?php echo $image['url']; ?>')">

    <?php else: ?>
        <section class="banner-area relative general-banner homebanner" id="home">
    <?php endif; ?>

        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-right">
                <div class="banner-content col-lg-8 Two-title">
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


                if (get_sub_field('tipo_de_bloque')=='icon') {
                    

                    if( !empty(get_sub_field('icono')) ):

                        $size = count(get_sub_field('icono'))/2;
                        $columnas = array_chunk(get_sub_field('icono'),ceil($size));

                        ?>

                        <section class="vertical-globarea home-area">
                            <div class="container">
                                <div class="row">


                                    <?php

                                        foreach ($columnas as $colkey => $colvalue):

                                            echo '<div class="col-lg-6 col-sm-6 col-12">';
                                            
                                            foreach ($colvalue as $truecolkey => $truecolvalue) {
                                                
                                                ?>

                                                    
                                                    <div>
                                                        <figure>
                                                            <i class="<?php echo $truecolvalue["icono_figura"]?>"></i>
                                                        </figure>
                                                        <div>
                                                            <h3><?php echo $truecolvalue['url']['title']; ?></h3>

                                                            <a href="<?php echo $truecolvalue['url']['url']; ?>"><i class="tecbound-coolarrow"></i><span>Learn more</span></a>
                                                        </div>
                                                    </div>
                                                    

                                                <?php

                                            }

                                            echo '</div>';  

                                        endforeach;

                                    ?>

                                </div>
                            </div>
                        </section>

                        <?php



                    endif;

                }elseif(get_sub_field('tipo_de_bloque')=='blog'){


                    $link = get_sub_field('url_enlace_de_redireccion');
                    


                    ?>


                        <section class="post-globarea background-slider">
        
                            <div class="container">
                                
                                <div class="col-lg-12 col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="headertitle center-text">Latest Blog Post</h3>
                                        </div>


                                        <?php


                                            $args = array(
                                                'post_type' => 'post',
                                                'orderby'   => 'date',
                                                'posts_per_page' => get_sub_field('numero_de_publicaciones_a_mostrar')
                                            );
                                            $query = new WP_Query( $args );


                                            if ( $query->have_posts() ) {
                                                
                                                while ( $query->have_posts() ) {
                                                    $query->the_post();
                                                    
                                                    ?>


                                                         <div class="blog-tip post-item col-lg-4 col-sm-6 col-12">
                                                            <div>
                                                                <img src="<?php echo get_field('imagen_miniatura',$post->ID)['url']; ?>">
                                                            </div>
                                                            <div class="post-item">
                                                                <h2><?php echo $post->post_title; ?></h2>
                                                                
                                                                <?php echo get_field('resumen',$post->ID); ?>

                                                                <a href="<?php echo get_permalink($post->ID); ?>"><span>Read Post</span><i class="tecbound-poitarrow"></i></a>
                                                            </div>
                                                        </div>


                                                    <?php


                                                }
                                                wp_reset_postdata();
                                            } else {
                                                
                                            }


                                        ?>


                                       



                                        <div class="col-12 middle-link">

                                            <?php

                                                if( $link ){
                                                    $link_url = $link['url'];
                                                    $link_title = $link['title'];
                                                    $link_target = $link['target'] ? $link['target'] : '_self';

                                                    echo '<a href="'.esc_url($link_url).'" target="'.esc_attr($link_target).'"><i class="tecbound-coolarrow"></i><span>'.esc_html($link_title).'</span></a>';
                                                }

                                            ?>

                                            
                                        </div>
                                    </div>
                                </div>

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

    <!-- START SLIDER INDEX -->
    <section class="background-slider" style="display: none;">  
        <div class="container"> 
            
            <div class="col-12">
                <h3 class="centertitle">What people are saying about Tecbound <br><span>Our customers success stories</span></h3>
            </div>

            <div class="carrousel-index">
                <div class="home-carrousel-container">
                    <div class="row left-space">
                        <div class="col-lg-2 ">
                            <img src="assets/img/testimonials_mini.png">
                        </div>
                        <div class="col-lg-10">
                            <p class="testimonials">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <p class="author">-Author</p>
                        </div>
                    </div>      
                </div>

                <div class="home-carrousel-container">
                    <div class="row left-space">
                        <div class="col-lg-2 ">
                            <img src="assets/img/testimonials_mini.png">
                        </div>
                        <div class="col-lg-10">
                            <p class="testimonials">Today, a lot of businesses and companies are deciding to take their email system to cloud based services. This is being done because constant access to emails even when you are not in the workplace has become a requirement now. With services such as Microsoft Outlook or Exchange, you get bound to your work space to send/receive emails.</p>
                            <p class="author">-Author</p>
                        </div>
                        
                    </div>      
                </div>

                <div class="home-carrousel-container">
                    <div class="row left-space">
                        <div class="col-lg-2 ">
                            <img src="assets/img/testimonials_mini.png">
                        </div>
                        <div class="col-lg-10">
                            <p class="testimonials">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <p class="author">-Author</p>
                        </div>
                        
                    </div>      
                </div>
                        
            </div>
        </div>
    </section>
    <!-- END SLIDER INDEX -->

    

<?php   endwhile; 

    else : ?>

        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php   
    
    endif;
        
get_footer(); ?>