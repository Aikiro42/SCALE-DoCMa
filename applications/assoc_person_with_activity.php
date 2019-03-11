<?php

	include('../config.php');
	session_start();
	
	$activity_id = $_POST['activity_id'];
	$user_id = $_POST['user_id'];
	$aff_id = $_POST['aff_id'];
	
	$query = 'INSERT INTO ActivityUserAssoc VALUES ('.$activity_id.', '.$user_id.', '.$aff_id.')';
	$result = mysqli_query($dbc, $query);

?>