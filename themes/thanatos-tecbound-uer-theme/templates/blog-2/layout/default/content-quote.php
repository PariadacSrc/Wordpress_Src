<?php
global $post;

$goza_post_options = goza_listing_post_media($post->ID);
// echo '<pre>'; print_r($goza_post_options); echo '</pre>';

$image_background_elem = '';
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  $style_inline = "background: url(". get_the_post_thumbnail_url($post->ID, $goza_post_options['image_size']) .") no-repeat center center / cover;";
  $image_background_elem = "<div class='post-quote-image-background' style='{$style_inline}'></div>";
}
?>

<div class="post-header-quote-wrap">
  <?php echo wp_kses( $image_background_elem, array(  'div' => array( 'class' => array(), 'style' => array() ) ) ); ?>
  <?php echo (isset($goza_post_options['quote']) && ! empty($goza_post_options['quote'])) ? $goza_post_options['quote'] : ''; ?>
</div>

<!-- entry -->
<div class="post-entry-wrap">

  <!-- Cat & tag -->
  <div class="cat-meta">
    <?php echo ! empty( $goza_post_options['category_list'] ) ? '<div class="post-category">' . $goza_post_options['category_list'] . '</div>' : ''; ?>
  </div>

  <!-- title -->
  <?php echo "{$goza_post_options['title_link']}"; ?>

  <div class="extra-meta">
    <!-- post date -->
    <div class="post-date" title="<?php _e('Date', 'goza'); ?>">
      <?php echo "{$goza_post_options['date']}"; ?>
    </div>

    <!-- post author -->
    <div class="post-author" title="<?php _e('Author', 'goza'); ?>">
      <span><?php echo esc_html__('By ', 'goza') ?></span>
      <?php echo "{$goza_post_options['author_link']}"; ?>
    </div>

    <!-- post comment -->
    <div class="post-total-comment" title="<?php _e('Comment', 'goza'); ?>">
      <i class="fa fa-comment" aria-hidden="true"></i>
      <?php echo "{$goza_post_options['comments']}"; ?>
      <?php // echo ((int) $goza_post_options['comments'] <= 1) ? esc_html__('Comment', 'goza') : esc_html__('Comments', 'goza')  ?>
    </div>

    <!-- post view -->
    <div class="post-total-view" title="<?php _e('View', 'goza'); ?>">
      <i class="fa fa-eye" aria-hidden="true"></i>
      <?php echo "{$goza_post_options['views']}"; ?>
      <?php // echo ((int) $goza_post_options['views'] <= 1) ? esc_html__('View', 'goza') : esc_html__('Views', 'goza')  ?>
    </div>
  </div>

  <?php echo "{$goza_post_options['readmore']}"; ?>
</div>
