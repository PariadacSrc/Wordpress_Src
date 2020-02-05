<?php //Setting Main Query Arguments

	$search = $_GET['search'] ? (strlen(trim($_GET['search']))>0?$_GET['search']:'') : '';
    if ( !$current_page = get_query_var('paged') ) $current_page = 1;

    //WP_Query Arguments
    $args = array(
        'post_type' => $custom_post_key,
        'orderby'   => 'date',
        'posts_per_page' => ($custom_post_number)?$custom_post_number:12,
        's' => $search,
        'paged' => $current_page
    );

    //Main WP_Query
    $query = new WP_Query( $args );

?>


<section class="tecb-regular-area tecb-post-list-area">
	<div class="container">
		<!--Paginator-->

		<div class="tecb-flex-container tecb-flex-space">

			<div class="tcb-flex-col-70">
				<div class="tecb-left-paginator">
					<?php include( locate_template( 'src/templates/components/paginator.php', false, false ) ); ?>
				</div>
			</div>

			<div class="tcb-flex-col-30">
				<?php echo do_shortcode('[post_search_generic]'); ?>
			</div>
			
		</div>
			
		<!--Main Content-->
		<div class="uer-ps-types-container uer-ps-<?php echo $custom_post_key; ?>">
			<div>
				<?php

			    	if ( $query->have_posts() ):
			            
			            while ( $query->have_posts() ): $query->the_post();
			                
			            	//Post variables
			            	$post_p_uri = get_permalink($post->ID);
			            	$post_p_image = get_the_post_thumbnail_url( $post->ID, 'full' );
			            	$post_p_title = $post->post_title;
			            	$post_p_date = 	date_i18n('F d, Y',strtotime($post->post_date_gmt));
			            	$post_p_data = (class_exists('ACF'))? get_field('resumen',$post->ID):'';

			                ?>

								<?php include( locate_template( 'page_templates/complements/'.$custom_template.'.php', false, false ) ); ?>

			                <?php

			            endwhile; wp_reset_postdata();
			        else:
			        	?>
							<div class="tecb-msg-label tecb-not-found">
								<span><i></i> <?php _e('Sorry, we did not find any results, try again later...'); ?></span>
							</div>
			        	<?php
			        endif;

			    ?>
			</div>
		</div>
		<!--Paginator-->
	    <?php include( locate_template( 'src/templates/components/paginator.php', false, false ) ); ?>

	</div>
</section>