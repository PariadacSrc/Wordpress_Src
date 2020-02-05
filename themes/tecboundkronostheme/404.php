<?php get_header(); ?>
    
    <?php

        ob_start();

            ?>
                
                <section class="tecb-not-found-area">
        
                    <div>
                        <h1>404</h1>
                    </div>
                    <div>
                        <p><?php _e('Something went wrong',TCB_KRONOS_TXT_DOMAIN) ?><a href="<?php echo home_url(); ?>" class=""><i class="tecbound-coolarrow"></i> <span><?php _e('Back to Home',TCB_KRONOS_TXT_DOMAIN) ?></span></a></p>
                    </div>

                </section>
            
            <?php

        $content_text = ob_get_contents();
        ob_end_clean();

        $background_img = get_stylesheet_directory_uri().'/assets/img/backgrounds/404.jpg';

    ?>

	<!--Banner Area-->
    <?php
        echo do_shortcode("[tecb_standar_banner banner_type='tecb-big-banner' content-text='".$content_text."' background-url='".$background_img."']");
    ?>

<?php get_footer(); ?>