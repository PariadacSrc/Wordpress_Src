<?php  
namespace App\Src\Shortcodes;

/**
*@package Unidos en Red Theme
*/
abstract class classShortCodeMap{

	public function genericLayoutRender($atts=array(),$layout='',$content=''){
		ob_start();

			include( locate_template( $layout, false, false ) );

		$return = ob_get_contents();
		ob_end_clean();

		return $return;
	}
	
	abstract public function registerHandlers();
	abstract public function buildCode();
	abstract public function wpbMapCode();
}