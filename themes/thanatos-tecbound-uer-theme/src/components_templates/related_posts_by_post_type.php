<?php global $post;

	$r_query= new WP_Query(array(
		'post_type' => $atts['post_type'],
        'orderby'   => 'date',
        'posts_per_page' => 5,
        'post__not_in' => array($atts['post_id'])
	)); 

?>

<?php if($r_query->have_posts()): ?>
	<section class="uer-realated-posts"><!--Start Main Section-->

		<div class="tecb-flex-container">
			<div class="tcb-flex-col-100">
				
				<h4>Te puede interesar...</h4>

				<?php while ( $r_query->have_posts() ) : $r_query->the_post(); ?>
	
					<?php 
						$featuredPicture = get_the_post_thumbnail_url( $post->ID, 'full' ); 
						$post_p_date = 	date_i18n('F d, Y',strtotime($post->post_date_gmt));
					?>
					<div class="uer-ralated-container">
						<div class="uer-img-container">
							<img src="<?php echo $featuredPicture; ?>" alt="Related Picture">
						</div>
						<div>
							<h3><?php echo $post->post_title; ?></h3>
							<div class="tecb-flex-container tecb-flex-space">
								<span class="tecb-date-label"><?php echo $post_p_date; ?></span>
								<div class="uer-standar-btn"> 
									<a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-grey" href="<?php echo get_permalink($post->ID); ?>"><?php _e('Read More',UER_TXT_DOMAIN); ?></a>
								</div>
							</div>
						</div>
					</div>

				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>

	</section><!--End Main Section-->
<?php endif; ?>