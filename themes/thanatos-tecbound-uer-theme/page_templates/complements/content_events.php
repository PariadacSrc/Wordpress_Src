<?php
	if(class_exists('ACF')){
		if (count(get_field('link_de_redireccion',$post->ID))>1) {
			$post_p_uri = get_field('link_de_redireccion',$post->ID)['url'];
		}
	}
?>
<div class="tecb-post-short-content uer-event-s-content">
	<div>
		<div style="background-image: url('<?php echo $post_p_image; ?>')"></div>
		<div>
			<div>
				<h2><?php echo $post_p_title; ?></h2>
				<span class="tecb-date-label"><?php echo $post_p_date; ?></span>
				<p><?php echo $post_p_data; ?></p>
				<div class="uer-standar-btn">
					<a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-grey" href="<?php echo $post_p_uri; ?>"><?php _e('Read More',UER_TXT_DOMAIN); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>

