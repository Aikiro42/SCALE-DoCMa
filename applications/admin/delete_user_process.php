<?php

	include('../../session.php');
	include('../../ChromePhp.php');
	
	$user_id = $_POST['user_id'];
	$curr_user_id = $_SESSION['user_id'];
	
	
	
	ChromePhp::log("[delete_user_process.php][1]:".$user_id);
	ChromePhp::log("[delete_user_process.php][2]:".$curr_user_id);
	ChromePhp::log("[delete_user_process.php][3]:".$curr_user_id == $user_id);
	if($user_id == $curr_user_id){
		ChromePhp::log('Delete user aborted. You can\'t delete yourself... you have so much to live for!');
	}else{
		$query = "DELETE FROM Persons WHERE user_id = " . $user_id;
		$result = mysqli_query($dbc, $query) or die('[delete_user_process.php]:Error deleting user entry from Persons table.');
		$query = "DELETE FROM Users WHERE user_id = " . $user_id;
		$result = mysqli_query($dbc, $query) or die('[delete_user_process.php]:Error deleting user entry from Users table');
		$query = "DELETE FROM ActivityUserAssoc WHERE user_id = " . $user_id;
		$result = mysqli_query($dbc, $query) or die('[delete_user_process.php]:Error deleting activity-user association entry from ActivityUserAssoc table');
	}
?>