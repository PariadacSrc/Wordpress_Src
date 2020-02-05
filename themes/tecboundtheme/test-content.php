<?php /*Template Name: TEST CONTENT*/
    get_header(); 
    
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
    
?>

    <!-- start banner Area -->

    <?php $image = get_field('imagen_de_fondo'); ?>

    <?php if( !empty($image) ): ?>

        <section class="banner-area relative general-banner blogbanner" id="home" style="background-image: url('<?php echo $image['url']; ?>')">

    <?php else: ?>
        <section class="banner-area relative general-banner blogbanner" id="home">
    <?php endif; ?>

        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-right">
                <div class="banner-content col-lg-8 One-title-large">
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




    <section class="post-globarea blog-tip">
        
        <?php the_content(); ?>
    </section>



<?php   endwhile; 

    else : ?>

        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php   
    
    endif;
        
        get_footer(); ?>