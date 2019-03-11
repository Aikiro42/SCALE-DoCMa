<?php

	include('../config.php');
	include('../ChromePhp.php');
	
	ChromePhp::log('Broadcasting from scale/applications/add_activity.php');
	
	session_start();
	
	
	//get variables from ajax request;
	
	$activity_id = time();
	
	$user_id = $_SESSION['user_id'];
	
	$activity_name = $_POST['activity_name'];
	$activity_type = $_POST['activity_type'];
	
	$strand_service = $_POST['strand_service'];
	$strand_creativity = $_POST['strand_creativity'];
	$strand_action = $_POST['strand_action'];
	$strand_leadership = $_POST['strand_leadership'];

	$outcome_1 = $_POST['outcome_1'];
	$outcome_2 = $_POST['outcome_2'];
	$outcome_3 = $_POST['outcome_3'];
	$outcome_4 = $_POST['outcome_4'];
	$outcome_5 = $_POST['outcome_5'];
	$outcome_6 = $_POST['outcome_6'];
	$outcome_7 = $_POST['outcome_7'];
	$outcome_8 = $_POST['outcome_8'];
	
	$activity_description = $_POST['activity_description'];
	$activity_objectives = $_POST['activity_objectives'];
	
	//Add Activity to database.
	
	$query = 'INSERT INTO Activities VALUES ('.$activity_id.',\''.$activity_name.'\',\''.$activity_type.'\','.$strand_service.','.$strand_creativity.','.$strand_action.','.$strand_leadership.','.$outcome_1.','.$outcome_2.','.$outcome_3.','.$outcome_4.','.$outcome_5.','.$outcome_6.','.$outcome_7.','.$outcome_8.',\''.$activity_description.'\',\''.$activity_objectives.'\')';
	
	ChromePhp::log($query);
	
	$result = mysqli_query($dbc, $query);
	
	//check if instigator is soloist or leader
	$aff_id = 7;
	if($activity_type == 'Group'){
		$aff_id = 5;
	}
	
	//Associate current user with activity.
	$query = 'INSERT INTO ActivityUserAssoc VALUES ('.$activity_id.','.$user_id.','.$aff_id.')';
	$result = mysqli_query($dbc, $query);
	
	//Add activity progress
	$query = 'INSERT INTO ActivityProgress VALUES('.$activity_id.',"Preparation Stage",false,false,false,false,false,false,false,false,false,false,false,false,false)';
	$result = mysqli_query($dbc, $query);
	
	ChromePhp::log('Broadcast end.');
	
	trail_log('Added an activity.');

?>