<?php

	include('../config.php');
	session_start();
	
	$user_id_check = $_POST['user_id_check'];
	$ret = 'false';
	
	$query = "SELECT user_id FROM Users";
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result)){
		if($row['user_id'] == (int)$user_id_check){
			$ret = 'true';
		}
	}
	echo $ret;

?>