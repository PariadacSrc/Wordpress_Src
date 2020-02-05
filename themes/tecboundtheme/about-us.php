<?php /*Template Name: About-Us*/
    get_header(); 
    
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
    
?>


    <!-- start banner Area -->

    <?php $image = get_field('imagen_de_fondo'); ?>

    <?php if( !empty($image) ): ?>

        <section class="banner-area relative general-banner homebanner" id="home" style="background-image: url('<?php echo $image['url']; ?>')">

    <?php else: ?>
        <section class="banner-area relative general-banner homebanner" id="home">
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

    <section class="blank-space" style="padding: 30px"></section>
    <?php

        // check if the repeater field has rows of data
        if( have_rows('bloque') ):

            // loop through the rows of data
            while ( have_rows('bloque') ) : the_row();


                if (get_sub_field('tipo_de_bloque')=='texto') {
                    

                    if( !empty(get_sub_field('seccion_de_texto')) ):

                        
                        $columnas = get_sub_field('seccion_de_texto');

                        ?>

                        <section class="quote-area" style="display:block;padding-bottom:0px; padding-top: 30px;">
                            <div class="container"> 

                                <?php

                                    foreach ($columnas as $colkey => $colvalue):

                                        if ($colvalue['imagen_primero']) {
                                            ?>


                                                <div class="row">
                                                    <div class="col-lg-6 quote-left">

                                                        <?php if(strlen($colvalue['titulo'])>0): ?>
                                                            <h3>
                                                                <span><?php echo $colvalue['titulo']; ?></span>.
                                                            </h3>
                                                            <br>
                                                        <?php  endif; ?>
                                                        
                                                        <p class="card-text texto-margen" style="text-align:justify;"><?php echo $colvalue['descripcion']; ?></p>
                                                    </div>
                                                    <div class="col-lg-6 quote-right mb-30">
                                                            <img src="<?php echo $colvalue['imagen']['url']; ?>" alt="" height="300px" class="img-fluid  img-margen img-margen-interno" id="">
                                                    </div>
                                                </div>


                                             <?php
                                        }else{

                                            ?>



                                                <div class="row">
                                                    <div class="col-lg-6  quote-left mb-100 show-2">
                                                            <img src="<?php echo $colvalue['imagen']['url']; ?>" alt="" height="300px" class="img-fluid  img-margen img-margen-interno" id="">
                                                    </div>
                                                    <div class="col-lg-6 quote-right show-2">
                                                        <?php if(strlen($colvalue['titulo'])>0): ?>
                                                            <h3>
                                                                <span><?php echo $colvalue['titulo']; ?></span>.
                                                            </h3>
                                                            <br>
                                                        <?php  endif; ?>
                                                        <p class="card-text texto-margen" style="text-align:justify;"><?php echo $colvalue['descripcion']; ?></p>    
                                                
                                                    </div>
                                                </div>
                                                
                                                <!--Visualización en mobile-->
                                            
                                                <div class="col-lg-6 quote-right mt-10 show row zero-space">
                                                        <?php if(strlen($colvalue['titulo'])>0): ?>
                                                            <h3>
                                                                <span><?php echo $colvalue['titulo']; ?></span>.
                                                            </h3>
                                                            <br>
                                                        <?php  endif; ?>
                                                        <p class="card-text texto-margen" style="text-align:justify;"><?php echo $colvalue['descripcion']; ?></p>    
                                            
                                                </div>
                                                <div class="col-lg-6 quote-left mb-100 show">
                                                        <img src="<?php echo $colvalue['imagen']['url']; ?>" alt="" height="300px" class="img-fluid img-margen img-margen-interno" id="">
                                                </div>

                                             <?php

                                        }

                                        if ($colvalue['url']) {
                                            ?>

                                                <div class="hyperlink">
                                                    <a href="<?php echo $colvalue['link']['url']; ?>"><span class="blackpart"><?php echo $colvalue['seccion_obscura_del_enlace']; ?></span> <span class="greenpart"><i class="tecbound-coolarrow"></i><?php echo $colvalue['seccion_verde_del_enlace']; ?></span></a>
                                                </div>

                                            <?php
                                        }     

                                    endforeach;

                                ?>

                            </div>
                        </section>

                        <?php



                    endif;

                }elseif(get_sub_field('tipo_de_bloque')=='partners'){


                    $section = get_sub_field('seccion_de_asociados')[0];

                    ?>



                        <section class="owners-section" id="">
                            <div class="container">
                                <div class="title">
                                    <h2 class="fulltitle">
                                        <span><?php echo $section['titulo']; ?></span>
                                    </h2>
                                </div>  

                                <div class="not-show-movile">


                                    <?php

                                        $auxgallery = $section['imagenes'];
                                        $interval = true;
                                        $slice = 4;
                                        $generalgallery = array();
                                        while (count($auxgallery)>0) {

                                            if (count($auxgallery)<3) {
                                                $slice = count($auxgallery);
                                            }else{
                                               if ($interval) {
                                                    $slice=4;
                                                    $interval = false;
                                                }else{
                                                    $slice=3;
                                                    $interval = true;
                                                } 
                                            }

                                            $generalgallery[]= array_slice($auxgallery,0,$slice); 
                                            $auxgallery = array_diff_key($auxgallery,$generalgallery[count($generalgallery)-1]);
                                            $auxgallery = array_values($auxgallery);
                                        }

                                        
                                        foreach ($generalgallery as $gallerykey => $galleryvalue) {


                                            if (count($galleryvalue)==4) {
                                                $style = "col-6 col-md-3";
                                                echo '<div class="row">';
                                            }else{
                                                $style = "col-6 col-md-4";
                                                echo '<div class="row threeline">';
                                            }
                                            
                                            foreach ($galleryvalue as $key => $value) {
                                                
                                                

                                                ?>

                                                    <div class="<?php echo $style; ?>" >
                                                        <img src="<?php echo $value['url']; ?>" alt="" class="img-fluid img-partners" id="" >
                                                    </div>

                                                <?php

                                            }


                                            echo '</div>';


                                        }


                                    ?>

                                </div>
                                <div class="show-only-movile">
                                    <div class="row">

                                    <?php

                                        $galleryvalue = $section['imagenes'];


                                        foreach ($galleryvalue as $key => $value) {


                                            ?>

                                                <div class="col-6" >
                                                    <img src="<?php echo $value['url']; ?>" alt="" class="img-fluid img-partners" id="" >
                                                </div>

                                            <?php

                                        }


                                    ?>

                                    </div>
                                </div>
                            </div>
                        </section>


                    <?php

                    
                }else{

                }


            endwhile;

        else :

            // no rows found

        endif;

    ?>


    <section class="background-slider" style="display:none;padding:0px;">
        
        <div class="container">
            
            <div class="row figurerow firtsrow">
                <div class="col-lg-3 col-12">
                    <div>
                        <h2 class="fulltitle">The<br>Tecbound<br>Team</h2>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div>
                        <figure style="background-image: url(assets/img/header_bg1.png);" data-subtitle="Prueba" data-title="Texto," data-textcontent="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.">
                            <div><h4>Texto<br><span>Prueba</span></h4></div>
                        </figure>
                        <div class="onlycollapseshow">
                            <div><h4>Texto<br>Prueba <span class="collapse-icon" data-target="#text-colapse1" data-hidden="0"></span></h4></div>
                            <div class="fullcolapse" id="text-colapse1">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div>
                        <figure style="background-image: url(assets/img/header_bg1.png);" data-subtitle="Prueba" data-title="Texto," data-textcontent="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.">
                            <div><h4>ONG<br><span>experience</span></h4></div>
                        </figure>
                        <div class="onlycollapseshow">
                            <div><h4>Texto<br>Prueba <span class="collapse-icon" data-target="#text-colapse1" data-hidden="0"></span></h4></div>
                            <div class="fullcolapse" id="text-colapse1">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div>
                        <figure style="background-image: url(assets/img/header_bg1.png);" data-subtitle="Prueba" data-title="Texto," data-textcontent="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.">
                            <div><h4>Texto<br><span>Prueba</span></h4></div>
                        </figure>
                        <div class="onlycollapseshow">
                            <div><h4>Texto<br>Prueba <span class="collapse-icon" data-target="#text-colapse1" data-hidden="0"></span></h4></div>
                            <div class="fullcolapse" id="text-colapse1">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="notpadingbottom" style="padding:0px;display: none"> 
        <div class="container"> 

            <div class="title">
                <h2 class="fulltitle">
                    <span>Case<br>Studies</span>
                </h2>
            </div>

            <div class="carrousel-aboutus">

                <div class="about-carrousel-container">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <img src="assets/img/why_tecbound2 _carrusel.jpg">
                        </div>
                        <div class="col-12 col-md-8">
                            <h3>Texto de Prueba<br>de Bloque</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <a href="#"><i class="tecbound-coolarrow"></i><span>Read More</span></a>
                        </div>

                    </div>      
                </div>
                <div class="about-carrousel-container">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <img src="assets/img/why_tecbound2 _carrusel.jpg">
                        </div>
                        <div class="col-12 col-md-8">
                            <h3>Texto de Prueba<br>de Bloque</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <a href="#"><i class="tecbound-coolarrow"></i><span>Read More</span></a>
                        </div>

                    </div>      
                </div>
                <div class="about-carrousel-container">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <img src="assets/img/why_tecbound2 _carrusel.jpg">
                        </div>
                        <div class="col-12 col-md-8">
                            <h3>Texto de Prueba<br>de Bloque</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <a href="#"><i class="tecbound-coolarrow"></i><span>Read More</span></a>
                        </div>

                    </div>      
                </div>
                <div class="about-carrousel-container">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <img src="assets/img/why_tecbound2 _carrusel.jpg">
                        </div>
                        <div class="col-12 col-md-8">
                            <h3>Texto de Prueba<br>de Bloque</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <a href="#"><i class="tecbound-coolarrow"></i><span>Read More</span></a>
                        </div>

                    </div>      
                </div>
                <div class="about-carrousel-container">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <img src="assets/img/why_tecbound2 _carrusel.jpg">
                        </div>
                        <div class="col-12 col-md-8">
                            <h3>Texto de Prueba<br>de Bloque</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <a href="#"><i class="tecbound-coolarrow"></i><span>Read More</span></a>
                        </div>

                    </div>      
                </div>

            </div>
        </div>
    </section>


<?php   endwhile; 

    else : ?>

        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php   
    
    endif;
        
        get_footer(); ?>