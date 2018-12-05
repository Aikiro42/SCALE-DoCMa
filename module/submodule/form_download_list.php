<h2>Files</h2>

<!--
<div class="form_item" id="sample">
	<p class="form_name"><strong>formName</strong></p>
	<br />
	<p><em>typeName</em></p>
	<p>versionNumber</p>
	<input type="hidden" id="del_form_id" value="form_id" />
	<p class="delete_button">Delete</p>
	
	<a class="download_button" href="formDirectory">Download</a>
	
	
	<form enctype="multipart/form-data" action="submit_version.php" method="post">
		<input type="hidden" id="form_id" name="form_id" value="" />
		<label class="submit_version_button">
			Submit Version
			<input type="file" class="version_upload" />
		</label>
	</form>
	
	<div class="clear"></div>
	
	<div class="version_container">
	</div>
</div>
-->
<?php

	include_once('../../config.php');
	include('../../ChromePhp.php');


	$query = "SELECT * FROM Forms WHERE Forms.activity_id = " . $_POST['activity_id'];
	//$query = "SELECT * FROM Forms";
	$result = mysqli_query($dbc, $query);
	
	$are_there_forms = false;
	
	while($row = mysqli_fetch_array($result)){
		
		$are_there_forms = true;
		
		/*
		echo '<div class="form_item">';
		echo '	<p class="form_name"><strong>'.$row['formName'].'</strong></p>';
		
		$sub_query = "SELECT * FROM Formtypes WHERE formtype_id = " . $row['formtype_id'];
		$sub_result = mysqli_query($dbc, $sub_query);
		$typeName = mysqli_fetch_array($sub_result)['typeName'];
		echo '	<br /><p><em>'.$typeName.'</em></p>';
		echo '	<input type="hidden" id="del_form_id" value="'.$row['form_id'].'" />';
		echo '	<p class="delete_button">Delete</p>';
		echo '	<a class="download_button" href="'.$row['formDirectory'].'">Download</a>';
		echo '	<div class="clear"></div>';
		echo '</div>';
		*/
		
		$sub_query = "SELECT * FROM Formtypes WHERE formtype_id = " . $row['formtype_id'];
		$sub_result = mysqli_query($dbc, $sub_query);
		$typeName = mysqli_fetch_array($sub_result)['typeName'];
		
		$sub_query = "SELECT * FROM Versions WHERE Versions.form_id = " . $row['form_id'] . " ORDER BY Versions.version_id DESC";
		$sub_result = mysqli_query($dbc, $sub_query);
		$sub_row =  mysqli_fetch_array($sub_result);
		$version_id = $sub_row['version_id']; //How to get last row in table?
		$version_dir = $sub_row['version_directory'];
		
		
		$form_status = '<div class="form_status">Status</div>';
		
		if($row['approved'] == 'pending'){
			$form_status = '<div class="form_status" id="pending_status">Pending</div>';
		}else if($row['approved'] == 'true'){
			$form_status = '<div class="form_status" id="approved_status">Approved</div>';
		}else{
			$form_status = '<div class="form_status" id="denied_status">Denied</div>';
		}
		
		
		//ChromePhp::log($version_dir);
		
		echo '<div class="form_item">
		
				<!--Form Status-->
				'.$form_status.'
		
				<!--Visible form information-->
				<p class="form_name"><strong>'.$row['formName'].'</strong></p>
				<br />
				<p><em>'.$typeName.'</em></p>
				<p>Latest Version: '.$version_id.'</p>
				
				<!--Delete button-->
				<input type="hidden" id="del_form_id" value="form_id" />
				<p class="delete_button">Delete</p>
				
				<!--Download Button (soon to be obsolete)-->
				<a class="download_button" href="'.$version_dir.'">Download Latest</a>
				
				<!--Submit version button-->
				<input type="hidden" id="form_id" name="form_id" value="'.$row['form_id'].'" />
				<input type="hidden" id="activity_id" name="activity_id" value="'.$row['activity_id'].'" />
				<form enctype="multipart/form-data" action="submit.php" method="post">
					
					<!--Hidden values-->
					<input type="hidden" id="formtype_id" name="formtype_id" value="'.$row['formtype_id'].'" />
					
					<label class="submit_version_button">
						Submit Version
						<input type="file" class="version_upload" name="uploaded_file" />
					</label>
				</form>
				
				<div class="version_list_button">Version List</div>
				
				<div class="clear"></div>
				
				<!--Slide-down version list-->
				<div class="version_list">
				
				
				
				</div>
			</div>
			';
	}
	
	if(!$are_there_forms){
		echo '
		
		<h3 class="no_submitted_form_error">There are no forms are available for downloading</h3>
		
		
		';
	}
	

	
?>

<div id="debug_block"></div>
<script src="js/module/submodule/upload_version.js"></script>
<script src="js/module/submodule/version_list.js"></script>
<script src="js/module/submodule/form_download_list.js"></script>


