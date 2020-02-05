<?php  /*Template Name: Main Landing Draft*/ ?>

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
        <link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/assets/css/landing-page.css">

        <style>
            @import '<?php bloginfo('template_url' ); ?>/assets/css/fonts.css';
            .main-landing{
                height: 100vh;
                width: 100%;
                overflow: hidden;
                position: relative;
                font-family: 'Raleway';
                font-size: 12pt;
                min-height: 799px;
            }

            .landing-body{
                padding: 1% 0px;
            }

            .mainmask{
                background-image: url('<?php bloginfo('template_url' ); ?>/assets/img/fondo.jpg');
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1;
                background-position: center;
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }

            .landing-body,.landing-body>div{
                position: relative;
                width: 100%;
                height: 100%;
            }

            .landing-body>div{
                padding: 40px 6%;
            }

            .landing-body>div>div{
                float: left;
                width: 50%;
                padding: 2% 0px;
            }

            /*------*/

            .main-form-area{
                padding: 2%;
            }

            .main-form-area>div{
            	position: relative;
                padding: 20px 50px;
                background-color: #fff;
                -webkit-box-shadow: 0px 6px 14px rgba(0,0,0,0.7);
                -moz-box-shadow: 0px 6px 14px rgba(0,0,0,0.7);
                -o-box-shadow: 0px 6px 14px rgba(0,0,0,0.7);
                box-shadow: 0px 6px 14px rgba(0,0,0,0.7);
            }

            .main-form-area input, .main-form-area label{
                display: block;
                color: #616161;
            }

            .main-form-area label{
                font-size: 1em;
            }

            .main-form-area input{
                height: 1.3em!important;
                font-size: .8em!important;
                margin-top: 5px!important;
                border-color: #a1c44b!important;
                padding-bottom: 0.2em!important;
            }

            .main-form-area input:hover,.main-form-area input:focus{
                box-shadow: none!important;
            }

            .main-form-area .select-wrapper{
                border:1px solid #616161;
            }

            .main-form-area .select-wrapper input.select-dropdown{
                padding: 8px;
                border:0px;
                margin: 0px!important;
                font-family: 'Raleway';
            }
    
            .doblecolum{
                margin: 0px -.75rem;
            }

            .main-form-area h3{
                font-size: 2em;
                text-align: center;
                line-height: 1.4em;
                color: #616161;
                margin: 0px;
                margin-bottom: 10px;
            }

            .main-form-area h3>strong{
                font-size: 1.3em;
                color: #a1c44b;
                font-weight: bold;
            }

            .terms-area,.button-container{
                text-align: center;
            }

            .button-container button{
                background-color: #a1c44b;
                padding: 2% 10%;
                line-height: 0;
                font-size: 1em;
                text-transform: capitalize;
            }

            .privacy-area p{
                margin: 0px;
                margin-top: 2em;
                font-size: .8em;
                text-align: center;
                color: #616161;

            }

            .privacy-area p>strong{
                font-weight: bold;
                font-size: 1.4em;
            }

            .terms-area span{
                font-size: .6em;
            }

            /*-----------*/

            .main-text-area{
                color: #fff;
            }

            .main-text-area h1{
                font-size: 6.6em;
                font-weight: bold;
                font-family: 'Raleway-Black';
            }

            .main-text-area h1>span{
                font-size: .25em;
                font-weight: 300;
                display: block;
                line-height: 1em;
                font-family: 'Raleway';
            }

            .main-text-area h3{
                font-size: 1.2em;
                line-height: 1.4em;
            }

            /*-------*/

            .copyright-area{
                position: absolute!important;
                width: 100%!important;
                padding: 0px!important;
                text-align: center;
                color: #fff;
                display: block;
                height: auto!important;
                bottom: 1%;
            }

            .copyright-area h6{
                font-size: .7em;
            }

            .hiddenarea{
            	display: none;
            	visibility: none;
            }

            .dropdown-content.select-dropdown{
            	top: -10%!important;
            	max-height: 1000%;
            	backface-visibility: hidden !important;
            }

            .wpcf7-form-control-wrap{
            	display: block;
            }

            span.wpcf7-not-valid-tip{
            	position: absolute;
			    top: -2em;
			    right: 0;
            }

            div.wpcf7-response-output{
        	    font-weight: bold;
			    width: 90%;
			    font-size: .9em;
			    text-align: center;
			    position: absolute;
			    padding: 2%;
			    animation-name: disbanmsn;
			    animation-fill-mode: forwards;
			    animation-duration: 1s;
			    animation-delay: 7s;
			    left: 0;
			    margin: 2em 5%;
            }

			div.wpcf7-validation-errors, div.wpcf7-acceptance-missing{
				background-color: #f18d8d;
    			border: 0px;
			}
	
			div.wpcf7-mail-sent-ok{
				background-color: #67FF8A;
				border: 0px;
			}

			label[for='maincity']{
				margin-bottom: 1.5em;
			}

            .google-recaptcha span.wpcf7-not-valid-tip{
                position: relative;
                top: .5em;
            }

            .google-recaptcha .cf7sr-g-recaptcha>div:nth-child(1){
                margin: auto;
            }
            
            @media only screen and (max-width: 1100px){
                .main-text-area h1{
                    font-size: 5.6em;
                }
            }

            @media only screen and (min-width: 1024px) and (max-height: 1024px){
                .main-form-area>div{
                    font-size: .92em;
                }

                .main-form-area{
                    margin-top: -3.5%;
                    padding: 0% 0 0% 5%!important;
                }

            }

            @media only screen and (min-width: 1366px) and (min-height: 1024px){
                .main-landing{
                    font-size: 15pt;
                }
            
                .main-form-area>div{
                    font-size: 1em;
                }

                .landing-body{
                    padding: 5% 0px;
                }

                .main-text-area h1{
                    font-size: 4.6em;
                }

                .copyright-area{
                    bottom: 1%;
                }
    
                .main-form-area {
                    margin-top: -5.5%;
                }

                .main-form-area h3{
                    font-size: 1.4em; 
                }

                span.wpcf7-not-valid-tip{
                    font-size: .8em;
                }

                .landing-body>div>div{
                    padding: 2%!important;
                }
            }


            @media only screen and (max-width: 1024px){
                .main-landing{
                    height: auto;
                }

                .mainmask{
                    display: none;
                }

                .main-landing,.landing-body,.landing-body>div, .landing-body>div>div{
                    padding: 0px;
                }

                .landing-body>div>div{
                    width: 100%;
                }

                .main-text-area{
                    height: 50vh;
                    min-height: 400px;
                    padding: 5%!important;
                    background-image: url('<?php bloginfo('template_url' ); ?>/assets/img/fondo.jpg');
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                }

                .main-form-area>div{
                    box-shadow: none;
                }

                .copyright-area{
                    display: none;
                }
            }

            @media only screen and (max-width: 768px){
                .main-text-area h1{
                    font-size: 4.6em;
                }

                .main-text-area h3{
                    font-size: 1em;
                }
            }

            @media only screen and (max-width: 480px){

                .main-landing{
                    font-size: 10pt;
                }

                .main-text-area h1{
                    font-size: 4.6em;
                }

                .main-text-area h3{
                    font-size: 1em;
                }

                .google-recaptcha{
                    margin-left: -8%;
                }
            }


            @keyframes disbanmsn{
				from {
				    visibility: visible;
				    opacity: 1;
				}

				to {
				    visibility: collapse;
				    opacity: 0;
				}
			}


        </style>

    </head>
    <body>
    

        <div class="main-landing">
            <div class="mainmask">
                <div></div>
            </div>
            <div class="landing-body">
                <div>
                    <div class="main-text-area">
                        <div><img src="<?php bloginfo('template_url' ); ?>/assets/img/Techbound_Logo_header.png" alt=""></div>
                        <div>
                            <h1><span>Smart Streamlined</span>Solutions</h1>
                            <h3>Tecnology has the power to enhance lives and empower businesses. At Tecbound, we device fully integrated, customized tecnology solutions that keep things moving forward, streamlining and simplyfying technology so uor clients have the freedom to focus on making their businesses shine</h3>
                        </div>
                    </div>
                    <div class="main-form-area">
                        <div>
                            <h3>Participate for a <br><strong>FREE</strong> assessment</h3>
                            <div>
                            	<?php

								  if ( have_posts() ) :

								    while ( have_posts() ) : the_post();

								      the_content();

								    endwhile; 

								    wp_reset_postdata();

								  endif; 

								?>
                            </div>
                            <div class="privacy-area">
                                <a href="/online-privacy-policy-agreement" target="_blank">
                                    <p><strong>Privacy Policy</strong><br>
                                        Here you can access the information about how we treat your data.
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
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


            //var elems = document.querySelectorAll('select');
            //var instances = M.FormSelect.init(elems);
        });
    </script>
    </body>
</html>