<?php

//Every time a student uploads a version
//all the previous versions are automatically disapproved

session_save_path("../tmp");
session_start();
include('../config.php');
include('../ChromePhp.php');



$formtype_id = $_POST['formtype_id'];
$activity_id = $_POST['activity_id'];
$form_id = $_POST['form_id'];
$filename = $_FILES['file']['name'];
$filename_temp = $_FILES['file']['name'];
$form_type = mysqli_fetch_array(mysqli_query($dbc,'SELECT * FROM Formtypes WHERE formtype_id = ' . $formtype_id))['typeName'];
$version_id = time();
$file_path = "forms/uploaded/".$activity_id."/".$form_type."/";
$target_path = "../".$file_path;

if(!file_exists($target_path)){
	mkdir($target_path,0777,true);
}

$target_path = $target_path . $version_id . '_' . basename($_FILES['file']['name']);

move_uploaded_file($_FILES["file"]["tmp_name"], $target_path);

$file_path = $file_path . $version_id . '_' . basename($_FILES['file']['name']);

//ChromePhp::log($file_path);

$query = 'INSERT INTO Versions VALUES ('.$version_id.','.$form_id.',\''.$file_path.'\')';
$result = mysqli_query($dbc, $query) or die('what');


//Every time a student uploads a version
//set associated form as pending

$query = 'UPDATE Forms SET Forms.approved = \'pending\' WHERE form_id = ' . $form_id;
$result = mysqli_query($dbc, $query) or die('error updating table "Forms"');


?>