<?php /*Template Name: Main Home Page*/
    get_header(); 
    
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
    
?>

    
    <section class="main-banner">
        <div class="solarcontainer">
            <div class="maintext">
                <div>
                    <h2>open <span>inscriptions</span></h2>
                    <button>registration</button>
                </div>
            </div>
        </div>
        <div class="solarmask"></div>
    </section>
    
    <section class="main-content">
        <?php the_content(); ?>
    </section>

    

<?php   endwhile; 

    else : ?>

        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php   
    
    endif;
        
get_footer(); ?>