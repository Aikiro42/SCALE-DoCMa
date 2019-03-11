<?php

include('../config.php');
include('../ChromePhp.php');
session_start();
$form_id = $_POST['form_id'];
$pending_response = $_POST['pending_response'];

$query = 'UPDATE Forms SET approved = \''.$pending_response.'\' WHERE Forms.form_id = ' . $form_id;
$result = mysqli_query($dbc, $query) or die(function(){
	ChromePhp::log('waaah');
});

?>