<section class="tecb-regular-area">
    <div class="container">
        <?php if(strlen(trim($atts['title']))>0): ?>
            <div class="tecb-generic-titles">
                <h3><?php echo do_shortcode($atts['title']); ?></h3>
            </div>
        <?php endif; ?>
        <div>
            <div class="tecb-brands-mosaic">
                <?php

                    $args = array(
                        'post_type' => 'tecb_partners',
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

                                <div class="tecb-partner-block" style="background-image: url('<?php echo $fields['picture']['url']; ?>')">

                                    <?php if($fields['use_link']): ?>
                                        <a  href="<?php  echo ($fields['default_link'])? get_permalink($post->ID): $fields['link']['url']; ?>"  
                                            target="<?php  echo ($fields['default_link'])? '_self': $fields['link']['target']; ?>">
                                                
                                        </a>
                                    <?php endif; ?>
                                    
                                </div>

                            <?php


                        }
                        wp_reset_postdata();
                        $post = get_post();
                    }

                ?>
            </div>
        </div>
    </div>
</section>