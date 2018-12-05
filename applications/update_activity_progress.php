<?php

	include('../config.php');
	include('../ChromePhp.php');
	
	ChromePhp::log('Broadcasting from scale/applications/update_activity_progress.php');
	
	$column = $_POST['update_string'] . '_achieved';
	$activity_id = $_POST['activity_id'];
	
	//Get column property
	$query = 'SELECT '.$column.' FROM ActivityProgress WHERE activity_id = ' . $_POST['activity_id'];
	$result = mysqli_query($dbc, $query);
	$prev_val = mysqli_fetch_array($result)[$column];
	$new_val = false;
	
	ChromePhp::log('Previous Value: ' . $prev_val);
	
	if($prev_val){
		$new_val = 0;
	}else{
		$new_val = 1;
	}
	
	ChromePhp::log('New Value: ' . $new_val);
	
	$query = 'UPDATE ActivityProgress SET '.$column.' = '.$new_val.' WHERE activity_id = ' . $activity_id;
	$result = mysqli_query($dbc, $query);
	
	ChromePhp::log('Broadcast end.');

?>