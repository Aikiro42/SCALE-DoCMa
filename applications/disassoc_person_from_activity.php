<?php

	include('../config.php');
	session_start();
	
	$user_id = $_POST['user_id'];
	$activity_id = $_POST['activity_id'];
	
	$query = 'DELETE FROM ActivityUserAssoc WHERE activity_id = ' . $activity_id . ' AND user_id = ' . $user_id;
	$result = mysqli_query($dbc, $query);

?>