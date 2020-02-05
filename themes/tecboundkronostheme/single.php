<?php get_header(); ?>

	<?php

        //Reference the main block Loop
        if(have_posts()):
            while ( have_posts() ): the_post();

                
            	switch ($post->post_type) {
            		case 'post':
            			
            			include( locate_template( 'layouts/post.php', false, false ) );

            			break;
            		
            		default:
            			include( locate_template( 'layouts/default_taxonomy.php', false, false ) );
            			break;
            	}


            endwhile;
            wp_reset_postdata();
        endif;

    ?>

<?php get_footer(); ?>