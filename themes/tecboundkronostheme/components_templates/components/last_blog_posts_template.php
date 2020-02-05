<div class="tecb-lastest-post-miniblock">
	<div class="tecb-mini-titles">
        
        <?php _e('<h3>Latest <strong>Publications</strong></h3>',TCB_KRONOS_TXT_DOMAIN); ?>

	</div>	
	
		
	<?php

        $args = array(
            'post_type' => 'post',
            'orderby'   => 'date',
            'posts_per_page' => 1
        );
        $query = new WP_Query( $args );


        if ( $query->have_posts() ) {
            
            while ( $query->have_posts() ) {
                $query->the_post();
                $post = get_post();

                $featuredPicture = get_the_post_thumbnail_url( $post->ID, 'full' );
                
                ?>
                    <div class="tecb-flex-container tecb-flex-space">
                        <div class="tcb-flex-col-100 tcol-include-margin">
							<a href="<?php echo get_permalink($post->ID); ?>">
                                <div class="tecb-minipost-block" style="background-image: url('<?php echo $featuredPicture; ?>')">
                                    <div>
                                        <h2><?php echo $post->post_title; ?></h2>
                                    </div>
                                </div>                     
                            </a>
						</div>
                    </div>
                <?php

            }
            
            wp_reset_postdata();
            $post = get_post();
        }

    ?>


</div>