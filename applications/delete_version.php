<?php
	
	//What if two people log one version to the database at the same time?
	
	//every time a student deletes a version
	//if the deleted version was a pending one (the latest version in the list)
		//the next latest version will be set to pending (since they were unapproved ever since the deleted version was uploaded)
	//if the deleted version was an approved one
		//warn the student
		//if the student decides to proceed,
			//the next latest version will be set to pending (since they were unapproved ever since the deleted version was uploaded)
			//in other words, there will be a pending fallback
			
			
	include('../config.php');

	$form_id = $_POST['form_id'];
	$version_id = $_POST['version_id'];
	$is_deleted_version_latest = false;
	
	//check if version is latest
	$query = 'SELECT version_id FROM Versions WHERE Versions.form_id = ' . $form_id . ' ORDER BY version_id DESC LIMIT 1';
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
	//if it is, trigger flag
	if($row['version_id'] == $version_id){
		$is_deleted_version_latest = true;
	}
	
	//delete associated file
	$query = 'SELECT * FROM Versions WHERE Versions.form_id = '.$form_id . ' AND Versions.version_id = ' .$_POST['version_id'];
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result)){
		$file_path = $row['version_directory'];
		unlink("../".$file_path);
	}
	//delete row
	$query = 'DELETE FROM Versions WHERE Versions.form_id = '.$form_id . ' AND Versions.version_id = ' .$_POST['version_id'];
	$result = mysqli_query($dbc, $query);
	
	//check if there are any versions of the file left.
	//if none, delete file
	$query = 'SELECT * FROM Versions WHERE Versions.form_id = '.$form_id;
	$result = mysqli_query($dbc, $query);
	if(!mysqli_fetch_array($result)){
		$query = "DELETE FROM Forms WHERE form_id = ".$form_id;
		$result = mysqli_query($dbc, $query);
	}
	
	//check if deleted version was latest
	//if it was, set associated form to pending
	if($is_deleted_version_latest){
		$query = 'UPDATE Forms SET approved = \'pending\' WHERE form_id = ' . $form_id;
		$result = mysqli_query($dbc, $query);
	}
	

?>

