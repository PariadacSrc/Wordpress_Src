<?php
global $post;

$goza_post_options = goza_listing_post_media($post->ID);
// echo '<pre>'; print_r($goza_post_options); echo '</pre>';
?>
<!-- Featured image -->
<?php if(!empty($goza_post_options['featured_image'])) { ?>
  <!-- title -->
  <?php echo "{$goza_post_options['title_link']}"; ?>

  <div class="post-featured-image-wrap">
    <div class="post-featured-image-link">
      <?php echo "{$goza_post_options['featured_image']}"; ?>
    </div>
  </div>
<?php } ?>

<!-- entry -->
<div class="post-entry-wrap">

  <div class="extra-meta">
    <!-- post author -->
    <div class="post-author" title="<?php _e('Author', 'goza'); ?>">
      <span><i class="fa fa-user"></i><?php echo esc_html__('by ', 'goza') ?></span>
      <?php echo "{$goza_post_options['author_link']}"; ?>
    </div>

    <!-- post date -->
    <div class="post-date" title="<?php _e('Date', 'goza'); ?>">
      <span><i class="fa fa-calendar"></i><?php echo esc_html__('Posted on ', 'goza') ?></span>
      <?php echo "{$goza_post_options['date']}"; ?>
    </div>

    <!-- Cat & tag -->
    <div class="cat-meta">
      <span><i class="fa fa-folder"></i><?php echo esc_html__('in ', 'goza') ?></span>
      <?php echo ! empty( $goza_post_options['category_list'] ) ? '<div class="post-category">' . $goza_post_options['category_list'] . '</div>' : ''; ?>
    </div>
  </div>

  <?php the_excerpt(); ?>

  <?php echo "{$goza_post_options['readmore']}"; ?>
</div>
