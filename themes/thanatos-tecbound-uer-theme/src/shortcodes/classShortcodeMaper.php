<?php  

/**
*@package Unidos en Red Theme
*/
class classShortCodeMaper{

	public function registerHandlers(){
		require_once UER_THEME_DIR.'/src/shortcodes/classShortcodeView.php';

		$map = $this->map();

		foreach ($map as $mapkey => $mapval) {

			$file =  UER_THEME_DIR.'/src/shortcodes/libs/'.$mapkey.'.php';
			
			if(file_exists($file)){
				require_once $file;

				$auxObj = new $mapkey();
				$auxObj->registerHandlers();
			}
		}
		
	}

	public function map(){
		return array(
			'sliderGeneric'=>array(),
		);

	}
}