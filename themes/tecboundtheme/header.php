<?php

    $mycustomstyles ='';
    $mainlogo='Techbound_Logo_header.png';
    $maintitle = 'Tecbound Technology | IT Managed Service Provider';

  if ( have_posts() ) :

    while ( have_posts() ) : the_post();

      $pageid=$post->ID;
      $maintitle = get_post_meta($post->ID, '_yoast_wpseo_title', true);

      if (get_post_meta( $post->ID, '_wp_page_template', true ) == 'privacity.php') {
          $mycustomstyles.= 'background-color: rgb(146, 184, 69)!important;';
          $mainlogo = 'logo_footer.png';
      }

    endwhile; 

    wp_reset_postdata();

  else : 

    $pageid=0;

  endif; 

?>



<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="<?php bloginfo('template_url' ); ?>/assets/img/fav.png">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Disable screen scaling-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="Tecbound Technology">
        <meta name="robots" content="noodp,noydir"/>
        <!-- Page Title Here -->

        <?php wp_head(); ?>

        <title><?php echo $maintitle; ?></title>
        <!-- Metas-->

        <!--
        CSS
        ============================================= -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600" rel="stylesheet">
        <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/css/linearicons.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/css/nice-select.css">                   
        <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/css/animate.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/vendor/slick/slick.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/vendor/slick/slick-theme.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/css/main.css">

        <?php
            
            if (get_option( 'page_on_front' )==$pageid) {
                ?>
                    <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/css/banner_home.css">
                <?php
            }else{
                ?>
                    <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/css/banner_styles.css">
                <?php
            }

        ?>
        
        <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/css/carrousel_styles.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/css/theme.css">

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130760316-2"></script>
    </head>
    <body>
        <div class="up-fixarrow"></div>
        <header id="header" id="home" style="<?php echo $mycustomstyles; ?>">
            <div class="container header-top">
                <div class="row">
                    <div class="col-6 top-head-left">

                    </div>
                    <div class="col-6 top-head-right">
                        <ul>
                            <li></li>
                        </ul>
                    </div>                      
                </div>
            </div>

            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container">
                  <div id="logo">
                    <a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo('template_url' ); ?>/assets/img/<?php echo $mainlogo; ?>" alt="" title="" /></a>
                  </div>
                  <div id="switch-cont">
                    <label class="switch">
                      <input type="checkbox">
                      <span class="slider round"></span>
                    </label>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="change-menu tecbound-menu"></i>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">


                        <?php $menu= wp_get_nav_menu_items( 'header-menu'); 


                            foreach ($menu as $key => $value) {


                                if ($value->object_id == $pageid):

                                    ?> <li class="nav-item active"><a href="<?php echo $value->url; ?>" ><?php echo $value->title; ?></a></li> <?php

                                else:

                                    ?> <li class="nav-item"><a href="<?php echo $value->url; ?>" ><?php echo $value->title; ?></a></li> <?php

                                endif;

                            }

                        ?>

                    </ul>
                    <div class="hamburgericons">
                        <a href="https://www.facebook.com/tecbound/ " target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/tecboundtech" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/company/tecboubd-technology/" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="https://www.instagram.com/tecbound/" target="_blank"><i class="fa fa-instagram"></i></a>
                    </div>
                  </div>
                </div>
            </nav>

        </header>
