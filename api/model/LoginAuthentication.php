<?php

/*
 * 
 *@LoginAuthentication : 
 * 
 * 
 */



Class LoginAuthentication extends Models
{
	public $SQLQuery;
	public $SQLQueryResult;
	
	
	function __construct() {
		parent::__construct();
	}

	function getUser() {
		$this->SQLQuery= "select * from ".DB_PREFIX."customer WHERE  customer_id = '".$this->_key."'";
		$this->SQLQueryResult = $this->_dbObject->query($this->SQLQuery);
		return $this->SQLQueryResult->rows;
	}
	
	function addUser() {
		$data = $this->_postjsondata;
		$this->SQLQuery= "INSERT INTO " . DB_PREFIX . "customer SET  
							firstname = '" . $this->_dbObject->escape($data['firstname']) . "', 
							lastname = '" . $this->_dbObject->escape($data['lastname']) . "', 
							email = '" . $this->_dbObject->escape($data['email']) . "', 
							telephone = '" . $this->_dbObject->escape($data['telephone']) . "', 
							salt = '" . $this->_dbObject->escape($salt = substr(md5(uniqid(rand(), true)), 0, 9)) . "', 
							password = '" . $this->_dbObject->escape(sha1($salt . sha1($salt . sha1($data['password'])))) . "', 
							status = '1', date_added = NOW()";
		$this->SQLQueryResult = $this->_dbObject->query($this->SQLQuery);
		return $this->_dbObject->getLastId();
	}
	
	function updateUser() {
		
	}
	
	function deleteUse() {
		
	}
	function __destruct() {
		
	}
	
}

?>