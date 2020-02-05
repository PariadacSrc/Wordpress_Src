<?php  /* Template Name: Home Page */ get_header(); ?>


    <?php

        //Reference the main block Loop
        if(have_posts()):
            while ( have_posts() ): the_post();

                do_action('cast_page_template',$post);

            endwhile;
            wp_reset_postdata();
        endif;

    ?>

   

<?php get_footer(); ?>