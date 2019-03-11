
<?php
	include('../../../config.php');
	session_start();
	
	$query = 'SELECT * FROM Forms';
	$result = mysqli_query($dbc, $query) or die('error retrieving form list');
	while($row = mysqli_fetch_array($result)){
		$sub_query = 'SELECT version_id FROM Versions WHERE form_id = ' . $row['form_id'] . ' ORDER BY version_id DESC LIMIT 1';
		$sub_result = mysqli_query($dbc, $sub_query);
		$sub_row = mysqli_fetch_array($sub_result);
		$version_id = $sub_row['version_id'];
		$activity_id = $row['activity_id'];
		$appropriate_status = '';
		
		if($row['approved'] == 'pending'){
			$appropriate_status = '<div class="status" id="pending">Pending</div>';
		}else if($row['approved'] == 'true'){
			$appropriate_status = '<div class="status" id="approved">Approved</div>';
		}else{
			$appropriate_status = '<div class="status" id="denied">Denied</div>';
		}
		
		echo '
		
		<div class="form_item">
			'.$appropriate_status.'
			<h2 class="form_name">'.$row['formName'].'</h2>
			<p class="form_version">Version ID: '.$version_id.'</p>
			<p class="activity_id">Activity ID: '.$activity_id.'</p>
			<div id="clear"></div>
		</div>
		
		';
		
	}
?>