<?php

	//	activity_status ENUM('Preparation Stage','Approved for Implementation','Undergoing Validation','Completed','Aborted') DEFAULT 'Preparation Stage',

	include('../config.php');
	include('../ChromePhp.php');
	
	ChromePhp::log('Broadcasting from scale/applications/update_activity_status.php');
	
	$activity_status = $_POST['activity_status'];
	$activity_id = $_POST['activity_id'];
	
	$query = 'UPDATE ActivityProgress SET activity_status = \''.$activity_status.'\' WHERE activity_id = ' . $activity_id;
	$result = mysqli_query($dbc, $query);
	
	ChromePhp::log('Broadcast end.');

?>