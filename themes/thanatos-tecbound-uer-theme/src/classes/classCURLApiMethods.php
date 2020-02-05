<?php

/**
*@package Unidos en Red Theme
*/

class classCURLApiMethods{

	private $endpoint;
	private $response;
	private $settings;
	
	public function setEndpoint($endpoint=null){$this->endpoint = $endpoint;}
	public function setResponse($response=null){$this->response = $response;}
	public function setSettings($settings=null){$this->settings = $settings;}

	public function getEndpoint(){ return $this->endpoint; }
	public function getResponse(){ return $this->response; }
	public function getSettings(){ return $this->settings; }

	function __construct($args=array()){

		if(isset($args['endpoint'])): 
			$this->setEndpoint($args['endpoint']);
		else: 
			$this->setEndpoint(UER_APP_ENDPOINT);
		endif;

		if(isset($args['settings'])): 
			$this->setSettings(array_merge($this->initSettings(),$args['settings']));
		else: 
			$this->setSettings($this->initSettings());
		endif;
	}

	private function initSettings(){
		return array(
			'CURLOPT_POST' => true,
		);
	}

	public function runRequest($data, $obj=false){

		$uerclient = curl_init();
		$settings = $this->getSettings();

		//Settings
		curl_setopt($uerclient, CURLOPT_URL, $this->getEndpoint());

		if(isset($settings['CURLOPT_POST']))
			curl_setopt($uerclient, CURLOPT_POST, $settings['CURLOPT_POST']);
		
		curl_setopt($uerclient, CURLOPT_POSTFIELDS, $data);
		curl_setopt($uerclient, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($uerclient);
		curl_close($uerclient);

		if(!$obj){
			$this->setResponse((array) json_decode($response));
		}else{
			$this->setResponse(json_decode($response));
		}

	}		

}