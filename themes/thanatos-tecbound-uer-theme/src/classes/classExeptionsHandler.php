<?php

/**
*@package Tecbound Global Theme Manager
*/

class classExeptionsHandler{

	private $exeption;

	function __construct($e=null){
		$this->exeption=$e;
	}

	public static function show_exeption($e){
		$newExeption = new self($e);
		$newExeption->exeption_template();
	}
	
	public function exeption_template(){
		var_dump($this->exeption);
	}


}