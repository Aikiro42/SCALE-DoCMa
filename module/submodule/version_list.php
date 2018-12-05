<h2>Version List</h2>
<?php

	include('../../config.php');

	$form_id = $_POST['form_id'];
	$activity_id = $_POST['activity_id'];

	
	
	$query = 'SELECT * FROM Versions WHERE Versions.form_id = ' . $form_id . ' ORDER BY version_id DESC';
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result)){
		echo '
		<div class="version_list_item">
			<p class="version_id">Version '.$row['version_id'].'</p>
			<a class="version_download_button" href="'.$row['version_directory'].'">Download</a>
			<div class="version_delete_button">
				<input type="hidden" id="del_form_id" value="'.$form_id.'" />
				<input type="hidden" id="del_version_id" value="'.$row['version_id'].'" />
				Delete
			</div>
			<div class="clear"></div>
		</div>
		';
	}



?>
<script src="js/module/submodule/version_delete.js"></script>
