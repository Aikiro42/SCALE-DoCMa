<?php

	include('ChromePhp.php');

	ChromePhp::log('Broadcasting from scale/submit.php');
	
	$filename = $_FILES['uploaded_file']['name'];
	$filename_temp = $_FILES['uploaded_file']['tmp_name'];
	$activity_id = $_POST['activity_id'];
	$formtype_id = $_POST['formtype_id'];
	// echo $activity_id . ' ' . $formtype_id . ' ' . $filename;
	
	ChromePhp::log('filename' . $filename);
	ChromePhp::log('filename_temp' . $filename_temp);
	ChromePhp::log(echo 'activity_id: ' . $activity_id);
	ChromePhp::log('formtype_id: ' . $formtype_id);

	ChromePhp::log('Broadcast end.');
	
?>