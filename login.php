<?php

	include('config.php');

	$bad_username = false;
	$bad_password = false;
	$username_error = "";
	$password_error = "";
	if(isset($_POST['submit'])){
			
		if(isset($_POST['username']) && isset($_POST['password'])){
			$query = "SELECT * FROM Users";
			$result = mysqli_query($dbc, $query);
			$login_result = false;
			while($row = mysqli_fetch_array($result)){
				if($username == $row['username'] && $password == $row['password']){
					$login_result = true;
					break;
				}
			}
			
			if($login_result){
				//Set session names here
				session_save_path('\tmp');
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['ual_id'] = $row['ual_id'];
				header("Location: localhost/main.php"); /* Redirect browser */
				exit();
			}else{
				header("Location: localhost/index.php");
			}
			
		}else{
			if(!isset($_POST['username'])){
				$username_error = "Please enter your username.";
			}
			if(!isset($_POST['password'])){
				$password_error = "Please enter your password.";
			}
		}
	}

?>

