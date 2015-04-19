<?php




class ValidationLayer extends ApiLayer {
	private $_input ; 
	public $model;
	public $action;
	public $id;
	
	function __construct($parameter) {
		parent::__construct();
		$this->_input = trim($parameter);
	}
	
	function setParam($param) {
		$this->_input = trim($param);
	}
	
	function getParam() {
		return $this->_input; 
	}
	
	function apiQSvalidate() {
		$getParams = explode("/",$this->_input);
		$this->model = isset($getParams[0])? $this->inputValidate($getParams[0]) : $this->inputValidate('') ;
		$this->action = isset($getParams[1])? $this->inputValidate($getParams[1]) : $this->inputValidate('') ;
		$this->id = isset($getParams[2])? $this->inputKeyValidate($getParams[2]) : '' ;
	}
	
	
	function inputValidate($input) {
		if(!isset($input)) {
			$this->invalidInput('');
			return false;
		}elseif(! preg_match("/^[a-zA-Z]+/", $input )) {
			$this->invalidInput($input);
			return false;
		}
		return $input;		
	}
	
	function inputKeyValidate($input) {
		if(!preg_match("/^[0-9]+/", $input )) {
			$this->invalidInput($input);
			return false;
		}
		return $input;
	}
	

}



?>