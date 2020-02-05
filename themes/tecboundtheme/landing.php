<?php  /*Template Name: Main Landing*/ ?>

<?php

    $maintitle = '';

  if ( have_posts() ) :

    while ( have_posts() ) : the_post();

      $pageid=$post->ID;
      $maintitle = get_post_meta($post->ID, '_yoast_wpseo_title', true);

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

        <!-- Materialize CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!--
        CSS
        ============================================= -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600" rel="stylesheet">
        <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/css/landing.ver.1.0.06.css">

    </head>
    <body>
    

        <div class="main-landing">
            <div class="mainmask">
                <div></div>
            </div>
            <div class="landing-body">
                <div>

                	<?php

                        if ( have_posts() ) :
							while ( have_posts() ) : the_post(); ?>

                    <div class="main-text-area">
                        <div><img src="<?php bloginfo('template_url' ); ?>/assets/img/Techbound_Logo_header.png" alt=""></div>
                        <div>
                            <h1><span><?php echo get_field('titulo_pequeno'); ?></span><?php echo get_field('titulo_grande'); ?></h1>
                            <?php echo get_field('contenido'); ?>
                        </div>
                    </div>
                    <div class="main-form-area">
                        <div>
                            <h3><?php echo get_field('titulo_del_formulario'); ?></h3>
                            <div>
                                <?php the_content(); ?>
                            </div>
                            <div class="privacy-area">
								
								<?php
		                            $link = get_field('link_de_politicas');
		                            if( $link ){
		                                $link_url = $link['url'];
		                                $link_title = $link['title'];
		                                $link_target = $link['target'] ? $link['target'] : '_self';

		                                echo '<a href="'.esc_url($link_url).'" target="'.esc_attr($link_target).'">
		                                    <p><strong>'.get_field('politicas_de_seguridad').'</strong><br>'.esc_html($link_title).'</p>
		                                </a>';
		                            }

		                        ?>

                            </div>
                        </div>
                    </div>

                   <?php
               				endwhile;
                   				wp_reset_postdata();
                   		endif; 
                    ?>
                </div>
                <div class="copyright-area">
                    <h6>Copyright &copy; All rights reserved | Powered by Tecbound | Term and Conditions | Privacy Policy   </h6>
                </div>
            </div>
        </div>


    <?php wp_footer(); ?>
     <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>

        var apikey = 'e754e150bd1dcf633879e13811527955';

        async function getCountries(){
            let response = await fetch(`https://restcountries.eu/rest/v2/all`,{
                method: 'GET'
            });
            let data = await response;
            
            return data.json();
        }

        async function getCity(country){

            let response = await fetch(`https://battuta.medunes.net/api/region/${country}/all/?key=${apikey}`,{
                method: 'GET'
            });
            let data = await response;
            
            return data.json();

        }

        document.addEventListener('DOMContentLoaded', function() {

            /*getCountries().then((resp)=>{

                document.getElementById('maincountry').innerHTML='';
                
                resp.map((country)=>{

                    let elem = document.createElement('option');
                    elem.setAttribute('data-code',country.capital);
                    elem.setAttribute('value',country.name);
                    elem.innerHTML = country.name;

                    document.getElementById('maincountry').appendChild(elem);
                });

                M.FormSelect.init(document.getElementById('maincountry'));

            });*/

            M.FormSelect.init(document.getElementById('maincountry'));


            document.getElementById('maincountry').addEventListener('change',(e)=>{

                //const country_code = e.target.querySelector(`option[value="${e.target.value}"]`).getAttribute('data-code');
                document.getElementById('country').value=e.target.value;

            });


            document.addEventListener( 'wpcf7_before_send_mail', function( event ) {
            	let mainnode = document.querySelector('.terms-area input[name="terms"]').closest('label').querySelector('span');
            	if(!document.querySelector('.terms-area input[name="terms"]').checked){
            		mainnode.style.color='red';
            	}else{
            		mainnode.style='';
            	}

            	document.querySelector('.hiddenarea input[name="termsitem[]"]').checked = document.querySelector('.terms-area input[name="terms"]').checked;

			}, false );


			document.querySelector('.terms-area input[name="terms"]').addEventListener('change', function( event ) {

            	document.querySelector('.hiddenarea input[name="termsitem[]"]').checked = document.querySelector('.terms-area input[name="terms"]').checked;

			}, false );


            //var elems = document.querySelectorAll('select');
            //var instances = M.FormSelect.init(elems);
        });
    </script>
    </body>
</html>