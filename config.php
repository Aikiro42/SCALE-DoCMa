<?php

// $deploy_test = 1;

// if($deploy_test){
	// include('cleardb-config.php');
// }else{
	// DEFINE('DB_USER','root');
	// DEFINE('DB_PASSWORD','13-01104');
	// DEFINE('DB_HOST', 'localhost');
	// DEFINE('DB_NAME', 'scale');

	// $host="localhost";
	// $username="root";
	// $password="13-01104";
	// $dbname="scale";


	// $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
	// OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
// }

//initialize MySQL Connection Variables

<<<<<<< HEAD
	DEFINE('DB_USER','b37bbc2c9689ea');
	DEFINE('DB_PASSWORD','43a055bf');
	DEFINE('DB_HOST', 'us-cdbr-gcp-east-01.cleardb.net');
	DEFINE('DB_NAME', 'gcp_51dd865eb539f6526b03');

//DEFINE('DB_HOST', '192.168.56.103');

$host="us-cdbr-gcp-east-01.cleardb.net";
$username="b37bbc2c9689ea";
$password="43a055bf";
$dbname="gcp_51dd865eb539f6526b03";

//establish MySQL Connection

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

?>