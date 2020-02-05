<?php  
namespace App\Src\Shortcodes\Classes;

use App\Src\Shortcodes\classShortCodeMap;

/**
*@package Unidos en Red Theme
*/
class sliderGeneric extends classShortCodeMap{

	public function getDump(){return 'Pase';}
	
	public function registerHandlers(){
		add_shortcode( 'uer_slider_generic', array($this,'buildCode'));
		vc_lean_map( 'uer_slider_generic', array( $this, 'wpbMapCode'));
	}
	public function buildCode(){
		$atts = shortcode_atts(array(
			'post_type' 	=> 'post',
			'show_item'		=> '1',
			'main_template'	=> 'generic',
			'variation_type'=> 'generic',
			'content' 		=> $content
		),$atts);

		return $this->genericLayoutRender($atts,UER__DEFAULT_COMP_FOLDER.'uer_slider_generic.php');
	}

	public function wpbMapCode(){
		return array(
			'name'        => 'Uer Slider',
			'description' => '',
			'category'	  => 'Atajos de UER',
			'base'        => 'uer_slider_generic',
			'params'      => array(
				array(
					'type'       => 'dropdown',
					'heading'    => 'Tipo de Post',
					'param_name' => 'post_type',
					'value'      => array(
						'Posts' 					=> 'post',
						'Alianzas' 					=> UER_PRFX.'allics',
						'Noticias'					=> UER_PRFX.'news',
						'Fondo de Inversión Social'	=> UER_PRFX.'othrs',
					),
					'std'        => 'post'
				),
				array(
					'type'       => 'dropdown',
					'heading'    => 'Variacion',
					'param_name' => 'variation_type',
					'dependency' => array(
						'element' 	=> 'post_type',
                    	'value' 	=> array(UER_PRFX.'allics')
					),
					'value'      => array(
						'Genral' 					=> 'generic',
						'Ultimas Publicaciones' 	=> 'news_posts'
					),
					'std'        => 'generic'
				),
				array(
					'type'       => 'dropdown',
					'heading'    => 'Numero de Elementos que se muestran',
					'param_name' => 'show_item',
					'value'      => array(
						'1',
						'2',
						'3'
					),
					'std'        => '1'
				),
				array(
					'type'       => 'dropdown',
					'heading'    => 'Tipo de plantilla',
					'param_name' => 'main_template',
					'value'      => array(
						'Genral' 					=> 'generic',
						'Cuadros Blancos' 			=> 'white-box'
					),
					'std'        => 'generic'
				)
			),
		);
	}
}
