<?php

/**
*@package Unidos en Red Theme
*/

class classCelebrities{

	private $celebritie;

	public function getCelebritie(){
		return $this->celebritie;
	}

	public function registerHandlers(){
		add_filter( 'wp_insert_post_data', array($this,'preSaveHandler'), '99', 2 );
	}

	//API Calls
	public function getAll(WP_REST_Request $request){

		if($request->sanitize_params()):

			$query = new WP_Query(array(
				'post_type'		=> UER_PRFX.'celbrts',
				'post_status' 	=> 'publish',
				'posts_per_page'=> -1

			));

			return $this->setRequestResponse($query);

		else:
			return new WP_Error('invalid_data', 'Bad Request parameter data.');
		endif;	

		
	}

	public function getByName(WP_REST_Request $request){

		if($request->sanitize_params()):

			$query = new WP_Query(array(
				'post_type'		=> UER_PRFX.'celbrts',
				'post_status' 	=> 'publish',
				'posts_per_page'=> -1,
				's'				=> $request->get_param('value')

			));
			return $this->setRequestResponse($query);

		else:
			return new WP_Error('invalid_data', 'Bad Request parameter data.');
		endif;	

		
	}

	public function getByID(WP_REST_Request $request){

		if($request->sanitize_params()):

			$query = new WP_Query(array(
				'post_type'		=> UER_PRFX.'celbrts',
				'post_status' 	=> 'publish',
				'posts_per_page'=> -1,
				'p'				=> $request->get_param('id')

			));
			return $this->setRequestResponse($query);

		else:
			return new WP_Error('invalid_data', 'Bad Request parameter data.');
		endif;	

		
	}

	public function setRequestResponse(WP_Query $query){

		$data = array();

	    foreach( $query->posts as $item ) {
	      $data[] = array($item);
	    }
	 
	    return new WP_REST_Response( 
	    	array(
	    		'status'=>200, 
	    		'response'=> array('data'=>$data) 
	    	) 
	    );

	}	

	public function storeMetaData($id,$data=[]){

		
		
	}

	//Aplication SendData
	public function preSaveHandler($data , $post_arr){

		$request = new classCURLApiMethods();
		$request->runRequest($data);

		//$data['post_content'] = json_encode($post_arr);

		if(!$request->getResponse()['response']):

			$data['post_status'] = 'draft';
			add_action('redirect_post_location', function(){

				remove_filter('redirect_post_location', __FUNCTION__, 99);
				$url = add_query_arg('uererror','celebrities',$_SERVER['HTTP_REFERER']);

				return $url;
			});

		endif;

		return $data;
	}

}