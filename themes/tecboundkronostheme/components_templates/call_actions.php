<?php

	//Components Actions WP

	function get_banner_template($args){

		ob_start();

			//Main HTML
			include('components/banner_template.php');

		$return = ob_get_contents();
		ob_end_clean();

		return $return;

	}
	add_action( 'get_banner_template', 'get_banner_template',10,1);


	//ACF Required Install Message
	function tecb_acf_required($print=false){
		ob_start();

			do_shortcode('[tecb_generic_area default_container="true"]You must install, "Advanced Custom Fields" plugin to use this function[/tecb_generic_area]');

		$return = ob_get_contents();
		ob_end_clean();

		if($print): 
			return $return; 
		else: 
			echo $return;
		endif;


	}
	add_action( 'tecb_acf_required', 'tecb_acf_required');


	//Cast Post template
	function cast_page_template($post,$args=array()){

		$args = shortcode_atts(array(
			'print_area'=>'all'
		),$args);

		if(class_exists('ACF')): 

			if( have_rows('block',$post->ID) ):

				$rows = get_fields($post->ID)['block'];
				$start_loop = 0;
				$end_loop = count($rows);


				if(get_field('start_sidebar_area',$post->ID)){

					$starter= (get_field('start_sidebar_area',$post->ID))?get_field('start_sidebar_area',$post->ID):1;
					$skiper= (get_field('skip_area',$post->ID)==="0")?$end_loop:get_field('skip_area',$post->ID);

					switch ($args['print_area']) {
						case 'top_area':
							$end_loop = $starter;
							break;

						case 'middle_area':
							$start_loop = $starter;
							$end_loop = $skiper;
							break;

						case 'end_area':
							$start_loop = $skiper;
							break;
						default:
							break;
					}

				}

				if($start_loop>=0){
					for ($rowskey=$start_loop; $rowskey < $end_loop ; $rowskey++) { 
					
						$fields = $rows[$rowskey]; 
						$atts = $fields[$fields['block_type']];
			        	include( 
			        		locate_template( 'components_templates/components/'.$fields['block_type'].'.php', false, false ) 
			        	);

					}
				}

		    endif;

		else:

			do_action('tecb_acf_required');

		endif;

	}
	add_action( 'cast_page_template', 'cast_page_template',10,2);



?>