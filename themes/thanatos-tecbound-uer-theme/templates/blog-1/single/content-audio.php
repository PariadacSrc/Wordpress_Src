<?php
$TBFW = defined( 'FW' );
$goza_post_options = goza_single_post_options( $post->ID );
$goza_related_articles_type = ! empty( $TBFW ) ? fw_get_db_settings_option( 'posts_settings/related_articles/yes/related_type', 'related-articles-1' ) : 'related-articles-1';
$goza_is_builder = goza_fw_ext_page_builder_is_builder_post($post->ID);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post post-details" ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<div class="fw-col-inner">
		<div class="entry-content clearfix <?php echo esc_attr(($goza_is_builder == true)? 'fw-row' : ''); ?>" itemprop="text">
			<div class="single-entry-header"> <!-- Start .single-entry-header -->
				<!-- post Title -->
				<h2 class="post-title"><?php the_title(); ?></h2>
				<!-- Post Author - Date - Category -->
				<div class="extra-meta">
					<?php // echo '<pre>'; print_r($goza_post_options); echo '</pre>'; ?>
					<div class="post-author" title="<?php _e('Post by', 'goza'); ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo "{$goza_post_options['author']}"; ?></div>
					<div class="post-date" title="<?php _e('Post date', 'goza'); ?>"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i> <?php echo "{$goza_post_options['date']}"; ?></div>
					<?php
					if(isset($goza_post_options['category_list']) && ! empty($goza_post_options['category_list'])) { ?>
					<div class="post-cat" title="<?php _e('Post in category', 'goza'); ?>"><i class="fa fa-folder" aria-hidden="true"></i> <?php echo "{$goza_post_options['category_list']}"; ?></div>
					<?php } ?>
				</div>
        <!-- Post audio -->
    		<?php if(!empty($goza_post_options['audio'])) { ?>
    			<div class="post-block-audio-wrap" style="background: url(<?php echo esc_attr($goza_post_thumbnail_url); ?>) no-repeat center center / cover;">
    				<?php echo "{$goza_post_options['audio']}"; ?>
    			</div>
    		<?php } ?>
			</div> <!-- End .single-entry-header -->
			<?php
			/* content */
			the_content();

			/* tags */
			if(isset($goza_post_options['tag_list']) && ! empty($goza_post_options['tag_list'])) {
				echo "<div class='single-entry-tag'>". __('Tags: ', 'goza') . "{$goza_post_options['tag_list']}</div>";
			}

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'goza' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
		</div>
	</div>
</article>
<?php get_template_part( 'content', 'author' ); ?>
<?php get_template_part( 'post', 'navigation' ); ?>
<?php get_template_part( 'templates/related-articles/'.$goza_related_articles_type ); ?>
