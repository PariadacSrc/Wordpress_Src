<?php  /* Template Name: Lista de Noticias*/  global $wp, $post; ?>
<?php  
	$custom_post_key = UER_PRFX.'news'; 
	$custom_template = 'content_generic';
?>

<?php /*Goza Theme Config*/ $_FW = defined( 'FW' );
	get_header();
	goza_title_bar();
?>

	<section class="tecb-generic-internal-pages">
 		<div class="container">
 			<div class="tecb-flex-container flex-all-top">

 				<div class="tcb-flex-col-100">
 					<div class="tecb-page-principal-content">
 						<?php include( locate_template( 'page_templates/complements/landing_search.php', false, false ) ); ?>
 					</div>
 				</div>
 				
 			</div>
 		</div>
 	</section>

<?php get_footer(); ?>
