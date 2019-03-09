<h1>Affiliations</h1>
<!--assoc_activities.php-->
<div id="AssocActivities">
<p id="refresh_assoc_activities">Refresh</p>
<script src="js/module/submodule/refresh_assoc_activities_handler.js"></script>

	<?php
	

	include('../../config.php');
	include('../../ChromePhp.php');
	
	ChromePhp::log('Broadcasting from scale/module/submodule/assoc_activities.php');
	
	session_start();
	
	//4294967295 = largest base 32 number
	//4294967296 = 2^32
	
	$query = "SELECT * FROM ActivityUserAssoc WHERE ActivityUserAssoc.user_id = ".$_SESSION['user_id'];
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result)){
		$activity = $affiliation = '';
		$activity_id = $row['activity_id'];
		$sub_query = "SELECT * FROM Activities WHERE Activities.activity_id = " . $activity_id;
		$sub_result = mysqli_query($dbc, $sub_query);
		while($sub_row = mysqli_fetch_array($sub_result)){
			$activity = $sub_row['activity_name'];
		}
		
		$sub_query = "SELECT * FROM Affiliations WHERE Affiliations.aff_id = " . $row['aff_id'];
		$sub_result = mysqli_query($dbc, $sub_query);
		while($sub_row = mysqli_fetch_array($sub_result)){
			$affiliation = $sub_row['aff_name'];
		}
		
		$progress_checklist_button_element = '';
		
		if($_SESSION['ual_id'] == 2 || $_SESSION['ual_id'] == 1){
			$progress_checklist_button_element = '<div class="standard_button progress_checklist_button">Progress Checklist</div>';
		}
		
		echo '
		
			<div class="aff">
				'.$progress_checklist_button_element.'
				<div class="standard_button manage_button">Manage</div>
				<div class="standard_button more_info_button">More Info</div>
				<h2>'.$activity.'</h2>
				<p>'.$affiliation.'</p>
				<div id="activity'.$activity_id.'" class="sub_module_container"></div>
				<input class="activity_id" type="hidden" value="'.$activity_id.'" />
				<div class="clear"></div>
			</div>
		
		';
	}

	ChromePhp::log('Broadcast end.');
	
	?>
<script src="js/module/submodule/per_activity_button_handler.js"></script>
</div>