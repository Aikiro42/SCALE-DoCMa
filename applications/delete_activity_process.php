<?php

	include('../config.php');
	
	$activity_id = $_POST['activity_id'];
	
	//unlink files of forms associated with activity
	//then delete entries of those files.
	$query = 'SELECT * FROM Forms WHERE activity_id = ' . $activity_id;
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result)){
		$form_id = $row['form_id'];
		$sub_query = "SELECT * FROM Versions WHERE Versions.form_id = ".$form_id;
		$sub_result = mysqli_query($dbc, $query);
		while($row = mysqli_fetch_array($result)){
			$file_path = $row['version_directory'];
			unlink("../".$file_path);
		}
		$sub_query = "DELETE FROM Forms WHERE Forms.form_id = ".$form_id;
		$sub_result = mysqli_query($dbc, $query);
		$sub_query = "DELETE FROM Versions WHERE Versions.form_id = ".$form_id;
		$sub_result = mysqli_query($dbc, $query);
	}
	
	//delete entries in ActivityUserAssoc where activity_id matches.
	//This will de-involve any and all personell associated with the activity.
	$query = 'SELECT * FROM ActivityUserAssoc WHERE activity_id = ' . $activity_id;
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result)){
		$sub_query = "DELETE FROM ActivityUserAssoc WHERE ActivityUserAssoc.user_id = ".$row['user_id'];
		$sub_result = mysqli_query($dbc, $query);
	}
	
	//delete entry in activity_progress
	$query = "DELETE FROM ActivityProgress WHERE activity_id = ".$activity_id;
	$result = mysqli_query($dbc, $query);
	
	//delete activity from table
	$query = "DELETE FROM Activities WHERE activity_id = ".$activity_id;
	$result = mysqli_query($dbc, $query);

?>