<?php get_header(); ?>

		
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		


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




		<section class="post-globarea">
			
			<div class="container">
				
				<div class="col-lg-12 col-12">

					<div class="row">
						
						<div class="col-12 single-post-cont">



							<h2><?php echo $post->post_title; ?></h2>


							<?php

				                // check if the repeater field has rows of data
				                if( have_rows('bloque') ):
				                    // loop through the rows of data
				                    while ( have_rows('bloque') ) : the_row();

				                    	if (get_sub_field('tipo_de_contenido')=='parrafo') {

					                        echo get_sub_field('parrafo');
					                    }else{
					                    	?>

					                    		<div class="caption-pic-cont">
													<img src="<?php echo get_sub_field('imagen')['url']; ?>">
													<h6><?php echo get_sub_field('subtitulo_de_la_imagen'); ?></h6>
												</div>

					                        <?php
					                    }
				                    endwhile;

					                
					            else :

				                    // no rows found

				                endif;

					            ?>

						</div>

					</div>

				</div>

				<!--<div class="col-lg-4 col-12">
					
				</div>-->

			</div>
		</section>


	<?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>


<?php get_footer(); ?>