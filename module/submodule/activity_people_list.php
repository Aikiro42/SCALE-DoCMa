<?php

	include('../../config.php');
	include('../../ChromePhp.php');
	session_start();
	
	ChromePhp::log('Broadcasting from scale/module/submodule/activity_people_list.php');
	$is_admin = $_SESSION['ual_id'] == 1;
	//get activity type - indiv or group?
	$activity_type = $_POST['activity_type'];
	$search = $_POST['search'];
	$curr_activity_id = $_POST['activity_id'];
	//check if it is group activity
	$is_group_activity = ($activity_type == 'Group');
	
	$query = 'SELECT * FROM Persons WHERE user_id != '.$_SESSION['user_id'].' ORDER BY lastName';
	
	if($is_admin){
		$query = 'SELECT * FROM Persons ORDER BY lastName';
	}
	
	$result = mysqli_query($dbc, $query);
	
	while($row = mysqli_fetch_array($result)){
				
		//check if person is associated with activity
		$is_associated = false;
		
		$sub_query = 'SELECT * FROM ActivityUserAssoc WHERE user_id = ' . $row['user_id'];
		$sub_result = mysqli_query($dbc, $sub_query);
		while($sub_row = mysqli_fetch_array($sub_result)){
			if($sub_row['activity_id'] == $curr_activity_id){
				$is_associated = true;
				break;
			}
		}
		
		//get name
		$name = $row['lastName'] . ', ' . $row['firstName'];
		
		//get ual_id
		$sub_query = 'SELECT * FROM Users WHERE user_id = ' . $row['user_id'];
		$sub_result = mysqli_query($dbc, $sub_query);
		$sub_row = mysqli_fetch_array($sub_result);
		$ual_id = $sub_row['ual_id'];
		
		//get ual_name
		$sub_query = 'SELECT * FROM UserAccessLevels WHERE ual_id = ' . $ual_id;
		$sub_result = mysqli_query($dbc, $sub_query);
		$sub_row = mysqli_fetch_array($sub_result);
		$ual_name = $sub_row['name'];
		
		$is_not_student = $ual_id < 4;
		
		$echo_person = true;
		if(!$is_group_activity){
			$echo_person = $is_not_student;
		}
		
		if(strpos(strtolower($name), strtolower($search)) && !$is_associated && $echo_person){
			
			if($is_group_activity){
			
				$additional_options = '
					<label class="custom_radio_container">Leader
						<input type="radio" id="aff_leader" name="aff_id" value="5" />
						<span class="custom_radio"></span>
					</label>
					
					<label class="custom_radio_container">Member
						<input type="radio" id="aff_member" name="aff_id" value="6" />
						<span class="custom_radio"></span>
					</label>
				';
				
			}else{
				$additional_options = '';
			}
			
			
			echo '
			
			<div class="add_people_item">
				<input type="hidden" id="user_id" value="'.$row['user_id'].'" />
				<h3 class="add_people_item_button">'.$name.'<span class="ual_name">'.$ual_name.'</span></h3>
				<div class="affiliation_cont">
				
					<label class="custom_radio_container">Supervisor
						<input type="radio" id="aff_supervisor" name="aff_id" value="1" />
						<span class="custom_radio"></span>
					</label>
					
					<label class="custom_radio_container">Adviser
						<input type="radio" id="aff_adviser" name="aff_id" value="2" />
						<span class="custom_radio"></span>
					</label>
					
					<label class="custom_radio_container">Coach
						<input type="radio" id="aff_coach" name="aff_id" value="3" />
						<span class="custom_radio"></span>
					</label>
					
					<label class="custom_radio_container">Financer
						<input type="radio" id="aff_financer" name="aff_id" value="4" />
						<span class="custom_radio"></span>
					</label>
					'.$additional_options.'
					<div class="adding_person_notif">Adding...</div>
					<div class="add_person_button">Add</div>
				</div>
			</div>
			';
			
		}
		
				
	}

	
		
?>

<script src="js/module/submodule/per_add_person_item_handler.js"></script>