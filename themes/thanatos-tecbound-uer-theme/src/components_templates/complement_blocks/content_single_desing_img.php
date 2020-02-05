<?php  if($atts['url']): ?>
	<div class="uer-content-mask single-desing-img" style="background-image: url('<?php echo wp_get_attachment_url($atts['img']); ?>');">
		<div>
			<div class="uer-standar-btn">
				<a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-grey" href="<?php echo $atts['url']; ?>"><?php _e('Read More',UER_TXT_DOMAIN); ?></a>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="single-desing-img" style="background-image: url('<?php echo wp_get_attachment_url($atts['img']); ?>');"></div>
<?php endif; ?>