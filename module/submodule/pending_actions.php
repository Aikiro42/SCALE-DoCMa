<h1>Pending Actions</h1>
<div id="pendingActions">
<p id="refresh_pending_actions">Refresh</p>
<script src="js/module/submodule/refresh_pending_actions_handler.js"></script>

	<!--
	<div class="pending_item">
		<h2 class="pending_name">Activity X</h2>
		<p class="pending_type">Activity</p>
		<div class="deny_button">Deny</div>
		<div class="approve_button">Approve</div>
		<div class="view_button">View</div>
		<div class="clear"></div>
	</div>
	-->
	
	<?php
		
		include('../../config.php');
		include('../../ChromePhp.php');
		session_start();
		
		//for each associated activity
		$query = "SELECT * FROM ActivityUserAssoc WHERE ActivityUserAssoc.user_id = ".$_SESSION['user_id'];
		$result = mysqli_query($dbc, $query);
		while($row = mysqli_fetch_array($result)){
			$form_name = $form_type= '';
			$activity_id = $row['activity_id'];
			
			//for each pending form in each activity
			$sub_query = "SELECT * FROM Forms WHERE Forms.approved = 'pending' AND Forms.activity_id = ".$row['activity_id'];
			$sub_result = mysqli_query($dbc, $sub_query);
			while($sub_row = mysqli_fetch_array($sub_result)){
				$formName = $sub_row['formName'];
				$form_id = $sub_row['form_id'];
				
				//get form type name
				$sub_sub_query = "SELECT * FROM FormTypes WHERE FormTypes.formtype_id = ".$sub_row['formtype_id'];
				$sub_sub_result = mysqli_query($dbc, $sub_sub_query);
				$sub_sub_row = mysqli_fetch_array($sub_sub_result);
				$form_type = $sub_sub_row['typeName'];
				
				//get latest updated version
				$sub_sub_query = "SELECT * FROM Versions WHERE Versions.form_id = ". $form_id . " ORDER BY Versions.version_id DESC";
				$sub_sub_result = mysqli_query($dbc, $sub_sub_query);
				$sub_sub_row = mysqli_fetch_array($sub_sub_result);
				$version_id = $sub_sub_row['version_id'];
				$version_dir = $sub_sub_row['version_directory'];
				
				echo '<div class="pending_item">
						<h2 class="pending_name">'.$formName.'</h2>
						<p class="pending_type">'.$form_type.'</p>
						<p>Version: '.$version_id.'</p>
						<input type="hidden" id="eval_form_id" value="'.$form_id.'" />
						<div class="deny_button">
							Deny
							<input type="hidden" id="response_val" value="false" />
						</div>
						<div class="approve_button">
							Approve
							<input type="hidden" id="response_val" value="true" />
						</div>
						<a class="download_button" href="'.$version_dir.'">Download</a>
						<div class="clear"></div>
					</div>';
			}
			
		}
	?>

<script src="js/module/submodule/per_pending_response_handler.js"></script>
</div>