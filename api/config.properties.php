<?php

/*
 *@CONSTANT DEFINATIONS
 *
*/


define("PROJECTDIR","something");
define("ROOTDIR","D:/ConcourseSols/SourceCode/PHP-Source-Code/Hallment");
define("DIR_DATABASE","D:/ConcourseSols/SourceCode/PHP-Source-Code/Hallment/webapisrc/lib/database/");

define("WEBDIR","something");
define("XMLCONF", ROOTDIR."/"."api/web-config.xml");

define("DB_DRIVER", "mysql");
define("DB_HOSTNAME", "localhost"); 
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "tb.dbungleedeal");
define("DB_PREFIX", "gb_");



define("FRAMEWORKNAME","HALLMENT");
define("HALLMENT_VERSION","v1.0");

/*
 * @Class ApiLayer
 * @Class ValidationLayer,
 *
*/

include_once( ROOTDIR. "/" . "webapisrc/lib/db.php");

include_once( ROOTDIR. "/" . "webapisrc/ApiLayer.php");
include_once( ROOTDIR. "/" . "webapisrc/lib/ValidationLayer.php");
include_once( ROOTDIR. "/" . "webapisrc/WebApiController.php");
include_once( ROOTDIR. "/" . "api/model/Models.php");

?>