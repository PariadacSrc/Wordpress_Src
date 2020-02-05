<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

global $post;
$goza_post_options = goza_listing_post_media($post->ID);
// print_r( $goza_post_options );

$article_classes = array(
	'post',
	'clearfix',
	'post-list-type-' . basename(__DIR__),
	'grid-item' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( implode(' ', $article_classes) ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<div class="post-inner">
		<!-- Featured image -->
		<?php if(!empty($goza_post_options['featured_image'])) { ?>
			<div class="post-featured-image-wrap">
				<a href="<?php the_permalink(); ?>" class="post-featured-image-link">
					<?php echo "{$goza_post_options['featured_image']}"; ?>
				</a>
			</div>
		<?php } ?>

		<!-- entry wrap -->
		<div class="entry-wrap">
			<div class="extra-meta">
				<!-- post date -->
				<div class="post-date" title="<?php _e('Date', 'goza'); ?>">
					<?php echo "{$goza_post_options['date']}"; ?>
				</div>
			</div>
			<!-- title -->
			<?php echo "{$goza_post_options['title_link']}"; ?>

			<?php
			the_excerpt();
			// the_content();
			?>
			<div class="post-author" title="<?php _e('Post by', 'goza'); ?>"><span class="edu-meta-top">Posted By:</span><span class="edu-meta-bot"> <?php echo "{$goza_post_options['author']}"; ?></span></div>
			<?php // echo "{$goza_post_options['readmore']}"; ?>
		</div>
	</div>
</article>
