<?php

//initialize MySQL Connection Variables

<<<<<<< HEAD
<<<<<<< HEAD
	DEFINE('DB_USER','b37bbc2c9689ea');
	DEFINE('DB_PASSWORD','43a055bf');
	DEFINE('DB_HOST', 'us-cdbr-gcp-east-01.cleardb.net');
	DEFINE('DB_NAME', 'gcp_51dd865eb539f6526b03');

//DEFINE('DB_HOST', '192.168.56.103');
=======
$deploy_test = True;
>>>>>>> parent of 581f9fc... dwa

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

<<<<<<< HEAD
=======
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

>>>>>>> parent of 7c09f9f... Deployment to Heroku
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
=======
	//establish MySQL Connection
>>>>>>> parent of 581f9fc... dwa

	$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
}
?>