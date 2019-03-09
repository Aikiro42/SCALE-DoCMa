<?php

	/*
	
	This returns data.
	
	Called by per_delete_activity_item_handler.js
	
	*/

	include('../session.php');
	include('../ChromePhp.php');
	
	$activity_id = $_POST['activity_id'];

	$query = 'SELECT * FROM ActivityUserAssoc WHERE activity_id = ' . $activity_id;
	$result = mysqli_query($dbc, $query);
	$queryresult = mysqli_fetch_array($result);
	$queryresult = strlen($queryresult);
	ChromePhp::log('[test_activity_user_assoc_for_activity.php][1]: $queryresult = ' . $queryresult);
	ChromePhp::log('[test_activity_user_assoc_for_activity.php][2]: strlen($queryresult); -> ' . strlen($queryresult));
	ChromePhp::log('[test_activity_user_assoc_for_activity.php][3]: $queryresult = ' . $queryresult);
	if($queryresult == 0){
		echo 'Warning: No user is associated with this activity.';
		ChromePhp::log('[test_activity_user_assoc_for_activity.php]: Warning: No user is associated with this activity.');
	}
	ChromePhp::log('[test_activity_user_assoc_for_activity.php]: Console log!');

?>