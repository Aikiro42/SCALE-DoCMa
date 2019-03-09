
<div class="subModuleWrapper">
<?php

	include('../../config.php');
	include('../../ChromePhp.php');
	session_save_path('../../tmp');
	session_start();
	
	$activity_id =  $_POST['activity_id'];
	$parent_id = $_POST['parent_id'];

	$query = 'SELECT activity_type FROM Activities WHERE activity_id = ' . $activity_id;
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
	$activity_type = $row['activity_type'];
	
	$query = 'SELECT aff_id FROM ActivityUserAssoc WHERE activity_id = ' . $activity_id . ' AND user_id = ' . $_SESSION['user_id'];
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
	$is_leader =  $row['aff_id'] == 5;
	$is_soloist =  $row['aff_id'] == 7;
	ChromePhp::log('Reporting from module/submodule/activity_management.php');
	ChromePhp::log('$is_soloist: ' . $is_soloist);
	ChromePhp::log('1 || 1: ' . (1 || 1));
	
?>
	<!-- for toggling between "more info" and "manage" -->
	<input type="hidden" id="this_interface" value="manage" />
	<script>
		var post_activity_id = "<?php echo $activity_id;?>";
		var post_activity_type = "<?php echo $activity_type?>";
	</script>
	<script src="js/module/submodule/activity_management.js"></script>
	
	<?php
	
		if($is_leader || !$is_soloist){
			echo '
						
				
				<div id="manage_people_container">
					<h2 id="manage_people_button">Manage Involved People</h2>
					<div id="manage_people_content">
					</div>
				</div>
			
			';
		}
	
	?>

	
	<div id="submit_buttons">
		
		<h2>Submit</h2>
		<div class="clear"></div>
		
		<form enctype="multipart/form-data" action="submit.php" method="post">
			<input type="hidden" id="formtype_id" name="formtype_id" value="1" />
			
			<input type="hidden" id="activity_id" name="activity_id" value=<?php echo '"'.$_POST['activity_id'].'"';?> />
			
			<label class="submit_button" id="form_submit">
				Form
				<input type="file" class="file_upload" name="uploaded_file" />
			</label>
		</form>
		
		<form enctype="multipart/form-data" action="submit.php" method="post">
			<input type="hidden" id="formtype_id" name="formtype_id" value="2" />
			
			<input type="hidden" id="activity_id" name="activity_id" value=<?php echo '"'.$_POST['activity_id'].'"';?> />
			
			<label class="submit_button" id="documentation_sumbit">
				Documentation
				<input type="file" class="file_upload" name="uploaded_file" />
			</label>
		</form>
		
		<form enctype="multipart/form-data" action="submit.php" method="post">
			<input type="hidden" id="formtype_id" name="formtype_id" value="3" />
			<input type="hidden" id="activity_id" name="activity_id" value=<?php echo '"'.$_POST['activity_id'].'"';?> />
			<label class="submit_button" id="entry_submit">
				Journal Entry
				<input type="file" class="file_upload" name="uploaded_file" />
			</label>
		</form>
		
		<div class="clear"></div>
	</div>
	
	<div class="form_download_list" id=<?php echo 'form_download_list'.$activity_id; ?>>
	</div>
	
	<!---->
	<script src="js/module/submodule/per_activity_submit_handler.js"></script>
</div>