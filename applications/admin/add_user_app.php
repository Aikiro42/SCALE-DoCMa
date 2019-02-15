<?php
	include('../../config.php');
	include('../../ChromePhp.php');
	
	ChromePhp::log('Broadcasting from scale/applications/admin/add_user_app.php');

	ChromePhp::log('Starting session...');
	session_start();
	ChromePhp::log('Session Started.');

	ChromePhp::log('Retrieving info from $_POST...');
	$username = $_POST['username'];
	$password = $_POST['password_var'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$ual_id = $_POST['ual_id'];
	$mobile_number = $_POST['mobile_number'];
	$residency_address = $_POST['residency_address'];
	$autogen_id = $_POST['auto_id'];

	if($autogen_id){
		$user_id = time();
	}else{
		$user_id = $_POST['user_id'];
	}

	$profile_pic = $_POST['profile_pic'];
	ChromePhp::log('Data retrieved.');

	ChromePhp::log('Inserting into table USERS...');
	$query = 'INSERT INTO Users VALUES('.$user_id.',"'.$username.'","'.$password.'","'.$profile_pic.'",'.$ual_id.')';
	mysqli_query($dbc, $query) or die(ChromePhp::log('Insertion error'));
	ChromePhp::log('Insertion complete.');

	ChromePhp::log('Inserting into table PERSONS...');
	$query = 'INSERT INTO Persons VALUES('.$user_id.', "'.$firstName.'", "'.$lastName.'", "'.$email.'", '.$mobile_number.',"'.$residency_address.'")';
	mysqli_query($dbc, $query) or die(function(){ChromePhp::log('Something happened.');});
	ChromePhp::log('Insertion complete.');

	ChromePhp::log('Broadcast end.');


?>
