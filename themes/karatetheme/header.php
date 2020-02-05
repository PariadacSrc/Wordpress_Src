<?php


  if ( have_posts() ) :

    while ( have_posts() ) : the_post();

      $pageid=$post->ID;

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
        <title>KARATE</title>
        <!-- Metas-->

        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/css/main-theme.css">


    </head>
    <body>
        <div class="up-fixarrow"></div>
        <header>
            
            <div class="solarcontainer">
                <div class="mainmenu">
                    <div class="leftmenu">
                        <ul>
                            <li><a href="#">lorem</a></li>
                            <li><a href="#">lorem</a></li>
                        </ul>
                    </div>
                    <div class="mainlogo">
                        <div><a href="#"><img src="https://kgt656s6i6-flywheel.netdna-ssl.com/wp-content/themes/tecboundtheme/assets/img/Techbound_Logo_header.png" alt=""></a></div>
                    </div>
                    <div class="rightmenu">
                        <ul>
                            <li><a href="#">lorem</a></li>
                            <li><a href="#" class="blockbutton">lorem</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="blurryback">
                <div class="whitemask"></div>
                <div class="solarmask"></div>
            </div>
            <!--Response Menu-->
            <div class="collapsemenu"></div>
        </header>