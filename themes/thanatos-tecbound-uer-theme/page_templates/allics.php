<?php  /* Template Name: Lista de Alianzas*/  global $wp, $post; ?>
<?php  
	$custom_post_key = UER_PRFX.'allics'; 
	$custom_template = 'content_generic';
	$custom_post_number = 5;
?>

<?php /*Goza Theme Config*/ $_FW = defined( 'FW' );
	get_header();
	goza_title_bar();
?>

	<?php
        //Reference the main block Loop
        if(have_posts()):
            while ( have_posts() ): the_post();

                
            	?>
					
					<section class="tecb-generic-internal-pages">
				 		<div class="container">

				 			<div class="tecb-flex-container flex-all-top">
				 				<div class="tcb-flex-col-100">
				 					<?php the_content(); ?>
				 				</div>
				 			</div>

				 			<div class="tecb-flex-container flex-all-top">
				 				<div class="tcb-flex-col-100">
				 					<div class="tecb-page-principal-content">
				 						<?php include( locate_template( 'page_templates/complements/landing_search.php', false, false ) ); ?>
				 					</div>
				 				</div>
				 			</div>

				 		</div>
				 	</section>

            	<?php

            endwhile;
            wp_reset_postdata();
        endif;

    ?>


<?php get_footer(); ?>
