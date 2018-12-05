<?php

//initialize MySQL Connection Variables

DEFINE('DB_USER','root');
DEFINE('DB_PASSWORD','13-01104');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'scale');

//DEFINE('DB_HOST', '192.168.56.103');

$host="localhost";
$username="root";
$password="13-01104";
$dbname="scale";

//establish MySQL Connection

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

?>