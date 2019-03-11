
<?php

	include('../../config.php');
	session_start();
	
	$is_admin = $_SESSION['ual_id'] == 1;
	
	$activity_id = $_POST['activity_id'];
	$curr_user_id = $_SESSION['user_id'];
	
	$query = 'SELECT * FROM ActivityUserAssoc WHERE activity_id = ' . $activity_id . ' AND user_id != ' . $curr_user_id;
	if($is_admin){
		$query = 'SELECT * FROM ActivityUserAssoc WHERE activity_id = ' . $activity_id;
	}
	$result = mysqli_query($dbc, $query);
	
	$are_people_associated = false;
	
	while($row = mysqli_fetch_array($result)){
		
		$are_people_associated = true;
		
		//get additional person info
		$sub_query = 'SELECT * FROM Persons WHERE user_id = ' . $row['user_id'];
		$sub_result = mysqli_query($dbc, $sub_query);
		$sub_row = mysqli_fetch_array($sub_result);
		
		$name = $sub_row['lastName'] . ', ' . $sub_row['firstName'];
		
		
		$sub_query = 'SELECT * FROM Affiliations WHERE aff_id = ' . $row['aff_id'];
		$sub_result = mysqli_query($dbc, $sub_query);
		$sub_row = mysqli_fetch_array($sub_result);
		
		$aff_name = $sub_row['aff_name'];
		
		echo '
		
		<div class="assigned_person_item">
			<input type="hidden" id="user_id" value="'.$row['user_id'].'" />
			<div class="unassign_person_button">Unassign person</div>
			
			<h2 class="assigned_person_name">'.$name.'</h2>
			<p class="assigned_person_id">('.$row['user_id'].')</p>
			<p class="assigned_person_affiliation">'.$aff_name.'</p>
		</div>
		
		';
	}
	
	if(!$are_people_associated){
		echo '
		
		<h3 class="no_assoc_person_error">There are no associated persons with this activity aside from you.</h3>
		
		';
	}
	

?>

<script src="js/module/submodule/per_assigned_person_item_handler.js"></script>