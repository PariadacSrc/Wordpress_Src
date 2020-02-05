<section class="uer-content-single-desing">

	<?php 
		if($atts['orientation']=='left'): 
			include(locate_template( UER__DEFAULT_COMP_FOLDER.'complement_blocks/content_single_desing_img.php', false, false ));
			include(locate_template( UER__DEFAULT_COMP_FOLDER.'complement_blocks/content_single_desing_content.php', false, false ));
		else:
			include(locate_template( UER__DEFAULT_COMP_FOLDER.'complement_blocks/content_single_desing_content.php', false, false ));
			include(locate_template( UER__DEFAULT_COMP_FOLDER.'complement_blocks/content_single_desing_img.php', false, false ));
		endif;

	?>

</section>