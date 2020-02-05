<?php

/**
*@package Unidos en Red Theme
*/

class classShortCodeComponents{

	/*__Register ShortCodes Hooks Actions*/
	public function registerHandlers(){

		add_shortcode( 'uer_slider_generic', array($this,'sliderGeneric'));
		add_shortcode( 'uer_content_one_row_generic', array($this,'contentOneRowGeneric'));
		add_shortcode( 'uer_content_single_desing', array($this,'contentSingleDesing'));
		add_shortcode( 'uer_location_content', array($this,'contentLocationGeneric'));

		add_shortcode( 'post_search_generic', array($this,'postSearchGeneric'));

		//WP Bakery Register ShortCode Map
		if ( function_exists( 'vc_lean_map' ) ) {
			vc_lean_map( 'uer_slider_generic', array( $this, 'wpbMapSliderGeneric' ) );
			vc_lean_map( 'uer_content_one_row_generic', array($this,'wpbMapContentOneRowGeneric') );
			vc_lean_map( 'uer_content_single_desing', array($this,'wpbMapContentSingleDesing') );
			vc_lean_map( 'uer_location_content', array($this,'wpbMapContentLocationGeneric') );
		}

	}

	/*__Render Action*/
	public function genericLayoutRender($atts=array(),$layout='',$content=''){
		ob_start();

			include( locate_template( $layout, false, false ) );

		$return = ob_get_contents();
		ob_end_clean();

		return $return;
	}

	/*__Main ShortCodes*/

	//--
	public function sliderGeneric($atts,$content=null){

		$atts = shortcode_atts(array(
			'post_type' 	=> 'post',
			'show_item'		=> '1',
			'main_template'	=> 'generic',
			'variation_type'=> 'generic',
			'content' 		=> $content
		),$atts);

		return $this->genericLayoutRender($atts,UER__DEFAULT_COMP_FOLDER.'uer_slider_generic.php');
	}
	public function wpbMapSliderGeneric(){
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

	//--
	public function contentOneRowGeneric($atts,$content=null){

		$atts = shortcode_atts(array(
			'img' => '',
			'url'=>false,
			'content' => $content
		),$atts);

		return $this->genericLayoutRender($atts,UER__DEFAULT_COMP_FOLDER.'uer_content_one_row_generic.php');
	}
	public function wpbMapContentOneRowGeneric(){
		return array(
			'name'        => 'Uer Contenido General',
			'description' => '',
			'category'	  => 'Atajos de UER',
			'base'        => 'uer_content_one_row_generic',
			'params'      => array(
				array(
					'type'       => 'attach_image',
					'heading'    => 'Imagen Principal',
					'param_name' => 'img',
				),
				array(
					'type'       => 'textfield',
					'heading'    => 'Enlace de redirección',
					'param_name' => 'url',
					'description'=> 'Ej: https://unidosenred2020.flywheelsites.com'
				),
				array(
					'type'       => 'textarea_html',
					'heading'    => 'Contenido',
					'param_name' => 'content',
					'description'=> 'Contenido Principal'
				),
			),
		);
	}

	//--
	public function contentSingleDesing($atts,$content=null){

		$atts = shortcode_atts(array(
			'title' 	=> '',
			'img'		=> '',
			'orientation' => 'left',
			'desing'	=> 'default',
			'url'		=> false,
			'content' 	=> $content
		),$atts);

		return $this->genericLayoutRender($atts,UER__DEFAULT_COMP_FOLDER.'uer_content_single_desing.php');
	}
	public function wpbMapContentSingleDesing(){
		return array(
			'name'        => 'Uer Bloque de Contenido Personalizado',
			'description' => '',
			'category'	  => 'Atajos de UER',
			'base'        => 'uer_content_singlen_desing',
			'params'      => array(
				array(
					'type'       => 'textfield',
					'heading'    => 'Titulo',
					'param_name' => 'title',
					'description'=> 'Ej: Custom Post'
				),
				array(
					'type'       => 'attach_image',
					'heading'    => 'Imagen Principal',
					'param_name' => 'img'
				),
				array(
					'type'       => 'dropdown',
					'heading'    => 'Posicion de la imagen',
					'param_name' => 'orientation',
					'value'      => array(
						'A la derecha del contenido' 	=> 'left',
						'A la izquierda del contenido' 	=> 'right'
					),
					'std'        => 'left'
				),
				array(
					'type'       => 'dropdown',
					'heading'    => 'Diseño del bloque',
					'param_name' => 'desing',
					'value'      => array(
						'Principal' 	=> 'default'
					),
					'std'        => 'default'
				),
				array(
					'type'       => 'textfield',
					'heading'    => 'Enlace de redirección',
					'param_name' => 'url',
					'description'=> 'Ej: https://unidosenred2020.flywheelsites.com'
				),
				array(
					'type'       => 'textarea_html',
					'heading'    => 'Contenido',
					'param_name' => 'content',
					'description'=> 'Contenido Principal'
				),
			),
		);
	}

	//--
	public function contentLocationGeneric($atts,$content=null){

		$atts = shortcode_atts(array(
			'title' => '',
			'content' => $content
		),$atts);

		return $this->genericLayoutRender($atts,UER__DEFAULT_COMP_FOLDER.'uer_location_content.php');
	}
	public function wpbMapContentLocationGeneric(){
		return array(
			'name'        => 'Uer Bloque de Ubicaciones',
			'description' => '',
			'category'	  => 'Atajos de UER',
			'base'        => 'uer_location_content',
			'params'      => array(
				array(
					'type'       => 'textfield',
					'heading'    => 'Dirección',
					'param_name' => 'title',
					'description'=> 'Ej: 160 Quarry Park Blvd, Calgary, AB T2C 4J2'
				),
				array(
					'type'       => 'textarea_html',
					'heading'    => 'Contenido',
					'param_name' => 'content',
					'description'=> 'Contenido Principal'
				),
			),
		);
	}

	
	//------
	public function postSearchGeneric($atts){

		$atts = shortcode_atts(array(),$atts);

		return $this->genericLayoutRender($atts,UER__DEFAULT_COMP_FOLDER.'post_search.php');
	}

}