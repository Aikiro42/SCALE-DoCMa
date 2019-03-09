<?php

	include('../config.php');
	session_save_path('../tmp');
	session_start();
	
	$query = "SELECT * FROM Versions";

?>