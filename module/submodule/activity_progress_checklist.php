<?php

	include('../../config.php');
	include('../../ChromePhp.php');
	
?>

<div class="subModuleWrapper">
	
	<input type="hidden" id="this_interface" value="progress" />
	
	<!--this is bad code-->
	<!--set js variables for auto updating upon clicking on checkboxes-->
	<script>
		var achieve_activity_id = <?php echo $_POST['activity_id']; ?>;
	</script>
	
		<?php
		
		$sub_query = 'SELECT * FROM ActivityProgress WHERE activity_id = ' . $_POST['activity_id'];
		$sub_result = mysqli_query($dbc, $sub_query);
		$sub_row = mysqli_fetch_array($sub_result);
		
		$activity_query = 'SELECT * FROM Activities WHERE activity_id = ' . $_POST['activity_id'];
		$activity_result = mysqli_query($dbc, $activity_query);
		$activity_row = mysqli_fetch_array($activity_result);
		
		$service_checked = '';
		$creativity_checked = '';
		$action_checked = '';
		$leadership_checked = '';
		
		if($sub_row['service_achieved']){
			$service_checked = 'checked';
		}
		if($sub_row['creativity_achieved']){
			$creativity_checked = 'checked';
		}
		if($sub_row['action_achieved']){
			$action_checked = 'checked';
		}
		if($sub_row['leadership_achieved']){
			$leadership_checked = 'checked';
		}
		
		
		
		?>
		
	<div id="strand_progress">
		<h2>Achieved Strands:</h2>
		<?php
		
		if($activity_row['strand_service']){
			echo '
			
			<label class="custom_checkbox_container">Service
				<input type="checkbox" name="achieved_strands" value="service" '.$service_checked.'>
				<span class="custom_checkbox"></span>
			</label>
			
			';
		}
		
		if($activity_row['strand_creativity']){
			echo '
			
			<label class="custom_checkbox_container">Creativity
				<input type="checkbox" name="achieved_strands" value="creativity" '.$creativity_checked.'>
				<span class="custom_checkbox"></span>
			</label>
			
			';
		}
		
		if($activity_row['strand_action']){
			echo '
			
			<label class="custom_checkbox_container">Action
				<input type="checkbox" name="achieved_strands" value="action" '.$action_checked.'>
				<span class="custom_checkbox"></span>
			</label>
			
			';
		}
		
		if($activity_row['strand_leadership']){
			echo '
			
			<label class="custom_checkbox_container">Leadership
				<input type="checkbox" name="achieved_strands" value="leadership" '.$leadership_checked.'>
				<span class="custom_checkbox"></span>
			</label>
			
			';
		}
		
		
		?>
	</div>

	<div id="outcome_progress">
		<h2>Achieved Outcomes:</h2>
		
		<?php
		
			$query = 'SELECT * FROM Outcomes';
			$result = mysqli_query($dbc, $query);
			while($row = mysqli_fetch_array($result)){
				
				$outcome_id = $row['outcome_id'];
				$activity_outcome_column = 'outcome_' . $outcome_id;
				
				if($activity_row[$activity_outcome_column]){
					
					$is_checked = '';
					
					if($sub_row['o'.$outcome_id.'_achieved']){
						$is_checked = 'checked';
					}
					
					echo '
					
					<label class="custom_checkbox_container">'.$row['outcome_name'].'
						<input type="checkbox" name="achieved_outcomes" value="o'.$outcome_id.'" '.$is_checked.'>
						<span class="custom_checkbox" ></span>
					</label>
					
					';
				}
				
			}
		
		?>
		
	</div>

	<div class="clear"></div>
	
	<!--this div is for jQuery to pick up. do not erase.-->
	<div id="base"></div>
	
	<script type="text/javascript" src="js/module/submodule/activity_progress_checklist.js"></script>
	
</div>