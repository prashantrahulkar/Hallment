<?php 

/*
 * Include configuration File
 * 
 */
$rqStr = $_GET["rqstring"];

include_once("config.properties.php");
/*
 *  Input validaton 
 */

$valObject =  new ValidationLayer($rqStr);
$valObject->apiQSvalidate();

$restApi = new WebApiController($valObject->model,$valObject->action,$valObject->id);
$restApi->restApiCall();




?>