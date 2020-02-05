<section class="tecb-regular-area <?php echo ($atts['content_type']==='carousel')?'tecb-testimonials-area':''; ?>">
    <div>
        <?php if(strlen(trim($atts['title']))>0): ?>
            <div class="tecb-generic-titles">
                <h3><?php echo do_shortcode($atts['title']); ?></h3>
            </div>
        <?php endif; ?>
        
        <?php if($atts['content_type']==='carousel'): ?>

            <div class="tecb-carrousel-container">
                <div class="tecb-main-testimonial-carousel" data-showitems="3">
        <?php else: ?>

            <div class="tecb-flex-container flex-all-top">
                <div class="tcb-flex-col-100 tecb-testimonial-full-block">

        <?php endif; ?>

                <?php

                    $args = array(
                        'post_type' => 'testimonials',
                        'orderby'   => 'date',
                        'posts_per_page' => -1
                    );
                    $query = new WP_Query( $args );


                    if ( $query->have_posts() ) {
                        
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            $post = get_post();

                            $fields = get_fields($post->ID);
                            
                            ?>


                                <div class="tecb-testimonial-block">
                                    <div>
                                        <div>
                                            <h4>
                                                <?php echo do_shortcode($fields['title']); ?>
                                            </h4>
                                        </div>
                                        <div>
                                            <div>

                                                <?php if($atts['content_type']==='carousel'): ?>
                                                    <?php echo do_shortcode($fields['resumen']); ?>
                                                    <p><i class="fas fa-ellipsis-h"></i></p>
                                                <?php else: ?>
                                                    <?php echo do_shortcode($fields['full_content']); ?>
                                                <?php endif; ?>
                                            </div>
                                            <div>
                                                <div>
                                                    <ul>
                                                        <li>
                                                            <h5><?php echo do_shortcode($fields['user']); ?></h5>
                                                        </li>
                                                        <li><span><?php echo do_shortcode($fields['job']); ?></span></li>
                                                        <li><span><?php echo do_shortcode($fields['enterprise']); ?></span></li>
                                                    </ul>
                                                </div>

                                                <?php if($atts['content_type']==='carousel'): ?>
                                                    <div class="tecb-btn-container">
                                                        <?php  $deflink= ($atts['default_link'])? get_permalink($post->ID):$atts['link']; ?>

                                                        <a href="<?php echo $deflink; ?>" class="tecb-general-btn">
                                                            <?php if(get_locale()==='en_US'): ?>
                                                                Learn more
                                                            <?php else: ?>
                                                                Ver más
                                                            <?php endif; ?>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
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