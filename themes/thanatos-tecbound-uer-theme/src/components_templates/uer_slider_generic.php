<?php

    $args = array(
        'post_type' => $atts['post_type'],
        'orderby'   => 'date',
        'posts_per_page' => 9
    );
    $query = new WP_Query( $args );

?>

<section class="uer-container-standar">				
	<div class="uer-slider-standar" data-showitems="<?php echo $atts['show_item']; ?>">

		<?php

		    if ( $query->have_posts() ) {
		        
		        while ( $query->have_posts() ) {
		            $query->the_post();
		            $post = get_post();

		            $featuredPicture = get_the_post_thumbnail_url( $post->ID, 'full' );
		            ob_start();

			            switch ($atts['post_type']) {
			            	case UER_PRFX.'allics':
			            		
								?>
									<p><strong>El Reto</strong><br><?php echo get_field('el_reto',$post->ID); ?></p>
									<p><strong>El Aliado</strong><br><?php echo get_field('el_aliado',$post->ID); ?></p>
									<p><strong>El Resultado</strong><br><?php echo get_field('el_resultado',$post->ID); ?></p>
								<?php

								$content = ob_get_contents();
								
			            		break;
			            	
			            	default:
			            		?><p><?php echo get_field('resumen',$post->ID); ?></p><?php

								$content = ob_get_contents();
			            		break;
			            }

		            ob_end_clean();
		            
		            ?>
		            	<div>
							<div class="uer-slide uer-flex-container uer-flex-space <?php echo 'uer-tmp-'.$atts['main_template']; ?>">
								<div class="uer-flex-col-50 uer-img-container">
									<img src="<?php echo $featuredPicture; ?>">
								</div>
								<div class="uer-flex-col-50">
									<div>
										<h3><?php echo $post->post_title; ?></h3>
										<div class="u-main-content">
											<?php echo $content; ?>
										</div>
										<div class="uer-standar-btn"> 
											<a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-grey" href="<?php echo get_permalink($post->ID); ?>"><?php _e('Read More',UER_TXT_DOMAIN); ?></a>
										</div>
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
</section>