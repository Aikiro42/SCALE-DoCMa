<?php

	include('../config.php');
	session_start();
	
	$entry_info = $_POST['entry_info'];
	$entry_id = time();
	
	//insert into table
	$query = 'INSERT INTO AuditTrailLog VALUES ('.$entry_id.', "'.$entry_info.'")';
	mysqli_query($dbc, $query);
	echo '['.$entry_id.'] :: ' . $entry_info;
?>