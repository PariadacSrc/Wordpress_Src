<?php
/**
 * The default template for displaying post navigation
 */
 $prevPost = get_previous_post();
 $nextPost = get_next_post();
$goza_enable_post_navigation  = defined( 'FW' ) ? fw_get_db_customizer_option( 'posts_settings/posts_single/post_navigation', 'yes' ) : 'yes';
if( $goza_enable_post_navigation != 'yes') return;
?>

<div class="row">
  <div class="col-md-12">
    <div class="single-blog-post-navigation">
      <?php if($prevPost || $nextPost) : ?>
					<div class="previous-next-link">
						<?php if($prevPost) { ?>
							<div class="previous">
								<?php $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(60,60) ); ?>
                <?php $prevdate = get_the_date('d M, Y',$prevPost->ID ); ?>
								<?php previous_post_link('%link','<div class="btp-nav-thum">'. $prevthumbnail . '</div><div class="bt-title-nav"><div class="title">%title</div><div class="date-nav">'.$prevdate.'</div></div>'); ?>
							</div>
						<?php } if($nextPost) { ?>
							<div class="next">
								<?php $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(60,60) ); ?>
                <?php $nextdate = get_the_date('d M, Y',$nextPost->ID ); ?>
								<?php next_post_link('%link','<div class="bt-title-nav"><div class="title">%title</div><div class="date-nav">'.$nextdate.'</div></div><div class="btp-nav-thum">'. $nextthumbnail .'</div>'); ?>
							</div>
						<?php } ?>
					</div>
			<?php endif; ?>
    </div>
  </div>
</div>
