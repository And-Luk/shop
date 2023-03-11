<?php
define("DATABASE_HOST","localhost");
define("DATABASE_USERNAME","root");
define("DATABASE_PASSWORD","Rasmus");
define("DATABASE_NAME","shop");

define("SITE_ROOT", "/users/and/www/shop/");

$appname = (string)" тестовый сайт ";
$userstr = (string)' GUEST ';
$app = (string)$appname;
//$page_title ='';

 // Set up debug mode
define("DEBUG_MODE", true);

// Error reporting
if (DEBUG_MODE) {
   error_reporting(E_ALL);
} else {
// Turn off all error reporting
 error_reporting(0);
}