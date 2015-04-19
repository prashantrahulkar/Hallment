<?php

class Models {
	
	
	protected $_dbObject;
	protected $_key;
	protected $_postjsondata;
	
	
	function __construct() {
		$this->_dbObject = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	}
	
	function setPostData($postdata) {
		$this->_postjsondata = json_decode($postdata);
	}
	
	function setModelId($keyid) {
		$this->_key = $keyid;
	}
	
	
}

?>