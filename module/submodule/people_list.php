<?php

	
include('../../config.php');
session_start();

$search = ',';

if(isset($_POST)){
	$search = $_POST['search'];
}

$query = "SELECT * FROM persons WHERE persons.user_id != ".$_SESSION['user_id'] . ' ORDER BY lastName';
$result = mysqli_query($dbc, $query);
$name = $user_id = '';

while($row = mysqli_fetch_array($result)){
	//getting data from Persons table
	$name = $row['lastName'] . ', ' . $row['firstName'];
	$user_id = $row['user_id'];
	$email = $row['email'];
	$mobile_number = $row['mobile_number'];
	$residency_address = $row['residency_address'];
	
	//getting data from Users table
	$sub_query = 'SELECT * FROM Users WHERE user_id = ' . $user_id;
	$sub_result = mysqli_query($dbc, $sub_query);
	$sub_row = mysqli_fetch_array($sub_result);
	$username = $sub_row['username'];
	$password = $sub_row['password'];
	$profile_pic = $sub_row['profile_pic'];
	$ual_id = $sub_row['ual_id'];
	
	$sub_query = 'SELECT * FROM UserAccessLevels WHERE ual_id = ' . $ual_id;
	$sub_result = mysqli_query($dbc, $sub_query);
	$sub_row = mysqli_fetch_array($sub_result);
	$ual_name = $sub_row['name'];
	
	$credentials_string = '
						<p>
							<span class="person_info_label">Username: </span>
							'.$username.'
						</p>
						<p>
							<span class="person_info_label">Password: </span>
							'.$password.'
						</p>';
						
	if($_SESSION['ual_id'] > 1){
		$credentials_string = '';
	}
	
	$echo_item = '
				<div class="person_item">
					<img class="person_pic" src="'.$profile_pic.'"></img>
					<p class="user_id">'.$user_id.'</p>
					<h2 class="person_name">'.$name.'</h2>
					<div class="clear"></div>
					<div class="person_info">
						'.$credentials_string.'
						<p>
							<span class="person_info_label">Access Level: </span>
							'.$ual_name.'
						</p>
						<p>
							<span class="person_info_label">Email: </span>
							'.$email.'
						</p>
						<p>
							<span class="person_info_label">Mobile Number: </span>
							'.$mobile_number.'
						</p>
						<p>
							<span class="person_info_label">Residency Address: </span>
							'.$residency_address.'
						</p>
					</div>
					<div class="clear"></div>
				</div>
			';
	
	if(strlen($search) > 0){
		if(strpos(strtolower($name), strtolower($search)) !== false){
			echo $echo_item;
		}
	}else{
		echo $echo_item;
	}
	
}


?>

<script src="js/module/submodule/per_person_item_handler.js"></script>
