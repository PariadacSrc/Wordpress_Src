<?php get_header(); ?>

	<?php

        //Reference the main block Loop
        if(have_posts()):
            while ( have_posts() ): the_post();

                do_action('cast_page_template',$post,array('print_area'=>'top_area'));

            endwhile;
            wp_reset_postdata();
        endif;

    ?>

 	<section class="tecb-generic-internal-pages">
 		<div class="container">
 			<div class="tecb-flex-container flex-all-top">
 				<div class="tcb-flex-col-70">
 					<div class="tecb-page-principal-content">
 						<?php

					        //Reference the main block Loop
					        if(have_posts()):
					            while ( have_posts() ): the_post();

					                do_action('cast_page_template',$post,array('print_area'=>'middle_area'));

					            endwhile;
					            wp_reset_postdata();
					        endif;

					    ?>
 					</div>
 				</div>
 				<div class="tcb-flex-col-30">
 					<div class="tecb-side-bar-content">
 						<?php get_sidebar(); ?>
 					</div>
 				</div>
 			</div>
 		</div>
 	</section>

 	<section class="tecb-generic-skip-area">
 		<?php

	        //Reference the main block Loop
	        if(have_posts()):
	            while ( have_posts() ): the_post();

	                do_action('cast_page_template',$post,array('print_area'=>'end_area'));

	            endwhile;
	            wp_reset_postdata();
	        endif;

	    ?>
 	</section>

<?php get_footer(); ?>