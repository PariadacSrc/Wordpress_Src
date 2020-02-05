<?php 


class classAPIMainCalls
{

	private $routes;
	private $routekey;

	public function getRoutes(){
		return $this->routes;
	}

	public function getRouteKey(){
		return $this->routekey;
	}
	
	function __construct(){
		$this->registerRoutes();
	}

	private function initRoutes(){

		// Init Routes Objects
		$celb = new classCelebrities();

		$this->routes=array(
			array(
				'url'=>'celebrities',
				'branch'=>array(
					'fork'=>array(
						'all'=>array(
							'url'=>'',
							'settings'=>array(
							    'methods' => 'GET',
							    'callback' => array($celb,'getAll'),
							)
						),
						'single'=>array(
							'url'=>'',
							'branch'=>array(
								'fork'=>array(
									'name'=>array(
										'url'=>'(?P<value>[a-zA-Z0-9-]+)',
										'settings'=>array(
										    'methods' => 'GET',
										    'callback' => array($celb,'getByName'),
										)
									),
									'id'=>array(
										'url'=>'(?P<id>\d+)',
										'settings'=>array(
										    'methods' => 'GET',
										    'callback' => array($celb,'getByID'),
										)
									)
								)
							)
						)
					)
				)
			)
		);

	}

	private function registerRoutes(){

		$this->routekey = 'uer-api';
		$this->initRoutes();

	  	try {
			$this->renderRoutes($this->getRoutes());
		} catch (Exception $e) {
			self::apiExeptionHandler($e);
		}

	}


	public function renderRoutes($routes,$mainPath=''){

		foreach ($routes as $routeskey => $route):

			/*
			* Validate if url parameter exists
			* This represent a part of api url component, or also a request parameter
			*/
			if(isset($route['url'])){

				/*Main url concatenation string*/
				$mainPath.=(strlen($route['url'])>0)?'/'.$route['url']:'';

				/*
				* A branch represent any subsection of any api component
				*/
				if (isset($route['branch']) && is_array($route['branch'])) {
					
					/*
					* A fork represents any variation for a specific component, 
					* mostly used to differentiate simple searches from multiple searches, from the same type of post
					*/
					if( isset($route['branch']['fork']) && is_array($route['branch']['fork']) ){

						foreach ($route['branch']['fork'] as $forkkey => $fork) {
							$this->renderRoutes(array($fork),$mainPath.'/'.$forkkey);
						}
					}else{
						$this->renderRoutes(array($route['branch']),$mainPath);
					}

				}

				/*
				* Here the URL of the api is registered, 
				* only if the "settings" parameter exists in the component that is being built
				*/
				if( isset($route['settings']) && is_array($route['settings']) ){

					register_rest_route( $this->getRouteKey(), $mainPath, $route['settings']);
				}

			}
		endforeach;

	}

	///////////////////
	public static function apiExeptionHandler($e){
		var_dump($e);
	}

}