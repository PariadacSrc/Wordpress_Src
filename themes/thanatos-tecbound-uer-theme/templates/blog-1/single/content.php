<?php
	$TBFW 						= defined( 'FW' );
	$goza_post_options 			= goza_single_post_options( $post->ID );
	$goza_related_articles_type = ! empty( $TBFW ) ? fw_get_db_settings_option( 'posts_settings/related_articles/yes/related_type', 'related-articles-1' ) : 'related-articles-1';
	$goza_is_builder 			= goza_fw_ext_page_builder_is_builder_post($post->ID);
	$author_id 					= $post->post_author;
	$author_bt 					= esc_url( get_avatar_url( $author_id , 32 ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "post post-details" ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

	<div class="fw-col-inner">
		<div class="entry-content clearfix <?php echo esc_attr(($goza_is_builder == true)? 'fw-row' : ''); ?>" itemprop="text">
			<!-- Start .single-entry-header -->
			<div class="single-entry-header"> 
				<!-- post featured image -->
				<?php if(isset($goza_post_options['featured_image'])) {
						echo sprintf('<div class="post-image">%s</div>', $goza_post_options['featured_image']);
				} ?>
				
				<!-- Post Author - Date - Category -->
				<div class="extra-meta">
					
					<!-- post Title -->
					<h2 class="post-title"><?php the_title(); ?></h2>

					<div class="post-date" title="<?php _e('Post date', 'goza'); ?>">
						
						<div>
							<span class="edu-meta-bot"> 
								<?php echo "{$goza_post_options['date']}"; ?>
								<i class="fa fa-calendar-minus-o" aria-hidden="true"></i> 
							</span>
						</div>
					</div>

				</div>
			</div> 
			<!-- End .single-entry-header -->
			<div class="uer-all-containers-full">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

</article>
