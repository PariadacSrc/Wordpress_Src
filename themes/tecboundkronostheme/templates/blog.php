<?php /* Template Name: Blog Page */ get_header(); global $wp; ?>

	<?php //Setting Main Query Arguments

		$search = $_GET['search'] ? (strlen(trim($_GET['search']))>0?$_GET['search']:'') : '';

	    if ( !$current_page = get_query_var('paged') ) $current_page = 1;

	    //WP_Query Arguments
	    $args = array(
	        'post_type' => 'post',
	        'orderby'   => 'date',
	        'posts_per_page' => TECB_POST_PER_PAGE,
	        '_meta_or_title' => $search,
	        'paged' => $current_page
	    );

	    //Argument ACF Metadata
	    if(strlen($search)>0){
	    	$args['meta_query'] = array(
	        	array(
	        		'key' => 'middle_area_content',
	        		'value' => $search,
	        		'compare' => 'LIKE'
	        	)
	        );
	    }

	    //Main WP_Query
	    $query = new WP_Query( $args );

	?>


	<!--Banner Area-->
	<?php
		echo do_shortcode('[tecb_standar_banner content-title="Blog"]');
	?>

	<section class="tecb-generic-internal-pages">
 		<div class="container">
 			<div class="tecb-flex-container flex-all-top">
 				<div class="tcb-flex-col-70">
 					<div class="tecb-page-principal-content">

 						

 						<section class="tecb-regular-area tecb-post-list-area">
 							<div class="container">
								<!--Paginator-->
 								<?php include( locate_template( 'templates/components/paginator.php', false, false ) ); ?>
 								
 								<!--Main Content-->
			                    <?php

			                    	if ( $query->have_posts() ):
			                            
			                            while ( $query->have_posts() ): $query->the_post();
			                                
			                            	//Post variables
			                            	$blog_p_uri = get_permalink($post->ID);
			                            	$blog_p_image = get_the_post_thumbnail_url( $post->ID, 'full' );
			                            	$blog_p_title = $post->post_title;
			                            	$blog_p_date = 	date_i18n('F d, Y',strtotime($post->post_date_gmt));
			                            	$blog_p_data = (class_exists('ACF'))?
			                            		get_fields($post->ID)['middle_area']:
			                            		array('resument'=>'');

			                                ?>

												<div class="tecb-post-short-content">
													<a href="<?php echo $blog_p_uri; ?>">
														<div style="background-image: url('<?php echo $blog_p_image; ?>')"></div>
														<div>
															<div>
																<h2><?php echo $blog_p_title; ?></h2>
																<span class="tecb-date-label"><?php echo $blog_p_date; ?></span>
																<p><?php echo $blog_p_data['resumen']; ?></p>
																<i class="fas fa-ellipsis-h"></i>
															</div>
														</div>
													</a>
												</div>

			                                <?php

			                            endwhile; wp_reset_postdata();
			                        else:
			                        	?>
											<div class="tecb-msg-label tcb-not-found">
												<span><i></i> <?php _e('Sorry, we did not find any results, try again later...',TCB_KRONOS_TXT_DOMAIN); ?></span>
											</div>
			                        	<?php
			                        endif;

			                    ?>

								<!--Paginator-->
			                    <?php include( locate_template( 'templates/components/paginator.php', false, false ) ); ?>

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