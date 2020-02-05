<?php /*Template Name: Privacity*/
    get_header(); 
    
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
    
?>

    
    <section class="post-globarea">
            
        <div class="container">
            
            <div class="col-lg-12 col-12">

                <div class="row">
                    '
                    <div class="col-12 single-post-cont" style="margin-top:30px;">

                        <style type="text/css">
                            .single-post-cont > h2{
                                font-size: 25px; 
                                margin-bottom:10px
                            }
                        </style>

                        <h2 style="text-align: center;"><?php echo $post->post_title; ?></h2>

                        <?php echo get_field("contenido"); ?>
                        
                    </div>

                </div>

            </div>

            <!--<div class="col-lg-4 col-12">
                
            </div>-->

        </div>
    </section>


<?php   endwhile; 

    else : ?>

        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php   
    
    endif;
        
        get_footer(); ?>