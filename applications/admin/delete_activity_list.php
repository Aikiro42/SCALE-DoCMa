<?php

	
include('../../config.php');
include('../../ChromePhp.php');
session_start();

ChromePhp::log('Broadcasting from delete_activitty.php');

$search = '';

ChromePhp::log(strlen($search));

if(isset($_POST)){
	$search = $_POST['search'];
}

$query = "SELECT * FROM Activities ORDER BY activity_name";
$result = mysqli_query($dbc, $query);

while($row = mysqli_fetch_array($result)){
	
	$activity_name = $row['activity_name'];
	$activity_id = $row['activity_id'];
	
	$activity_type = $row['activity_type'];
	$activity_description = $row['activity_description'];
	$activity_objectives = $row['activity_objectives'];
	
	$strand_service = $row['strand_service'];
	$strand_creativity = $row['strand_creativity'];
	$strand_action = $row['strand_action'];
	$strand_leadership = $row['strand_leadership'];

	$strand_list = '';

	if($strand_service){
		$strand_list .= '<li>Service</li>';
	}
	if($strand_creativity){
		$strand_list .= '<li>Creativity</li>';
	}
	if($strand_action){
		$strand_list .= '<li>Action</li>';
	}
	if($strand_leadership){
		$strand_list .= '<li>Leadership</li>';
	}
	
	
	$sub_query = 'SELECT * FROM Outcomes';
	$sub_result = mysqli_query($dbc, $sub_query);
	
	$outcome_list = '';
	
	while($sub_row = mysqli_fetch_array($sub_result)){
		if($row['outcome_' . $sub_row['outcome_id']]){
			$outcome_list .= '<li>'.$sub_row['outcome_name'].'</li>';
		}
	}
	
	$sub_query = 'SELECT * FROM ActivityProgress WHERE activity_id = ' . $activity_id;
	$sub_result = mysqli_query($dbc, $sub_query);
	$sub_row = mysqli_fetch_array($sub_result);
	$activity_status = $sub_row['activity_status'];
	
	
	$echo_item = '
				<div class="admin_activity_item">
					<div class="activity_info_dropper_button">
						<p class="activity_id">'.$activity_id.'</p>
						<h2 class="activity_name">'.$activity_name.'</h2>
					</div>
					<div class="activity_info">
						<hr />
						<span class="warning"></span>
						<p>
							<span class="activity_info_label">Activity Status: </span>
							'.$activity_status.'
						</p>
						<p>
							<span class="activity_info_label">Activity Type: </span>
							'.$activity_type.'
						</p>
						<p>
							<span class="activity_info_label">Activity Description: </span>
							'.$activity_description.'
						</p>
						<p>
							<span class="activity_info_label">Activity Objectives: </span>
							'.$activity_objectives.'
						</p>
						<div class="activity_info_strand_list_container">
							<span class="activity_info_label">Targeted Strands: </span>
							<ul class="activity_info_strand_list">
								'.$strand_list.'
							</ul>
						</div>
						<div class="activity_info_outcome_list_container">
							<span class="activity_info_label">Targeted Objectives: </span>
							<ul class="activity_info_outcome_list">
								'.$outcome_list.'
							</ul>
						</div>
						<span class="warning"></span>
						<div class="delete_button">Delete</div>
					</div>
					<div class="clear"></div>
				</div>
			';
	
	//That's a lotta variables!
	
	if(strlen($search) > 0){
		if(strpos(strtolower($name), strtolower($search)) !== false){
			echo $echo_item;
		}
	}else{
		echo $echo_item;
	}
	
	
}


?>

<script src="js/module/submodule/admin/per_delete_activity_item_handler.js"></script>