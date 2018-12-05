<?php

	include('../config.php');

	$form_id = $_POST['form_id'];
	$query = "SELECT * FROM Versions WHERE form_id = ".$form_id;
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result)){
		$file_path = $row['version_directory'];
		unlink("../".$file_path);
	}
	
	
	$query = "DELETE FROM Forms WHERE form_id = ".$form_id;
	$result = mysqli_query($dbc, $query);
	$query = "DELETE FROM Versions WHERE form_id = ".$form_id;
	$result = mysqli_query($dbc, $query);

?>

