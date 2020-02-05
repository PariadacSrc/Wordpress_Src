<?php

/**
*@package Unidos en Red Theme
*/

class classTemplatesActions{

	public static function registerHandlers(){
		/*--Main Actions*/
		add_action('uer_related_posts_by_type', array('classTemplatesActions','relatedPostByType'),10,2);
	}

	/*__Render Action*/
	public static function genericLayoutRender($atts=array(),$layout=''){
		ob_start();

			include( locate_template( $layout, false, false ) );

		$return = ob_get_contents();
		ob_end_clean();

		return $return;
	}

	public static function relatedPostByType($type='post', $id=0){

		echo self::genericLayoutRender(array('post_type'=>$type,'post_id'=>$id),UER__DEFAULT_COMP_FOLDER.'related_posts_by_post_type.php');
	}
}