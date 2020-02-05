<div class="uer-generic-row uer-flex-container flex-all-top">
	<div class="uer-img-container uer-flex-col-30">
		<img src="<?php echo wp_get_attachment_url($atts['img']); ?>" alt="">
	</div>
	<div class="uer-flex-col-70">
		<div class="uer-standar-content">
			<?php echo do_shortcode($atts['content']); ?>
		</div>
		<div class="uer-standar-btn"> 
			<a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-grey" href="<?php echo $atts['url']; ?>"><?php _e('Read More',UER_TXT_DOMAIN); ?></a>
		</div>
	</div>
</div>