<?php
// $goza_general_posts_options = goza_general_posts_options();
$goza_enable_related_articles  = defined( 'FW' ) ? fw_get_db_customizer_option( 'post_settings/posts_single/related_articles', '' ) : array('selected' => 'yes');

if( $goza_enable_related_articles['selected'] != 'yes') return;

$goza_related_articles = goza_related_articles();

if ( ! empty( $goza_related_articles ) ) : ?>
	<div class="bt-wrap-related-article bt-<?php echo basename(__FILE__, '.php'); ?>">
		<div class="row">
			<div class="col-md-12">
				<h3 class="bt-title-related"><strong><?php esc_html_e( 'Related Articles', 'goza' ); ?></strong></h3>
			</div>
			<div class="related-article-list">
				<?php foreach ( $goza_related_articles as $item ) : // echo '<pre>'; print_r($item); echo '</pre>';
					$post_settings  = goza_get_settings_by_post_id($item->ID);
					$wrap_title				= isset($posts_general_settings['blog_title']['selected']) ? $posts_general_settings['blog_title']['selected'] : 'h2';
					$image_size				= 'goza-image-medium';// isset($post_settings['post_general_tab']['image_size']) ? $post_settings['post_general_tab']['image_size'] : 'medium-large' ;

					$post_data = array(
						'title_link' 			=> "<a href='". get_permalink($item->ID) ."' class='post-title-link'><{$wrap_title} class='post-title'>". $item->post_title ."</{$wrap_title}></a>",
						'featured_image' 	=> "<a href='". get_permalink($item->ID) ."' title='". $item->post_title ."'>" . goza_get_image(get_post_thumbnail_id($item->ID), array('size' => $image_size)) . "</a>",
						'trim_content'		=> wp_trim_words( (!empty($item->post_excerpt) ? $item->post_excerpt : $item->post_content), $num_words = 10, $more = '...' ),
					);
				?>
					<div class="col-md-4 col-sm-4">
						<div class="related-article-item">
							<?php echo "{$post_data['featured_image']}"; ?>
							<?php echo "{$post_data['title_link']}"; ?>
						</div>
					</div>
				<?php endforeach; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
<?php endif; ?>
