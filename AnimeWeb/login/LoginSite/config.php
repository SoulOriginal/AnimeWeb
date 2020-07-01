<?php
session_start();

define('dbhost', '127.0.0.1');
define('dbuser', 'mysql');
define('dbpass', 'mysql');
define('dbname', 'login');
try {
	$connect = new mysqli(dbhost, dbuser, dbpass, dbname);
}
catch(PDOException $e) {
	echo $e->getMessage();
}

?>
