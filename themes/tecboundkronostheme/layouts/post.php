<?php get_header(); ?>


 	<section class="tecb-generic-internal-pages">
 		<div class="container">
 			<div class="tecb-flex-container flex-all-top">
 				<div class="tcb-flex-col-70">
 					<div class="tecb-page-principal-content">

 						<section class="tecb-regular-area">
    						<div class="container">

    							<div class="tecb-generic-titles">
					                <h2><?php echo $post->post_title; ?></h2>
					            </div>
					            <div class="tecb-flex-container flex-all-top">
					            	<div class="tcb-flex-col-100">
					            		<div class="tecb-featured-image" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID,'full'); ?>')"></div>
				 						<?php 

				 							if(class_exists('ACF')): 

												if( have_rows('middle_area',$post->ID) ):

													$rows = get_fields($post->ID)['middle_area']; 
													echo do_shortcode($rows['content']);
													
												endif;

											endif;

										?>
					            	</div>
					            </div>
					        </div>
					    </section>
 						
 					</div>
 				</div>
 				<div class="tcb-flex-col-30">
 					<div class="tecb-side-bar-content">
 						<?php get_sidebar(); ?>
 					</div>
 				</div>
 			</div>
 		</div>
 	</section>


<?php get_footer(); ?>