<?php 

//errors
error_reporting(E_ALL);
ini_set("display_errors", 1);

// database
define('DB_ENGINE', 'mysql');
define('DB_HOST', 'us-cdbr-east.cleardb.com');
define('DB_NAME', 'heroku_28c9e48fb74474b');
define('DB_USER', 'bac0adfed3e195');
define('DB_PW', '2c56bf62');

// includes
require('functions.php');
require('user.class.php');

?>