<?php
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
define('APP_DEBUG',True);
define('_PHP_FILE_', $_SERVER['SCRIPT_NAME']);
require  __DIR__ . '/ThinkPHP/ThinkPHP.php';

