<?php
/**
 * The Template for displaying all single posts
 */
	get_header();
	goza_title_bar();
	$goza_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';
	$goza_general_posts_options = goza_general_posts_options();
?>
	<?php if(have_posts()): ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<section class="bt-main-row bt-section-space <?php goza_get_content_class( 'main', $goza_sidebar_position ); ?>" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
				<div class="container">

					<div class="tecb-flex-container tecb-flex-space flex-all-top">
						
						<div class="tcb-flex-col-80">
							<div class="row">

								<div class="bt-content-area <?php goza_get_content_class( 'content', $goza_sidebar_position ); ?>">
									<div class="bt-col-inner">
											<?php	
												get_template_part( 
													'templates/'.$goza_general_posts_options['blog_type'].'/single/content',
													get_post_format()
												);
											?>
									</div><!-- /.bt-col-inner -->
								</div><!-- /.bt-content-area -->

							</div><!-- /.row -->
						</div>
						<div class="tcb-flex-col-20">
							<?php do_action('uer_related_posts_by_type',$post->post_type,$post->ID); ?>
						</div>
						
					</div>


				</div><!-- /.container -->
			</section>

		<?php endwhile; wp_reset_postdata(); ?>

	<?php endif; ?>
	
<?php get_footer(); ?>
