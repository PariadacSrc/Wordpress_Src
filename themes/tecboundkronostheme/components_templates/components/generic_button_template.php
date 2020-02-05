<a 	href="<?php echo $atts['url']; ?>" 
	target="<?php echo $atts['target']; ?>"  
	<?php if ($atts['form_short_code']): ?> 
		data-shortcode="<?php echo $atts['form_short_code']; ?>"
		onclick="defaultModal(event)"
	<?php endif; ?>
	class="tecb-general-btn <?php echo $atts['class']; ?> ">
		<?php echo $atts['content']; ?>
</a>