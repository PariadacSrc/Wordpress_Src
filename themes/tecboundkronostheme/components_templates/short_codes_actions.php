<?php

	function tecb_generic_layout_render($atts=array(),$layout='',$content=''){
		ob_start();

			include( locate_template( $layout, false, false ) );

		$return = ob_get_contents();
		ob_end_clean();

		return $return;
	}

	function tecb_generic_area($atts,$content=null){

		$atts = shortcode_atts(array(
			'title' => false,
			'default_container'=>false,
			'content' => $content
		),$atts);

		return tecb_generic_layout_render($atts,TECB__DEFAULT_COMP_FOLDER.'generic_area_template.php');
	}
	add_shortcode( 'tecb_generic_area', 'tecb_generic_area' );


	function tecb_generic_button($atts,$content=null){

		$atts = shortcode_atts(array(
			'url' => '#',
			'target'=>'_self',
			'content' => $content,
			'form_short_code' => false,
			'class' => ''
		),$atts);

		return tecb_generic_layout_render($atts,TECB__DEFAULT_COMP_FOLDER.'generic_button_template.php');
	}
	add_shortcode( 'tecb_generic_button', 'tecb_generic_button' );


	function tecb_example_form_code($atts){

		$atts = shortcode_atts(array(),$atts);
		return tecb_generic_layout_render($atts,TECB__DEFAULT_COMP_FOLDER.'default_form_template.php');
	}
	add_shortcode( 'tecb_example_form_code', 'tecb_example_form_code' );


	function tecb_file_form_template($atts,$content=null){

		$atts = shortcode_atts(array(
			'content' => $content,
			'class' => ''
		),$atts);

		return tecb_generic_layout_render($atts,TECB__DEFAULT_COMP_FOLDER.'file_form_template.php');
	}
	add_shortcode( 'tecb_file_form_template', 'tecb_file_form_template' );


	function last_blog_posts($atts){

		$atts = shortcode_atts(array(
			'title'=>'Latest Blog <strong>Post</strong>'
		),$atts);

		return tecb_generic_layout_render($atts,TECB__DEFAULT_COMP_FOLDER.'last_blog_posts_template.php');
	}
	add_shortcode( 'last_blog_posts', 'last_blog_posts' );


	function tecb_standar_banner($atts){

		$atts = shortcode_atts(array(
			'background'=> array(
				'url'=>$atts['background-url']?$atts['background-url']:get_stylesheet_directory_uri().'/assets/img/backgrounds/front.jpg'
			),
			'banner_type'=>'tecb-half-banner',
			'content' => array(
				'text'=>$atts['content-text']?$atts['content-text']:'',
				'short_content' => $atts['content-short_content']?$atts['content-short_content']:'',
				'title' => $atts['content-title']?$atts['content-title']:'',
				'sub-title' => $atts['content-sub-title']?$atts['content-sub-title']:''
			),
			'icon' => 'no-icon'
		),$atts);

		return tecb_generic_layout_render($atts,TECB__DEFAULT_COMP_FOLDER.'banner_template.php');
	}
	add_shortcode( 'tecb_standar_banner', 'tecb_standar_banner' );


	function tecb_post_search($atts){

		$atts = shortcode_atts(array(),$atts);

		return tecb_generic_layout_render($atts,TECB__DEFAULT_COMP_FOLDER.'post_search.php');
	}
	add_shortcode( 'tecb_post_search', 'tecb_post_search' );

?>