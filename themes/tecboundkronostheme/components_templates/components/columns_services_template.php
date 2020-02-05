<section class="tecb-regular-area tecb-services-area">
    <div class="container">
        <div class="tecb-generic-titles">
            <h3><?php echo $atts['title']; ?></h3>
        </div>
        <div class="tecb-services-container">

            <?php

                $args = array(
                    'post_type' => 'tecb_services',
                    'meta_key'          => 'order_hierarchy',
                    'orderby'           => 'meta_value',
                    'order'             => 'DESC',
                    'posts_per_page' => -1
                );
                $query = new WP_Query( $args );


                if ( $query->have_posts() ) {
                    
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        $post = get_post();

                        $fields = get_fields($post->ID);
                        
                        ?>

                            <div class="tecb-service-block">
                                <a href="<?php echo get_permalink($post->ID); ?>"  target="_self"  >
                                    <div>
                                        <i class="<?php echo $fields['icon']; ?>"></i>
                                    </div>
                                    <div>
                                        <h3>
                                            <span><?php echo $fields['title_line_1']; ?></span>
                                            <span><?php echo $fields['title_line_2']; ?></span>
                                        </h3>
                                    </div>
                                </a>
                            </div>

                        <?php


                    }
                    wp_reset_postdata();
                    $post = get_post();
                }

            ?>

        </div>
    </div>
</section>