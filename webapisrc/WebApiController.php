<?php

/*
 * 	@Project Name	REST Framework 			
 * 	@Descriptio 	The REST API Framework, readme.txt 		
 * 	@Author 		Prashant R.<prashantrahulkar@gmail.com>
 *  @Date 			18.04.2015 
 * 	
 * 	@Copyright	2014-15	Prashant-Rahulakr
 *  @FrameWorkName 	Hallment Framwork.. 
 *  
 *  @version	v0.1
 *  
 *  @license GPL
  * @license http://opensource.org/licenses/gpl-license.php GNU Public License
  * 
 */


 Class WebApiController extends ApiLayer {
	private $_xmlAppConfig;
	private $_model;
	private $_action;
	private $_key;
	
 	
	private $_modelName;
	private $_actionName;
	
	private $_modelObject;
	public $restApiObject;
	
 	/*
 	 * Constructor
 	 * 
 	 */ 
 	
 	function __construct($mod,$act,$key) {
 		parent::__construct();
 		$this->_xmlAppConfig = XMLCONF;
 		$this->_model = $mod;
 		$this->_action = $act;
 		$this->_key = $key;
 	}
 	
 	function restApiCall() {
 		$dom = new DomDocument;
 		$dom->load($this->_xmlAppConfig);
 		
 		$this->restApiObject = $dom->getElementById($this->_model);
 		if($this->restApiObject) {
 			$responseObject = $this->restApiObject->getElementsByTagName("responseObject");
 			$this->_modelName = $responseObject->item(0)->getAttribute("model");
 			$this->_actionName = $responseObject->item(0)->getAttribute($this->_action);
 			$this->includeClassFile($this->_modelName);
				
 			$this->_modelObject = new $this->_modelName();
 			
 			switch($this->method) {
 				case 'DELETE':
 				case 'POST':
 					$this->_modelObject->setPostData($this->requestbody);
 					break;
 				case 'GET':
 					$this->_modelObject->setModelId($this->_key);
 					break;
 				default:
 					$this->methodNotExist($this->method);
 					break;
 			}
 			$this->responseText = call_user_func(array($this->_modelObject, $this->_actionName));
 			$this->httpStatusCode = "200";
 			$this->responseCode = "PRDUSER001";
 			$this->jsob_encoded_response();
 		} else {
 			$this->methodNotExist($this->_model);
 		}
 	}
 	
 	/*
 	 * 
 	 * 
 	 * 
 	 */
 	
 	function includeClassFile($classname) {
 		$classFileName = ROOTDIR . "/". "api/model/".$classname.".php" ;
 		if(file_exists($classFileName)) {
 			require_once($classFileName);
 		}else {
 			$this->modelNotExist($classname);	
 		}
 	}
 	
 	function __destruct() {
 		
 	}
 	
	
}


?>