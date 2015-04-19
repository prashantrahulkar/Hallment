<?php

Class ApiLayer {
	private $_framework;
	private $_version;
	private $_exceptionMessage;
	
	
	private $_SCCOLLECTION = array(  
			            200 => 'OK',
			            404 => 'Not Found',   
			            405 => 'Model Not Allowed',
			            500 => 'Internal Server Error',
			        ); 
	
	protected  $method;
	
	protected  $requestbody;
	protected  $response = array();
	protected  $httpStatusCode;
	protected  $responseCode;
	protected  $responseText;

	function __construct() {
		$this->_framework = FRAMEWORKNAME;
		$this->_version  = HALLMENT_VERSION;
		
		header("Access-Control-Allow-Orgin: *");
		header("Access-Control-Allow-Methods: *");
		header("Content-Type: application/json");
		$this->method = $_SERVER['REQUEST_METHOD'];
		$this->requestbody = @file_get_contents('php://input');
	}
	
	private function throughOutPointer() {
		
		try {
			throw new \Exception($this->_exceptionMessage);
		} catch (Exception $e) {
			$this->responseText = $e->getMessage(); 
			$this->jsob_encoded_response();
		//	 responseText"=> );
		//	print json_encode($response);
		//	exit;
		}
		
	}
	
	protected function invalidInput($qsinput) {
		$this->httpStatusCode = "404";
		$this->statusCode = "excpX001H";
		$this->_exceptionMessage = "Invalid Request parameters;example: model/action/key";
		$this->throughOutPointer();
	}
	
	protected function methodNotExist($method) {
		$this->httpStatusCode = "404";
		$this->statusCode = "excpX002H";
		$this->_exceptionMessage = "Invalid Request : $method is not valid REST Request";
		$this->throughOutPointer();
	}
	
	protected function modelNotExist($model) {
		$this->httpStatusCode = "405";
		$this->statusCode = "excpX003H";
		$this->_exceptionMessage = "Invalid Request : $model is not Implemented";
		$this->throughOutPointer();
	}
	
	protected function jsob_encoded_response() {
		header("HTTP/1.1 " . $this->httpStatusCode . " " . $this->_SCCOLLECTION[$this->httpStatusCode]);
		$response["output"] = array(
									"responseCode"=> $this->responseCode,
									"responseText"=> $this->responseText
								);
		print json_encode($response);
		exit;
	}
	
	
} 

?>