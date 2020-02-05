<?php

	//Theme Const
	define('TECB__DEFAULT_COMP_FOLDER','components_templates/components/');
	define('TCB_KRONOS_TXT_DOMAIN','tecboundkronostheme');
	define('TECB_POST_PER_PAGE',8);

	//Main Components Actions
	include(get_template_directory().'/components_templates/call_actions.php');
	//Main ShortCodes
	include(get_template_directory().'/components_templates/short_codes_actions.php');
	//Main Custom Widgets
	include(get_template_directory().'/custom_widgets/main_actions_widgets.php');
	//Main ACF Settings and Actions
	include(get_template_directory().'/components_templates/acf_actions.php');
	
	//Language Theme Text Domain

	function tecb_kronos_txt_domain(){
		load_theme_textdomain( TCB_KRONOS_TXT_DOMAIN, get_template_directory() . '/lang' );
	}
	add_action( 'after_setup_theme', 'tecb_kronos_txt_domain' );

	//Main Assets
	function get_theme_assets() {

		$locate = get_stylesheet_directory_uri();
		$version = wp_get_theme()->get( 'Version' );
		
		//Styles
		wp_enqueue_style( 'main-theme-fonts', 'https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,900',array(),$version);
		wp_enqueue_style( 'vendor-fontawesome', $locate.'/assets/vendor/fontawesome/css/all.min.css',array(),$version);
		wp_enqueue_style( 'vendor-bootstrap', $locate.'/assets/vendor/bootstrap/css/bootstrap.min.css',array(),$version);
		wp_enqueue_style( 'vendor-slick', $locate.'/assets/vendor/slick-1.8.1/slick.css',array(),$version);
		wp_enqueue_style( 'vendor-slick-theme', $locate.'/assets/vendor/slick-1.8.1/slick-theme.css',array(),$version);
		wp_enqueue_style( 'main-theme-tebclassicfont', $locate.'/assets/fonts/tecboundclassicfont/style.css',array(),$version);
		wp_enqueue_style( 'main-theme-tebkronosfont', $locate.'/assets/fonts/tebkronosfont/style.css',array(),$version);
		wp_enqueue_style( 'main-theme-styles', $locate.'/assets/css/maintheme.css',array(),$version);

		//Scripts
		wp_enqueue_script( 'vendor-bootstrap-js', $locate.'/assets/vendor/bootstrap/js/bootstrap.min.js',array('jquery'),$version,true);
		wp_enqueue_script( 'vendor-slick-js', $locate.'/assets/vendor/slick-1.8.1/slick.min.js',array('jquery'),$version,true);
		wp_enqueue_script( 'generic-button-shortcode', $locate.'/assets/js/generic-button-shortcode.js',array('vendor-bootstrap-js','vendor-slick-js'),$version,true);
		wp_enqueue_script( 'main-theme-styles', $locate.'/assets/js/main-theme.js',array('vendor-bootstrap-js','vendor-slick-js'),$version,true);

	}
	add_action( 'wp_enqueue_scripts', 'get_theme_assets');


	//Main Admin WP Assets
	function get_admin_assets() {

		$locate = get_stylesheet_directory_uri();
		$version = wp_get_theme()->get( 'Version' );
		
		//Styles
		wp_enqueue_style( 'main-theme-tebkronosfont', $locate.'/assets/fonts/tebkronosfont/style.css',array(),$version);

	}
	add_action( 'admin_enqueue_scripts', 'get_admin_assets' );

	function tecb_custom_new_menu() {
	  register_nav_menu('tecb_main_menu',__( 'Principal Menu' ));
	}
	add_action( 'init', 'tecb_custom_new_menu' );


	function tecb_shortcode_render() {
	 	
		$shortcode = str_replace('|', '"', $_POST['tecb_render']);

	    $dataReturn = array(
	    	'html' => do_shortcode($shortcode)
	    );
	 	
	 	echo json_encode($dataReturn);

	    wp_die();
	}
	add_action( 'wp_ajax_nopriv_tecb_shortcode_render', 'tecb_shortcode_render' );
	add_action( 'wp_ajax_tecb_shortcode_render', 'tecb_shortcode_render' );

	//Complement Libs
	function load_complement_libs(){

		ob_start();

			//Main Libs Scripts
			include('complement_libs/linkedin_social_script.php');

		$return = ob_get_contents();
		ob_end_clean();

		echo $return;

	}
	add_action( 'load_complement_libs', 'load_complement_libs');
		

?>