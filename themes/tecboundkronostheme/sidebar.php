<div class="tecb-primary-sidebar">

	<div>
		<?php switch (get_page_template_slug()) {
				case 'templates/blog.php':
					echo do_shortcode('[tecb_post_search]');
					break;
				
				default:
					# code...
					break;
			} 
		?>

		<?php
		
			switch (get_post_type()) {
				case 'tecb_services':
					dynamic_sidebar( 'tecb_services_sidebar' );
					break;
				
				default:
					# code...
					break;
			}

		?>


		<?php dynamic_sidebar( 'tecb_primary_sidebar' ); ?>
		
	</div>
</div>

<div class="tcb-collapse-side-btn" data-collapse="true">
	<div class="tcb-open-sidebar"><i class="fa fa-chevron-left"></i></div>
</div>