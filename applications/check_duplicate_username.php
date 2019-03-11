<?php

	include('../config.php');
	session_start();
	
	$username_check = $_POST['username_check'];
	$ret = 'false';
	
	$query = "SELECT username FROM Users";
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result)){
		if($row['username'] == $username_check){
			$ret = 'true';
		}
	}
	echo $ret;

?>