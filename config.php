<?php

//initialize MySQL Connection Variables

$deploy_test = True;

if($deploy_test){
	include('cleardb-config.php');
}else{
	DEFINE('DB_USER','root');
	DEFINE('DB_PASSWORD','13-01104');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_NAME', 'scale');

	$host="localhost";
	$username="root";
	$password="13-01104";
	$dbname="scale";

	//establish MySQL Connection

	$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
}
?>