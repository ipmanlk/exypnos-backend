<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mydb');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$link->set_charset("utf8");

// Check connection
if($link === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
