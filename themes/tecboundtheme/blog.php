<?php /*Template Name: Blog*/
    get_header(); 
    
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
    
?>

    <!-- start banner Area -->

    <?php $image = get_field('imagen_de_fondo'); ?>

    <?php if( !empty($image) ): ?>

        <section class="banner-area relative general-banner blogbanner" id="home" style="background-image: url('<?php echo $image['url']; ?>')">

    <?php else: ?>
        <section class="banner-area relative general-banner blogbanner" id="home">
    <?php endif; ?>

        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-right">
                <div class="banner-content col-lg-8 One-title-large">
                    <div>
                        <h1 class="text-white"><span><?php echo get_field("subtitulo_del_banner_principal"); ?></span>
                            <?php echo get_field("titulo_principal_del_banner"); ?></h1>
                        <p class="pt-20 pb-20 text-white"><?php echo get_field("descripcion_del_banner"); ?>
                        </p>
                        <?php
                            $link = get_field('url_principal');
                            if( $link ){
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                echo '<a href="'.esc_url($link_url).'" target="'.esc_attr($link_target).'" class=""><i class="tecbound-coolarrow"></i> <span>'.esc_html($link_title).'</span></a>';
                            }

                        ?>
                        
                    </div>
                </div>                                          
            </div>
            <div class="cutearrow">
                <i class="tecbound-chevron-down"></i>
            </div>
        </div>                  
    </section>
    <!-- End banner Area -->




    <section class="post-globarea blog-tip">
        
        <div class="container">
            
            <div class="col-lg-12 col-12">

            	<div class="row justify-content-end">
            		<div class="search">
	            		<form method="GET" action="<?php echo get_permalink(); ?>">

							<div class="input-group">
							  <input type="text" name="search" class="form-control" placeholder="Search on the blog..." aria-label="Recipient's username" aria-describedby="button-addon2">
							  <div class="input-group-append">
							    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
							  </div>
							</div>

	            		</form>
	            	</div>
            	</div>

                <div class="row">


                    <?php
                    	$search = $_GET['search'] ? $_GET['search'] : '';

                        if ( !$current_page = get_query_var('paged') )
                                  $current_page = 1;


                        $args = array(
                            'post_type' => 'post',
                            'orderby'   => 'date',
                            'posts_per_page' => 6,
                            '_meta_or_title' => $search,
                            'paged' => $current_page

                        );


                        if(isset($_GET['search'])){
                        	$args['meta_query'] = array(
                            	array(
                            		'key' => 'bloque_$_parrafo',
                            		'value' => $search,
                            		'compare' => 'LIKE'
                            	)
                            );
                        }

                        $query = new WP_Query( $args );

                        if ( $query->have_posts() ) {
                            
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                
                                ?>

                                    <div class="blog-tip post-item col-lg-4 col-sm-6 col-12">
                                        <div>
                                            <img src="<?php echo get_field('imagen_miniatura',$post->ID)['url']; ?>">
                                        </div>
                                        <div class="post-item">
                                            <h2><?php echo $post->post_title; ?></h2>
                                            
                                            <?php echo get_field('resumen',$post->ID); ?>

                                            <a href="<?php echo get_permalink($post->ID); ?>"><span>Read Post</span><i class="tecbound-poitarrow"></i></a>
                                        </div>
                                    </div>


                                <?php


                            }
                            wp_reset_postdata();
                        } else {
                            
                        }


                    ?>

                </div>

                <div class="paginator">

                    <style type="text/css" media="screen">
                        
                    	.search{
                    		width: 33.33%;
    						float: right;
    						
                    	}

                    	.search> form{
                    		width: 100%;
						    padding: 0px 15px;
						    
                    	}

                    	.search button, .search input{
                    		font-size: 12pt;
    						font-weight: 600;
                    	}

                    	.search button{
                    		color: rgb(146, 184, 69);
                    		border-color: rgb(146, 184, 69);
                    	}

                    	.search button:hover{
                    		color: #fff;
                    		background-color: rgb(146, 184, 69);
                    		border-color: rgb(146, 184, 69);
                    	}

                        .paginator{
                            position: relative;
                            width: 100%;
                        }

                        ul.page-numbers {
                            display: table;
                            padding-left: 0;
                            list-style: none;
                            border-radius: .25rem;
                            margin: auto;
                        }

                        .page-numbers>li {
                            display: table-cell;
                        }

                        span.page-numbers.current, a.page-numbers {
                            position: relative;
                            display: block;
                            padding: .5rem .85rem;
                            margin-left: -1px;
                            line-height: 1.25;
                            color: rgb(146, 184, 69);
                            background-color: #fff;
                            border: 1px solid rgb(146, 184, 69);
                            font-size: 12pt;
                            font-weight: 600;
                        }

                        span.page-numbers.current, a.page-numbers:hover{
                            background-color: rgb(146, 184, 69);
                            color: #fff;
                        }

                    </style>
                    
                    <?php

                        $total = $query->max_num_pages;
                        // solo seguimos con el resto si tenemos más de una página
                        if ( $total > 1 )  {

                        	$searchurl = $_GET['search'] ? '?search='.$_GET['search'] : '';

                             // la estructura de “format” depende de si usamos enlaces permanentes "humanos"
                             $format = empty( get_option('permalink_structure') ) ? '&page=%#%' : 'page/%#%/';
                             echo paginate_links(array(
                                  'base' => get_permalink() . '%_%'.$searchurl,
                                  'format' => $format,
                                  'current' => $current_page,
                                  'prev_next' => True,
                                  'prev_text' => __('&laquo; Anterior'),
                                  'next_text' => __('Siguiente &raquo;'),
                                  'total' => $total,
                                  'mid_size' => 4,
                                  'type' => 'list'
                             ));
                        }

                    ?>

                </div>
            </div>

            <!--<div class="col-lg-4 col-12 col-md-6">
                
            </div>-->

        </div>
    </section>



<?php   endwhile; 

    else : ?>

        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php   
    
    endif;
        
        get_footer(); ?>