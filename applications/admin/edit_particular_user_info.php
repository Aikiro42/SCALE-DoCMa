<?php

	include('../../config.php');
	include('../../ChromePhp.php');
	
	$user_id = $_POST['user_id'];
	$alter_column = $_POST['alter_column'];
	$new_value = $_POST['new_value'];
	
	ChromePhp::log("[edit_particular_user_info.php]:".$user_id);
	ChromePhp::log("[edit_particular_user_info.php]:".$alter_column);
	ChromePhp::log("[edit_particular_user_info.php]:".$new_value);
	
	if($alter_column == 'username' || $alter_column == 'password'){
		$query = 'UPDATE Users SET '.$alter_column.' = \''.$new_value.'\' WHERE user_id = '.$user_id;
	}else{
		$query = 'UPDATE Persons SET '.$alter_column.' = \''.$new_value.'\' WHERE user_id = '.$user_id;
	}
	
	$result = mysqli_query($dbc, $query) or die('[edit_particular_user_info.php]:Error updating tables.');
	
?>