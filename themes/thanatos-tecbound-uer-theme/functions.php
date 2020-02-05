<?php 

if(!class_exists('uerMainTheme')): 

	/**
	* Main Tecbound Global Theme Manager Class
	*/
	class uerMainTheme{

		//Main Attributes
		protected static $_instance;
		private $settigs;
		private $api;
		
		public function getSettings(){
			return $this->settigs;
		}

		function __construct($args=null){

			$this->setup_constants();
			$this->includes();
			$this->init_hooks();

			//Register Assets
			$this->enqueue_admin_assets();
			$this->enqueue_theme_assets();

		}

		//Default Actions
		/**
		* Return Self Instance 
		*/
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		/**
		* Init Hook
		*/
		private function init_hooks() {
			add_action( 'init', array( $this, 'init' ), 0 );
			add_action( 'after_setup_theme', array($this,'mainThemeTextDomain') );
		}

		/**
		* Init Theme Action
		*/
		public function init(){

			$this->settigs = array(
				'post_types' => new classMainPostTypes()
			);
			$this->api = new classAPIMainCalls();


			//Register Hooks Handlers
			classTemplatesActions::registerHandlers();
			$celebrities = new classCelebrities(); $celebrities->registerHandlers();
			$shortCodes  = new classShortCodeComponents(); $shortCodes->registerHandlers();

			$map = new classShortcodeMaper(); $map->registerHandlers();
		}

		/**
		* Includes main classes
		*/
		public function includes(){

			//Standar Class
			require_once UER_THEME_DIR.'/src/classes/classCelebrities.php';
			require_once UER_THEME_DIR.'/src/classes/classCURLApiMethods.php';

			//Main Dependencies
			require_once UER_THEME_DIR.'/src/actions/classMainPostTypes.php';
			require_once UER_THEME_DIR.'/src/actions/classTemplatesActions.php';
			require_once UER_THEME_DIR.'/src/shortcodes/classShortCodeComponents.php';
			require_once UER_THEME_DIR.'/src/shortcodes/classShortcodeMaper.php';

			//API
			require_once UER_THEME_DIR.'/src/api/classMainCalls.php';

			//Exeptions Handler
			require_once UER_THEME_DIR.'/src/classes/classExeptionsHandler.php';
		}

		/**
		* Set all main constants for Theme
		*/
		private function setup_constants() {

			// Theme Version.
			if ( ! defined( 'UER_VERSION' ) ) { define( 'UER_VERSION', wp_get_theme()->get( 'Version' ) ); }
			
			// Theme Folder Path.
			if ( ! defined( 'UER_THEME_DIR' ) ) { define( 'UER_THEME_DIR', get_stylesheet_directory() ); }

			// Theme Folder URL.
			if ( ! defined( 'UER_THEME_URL' ) ) { define( 'UER_THEME_URL', get_stylesheet_directory_uri() ); }

			// Theme Main Prefix
			if ( ! defined( 'UER_PRFX' ) ) { define( 'UER_PRFX', 'uer_' ); }

			// Theme Main Text Domain
			if ( ! defined( 'UER_TXT_DOMAIN' ) ) { define( 'UER_TXT_DOMAIN', 'thanatos-tecbound-uer-theme' ); }

			// General Theme Constans
			if ( ! defined( 'UER_TXT_DOMAIN' ) ) { define( 'UER_TXT_DOMAIN', 'uer_' ); }
			if ( ! defined( 'UER_APP_ENDPOINT' ) ) { define( 'UER_APP_ENDPOINT', 'http://34.222.153.169:8080/uertestcurl/' ); }
			if(!defined('UER__DEFAULT_COMP_FOLDER')){define('UER__DEFAULT_COMP_FOLDER','src/components_templates/');}

		}

		//////////////////////
		/**
		* Enqueue Theme Assets
		*/

		//Admin Assets
		private function enqueue_admin_assets() {

			add_action( 'admin_enqueue_scripts', function(){

				//Styles
				wp_enqueue_style( 'uer-gtm-main-admin-styles', UER_THEME_URL.'/assets/admin/css/styles.css',array(),UER_VERSION);
				//Scripts
				wp_enqueue_script( 'uer-gtm-main-admin-scripts', UER_THEME_URL.'/assets/admin/js/scripts.js',array(),UER_VERSION);

			});
		}

		//Theme Assets
		private function enqueue_theme_assets() {

			add_action( 'wp_enqueue_scripts', function(){

				//Styles
				wp_enqueue_style( 'vendor-slick', UER_THEME_URL.'/assets/vendor/slick-1.8.1/slick.css',array(),UER_VERSION);
				wp_enqueue_style( 'vendor-slick-theme', UER_THEME_URL.'/assets/vendor/slick-1.8.1/slick-theme.css',array(),UER_VERSION);
				wp_enqueue_style( 'uer-gtm-tecb-styles', UER_THEME_URL.'/assets/theme/css/maintheme.css',array(),UER_VERSION);
				wp_enqueue_style( 'uer-gtm-main-theme-styles', UER_THEME_URL.'/assets/theme/css/styles.css',array(),UER_VERSION);

				//Scripts
				wp_enqueue_script( 'uer-gtm-main-admin-scripts', UER_THEME_URL.'/assets/theme/js/scripts.js',array('jquery'),UER_VERSION);
				wp_enqueue_script( 'vendor-slick-js', UER_THEME_URL.'/assets/vendor/slick-1.8.1/slick.min.js',array('jquery'),UER_VERSION,true);

			});
		}

		public function mainThemeTextDomain(){
			load_theme_textdomain( UER_TXT_DOMAIN, UER_THEME_DIR . '/lang' );
		}
		
		
	}

endif;


/**
*	Start uerMainTheme Theme
*/

function uerMainTheme(){
	try {
		return uerMainTheme::instance();
	} catch (Exception $e) {
		return null;
	}
}

uerMainTheme();


/*$debug_tags = array();
add_action( 'all', function ( $tag ) {
    global $debug_tags;
    if ( in_array( $tag, $debug_tags ) ) {
        return;
    }
    echo "<pre>" . $tag . "</pre>";
    $debug_tags[] = $tag;
} );*/

//add_action('wp', function(){ echo '<pre>';print_r($GLOBALS['wp_filter']['wp_enqueue_scripts']); echo '</pre>';exit; } );