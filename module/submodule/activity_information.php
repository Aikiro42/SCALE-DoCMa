<!--Called from assoc_activities.php-->

<?php

include('../../config.php');
session_save_path('../../tmp');
session_start();

$sample = false;


?>

<div class="subModuleWrapper">
	<!-- for toggling between "more info" and "manage" -->
	<input type="hidden" id="this_interface" value="info" />
	
	<?php
	
	/*
		<div id="activity_status">
			<h2>Activity Status</h2>
			<div id="activity_status_content">
				<!--Simple list-->
				<?php
					$query = "SELECT activity_status FROM ActivityProgress WHERE activity_id = " . $activity_id;
					$result = mysqli_query($dbc, $query);
					$row = mysqli_fetch_array($result);
					$activity_status = $row['activity_status'];
					echo $activity_status;
				?>
			</div>
		</div>
	
	*/
	
	if($sample){
		echo '
				
				
			<div id="sample">
			
			<h3>Activity ID:</h3>
			<p>activity_id</p>
			
			<h3>Activity Type:</h3>
			<p>activity_type</p>

			<h3>Description:</h3>
			<p>activity_description</p>
			
			<h3>Objective:</h3>
			<p>activity_objectives</p>
			
			<div class="strand_list_container">
				<h3>Strands:</h3>
				<ul>
					<li>Service <div class="achieved_badge"></div></li>
					<li>Creativity <div class="achieved_badge"></div></li>
					<li>Action <div class="achieved_badge"></div></li>
					<li>Leadership <div class="achieved_badge"></div></li>
				</ul>
			</div>
			
			<div class="objective_list_container">
				<h3>Outcomes:</h3>
				<ul>
					<li>Outcome Description 1 <div class="achieved_badge"></div></li>
					<li>Outcome Description 2 <div class="achieved_badge"></div></li>
					<li>Outcome Description 3 <div class="achieved_badge"></div></li>
					<li>Outcome Description 4 <div class="achieved_badge"></div></li>
					<li>Outcome Description 5 <div class="achieved_badge"></div></li>
					<li>Outcome Description 6 <div class="achieved_badge"></div></li>
					<li>Outcome Description 7 <div class="achieved_badge"></div></li>
					<li>Outcome Description 8 <div class="achieved_badge"></div></li>
				</ul>
			</div>
			
			<div class="clear"></div>
			
			</div>
		
		
		';
	}else{
		
		$activity_id = $_POST['activity_id'];
		$query = 'SELECT * FROM Activities WHERE activity_id = ' . $activity_id;
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($result);
		
		$strand_list = '';
		$outcome_list = '';
		
		
		function getOutcomeDesc($dbc, $outcome_id){
			$outcome_query = 'SELECT outcome_name FROM Outcomes WHERE outcome_id = ' . $outcome_id;
			$result = mysqli_query($dbc, $outcome_query);
			$row = mysqli_fetch_array($result);
			
			$outcome_name = $row['outcome_name'];
			
			$outcome_progress_column = 'o'.$outcome_id.'_achieved';
			
			$progress_query = 'SELECT '.$outcome_progress_column.' FROM ActivityProgress WHERE activity_id = ' . $_POST['activity_id'];
			$progress_result = mysqli_query($dbc, $progress_query);
			$progress_row = mysqli_fetch_array($progress_result);
			
			if($progress_row[$outcome_progress_column]){
				$outcome_name .= '<div class="achieved_badge"></div>';
			}
			
			return $outcome_name;
		}
		
		//==============================
		
		$progress_query = 'SELECT * FROM ActivityProgress WHERE activity_id = ' . $_POST['activity_id'];
		$progress_result = mysqli_query($dbc, $progress_query);
		$progress_row = mysqli_fetch_array($progress_result);
		
		$activity_status = $progress_row['activity_status'];
		
		$service_acheived = $creativity_achieved = $action_achieved = $leadership_achieved = '';
		
		//==============================
		
		if($row['strand_service']){
			if($progress_row['service_achieved']){
				$service_acheived = '<div class="achieved_badge"></div>';
			}
			$strand_list .= '<li>Service'.$service_acheived.'</li>';
		}
		if($row['strand_creativity']){
			if($progress_row['creativity_achieved']){
				$creativity_achieved = '<div class="achieved_badge"></div>';
			}
			$strand_list .= '<li>Creativity'.$creativity_achieved.'</li>';
		}
		if($row['strand_action']){
			if($progress_row['action_achieved']){
				$action_achieved = '<div class="achieved_badge"></div>';
			}
			$strand_list .= '<li>Action'.$action_achieved.'</li>';
		}
		if($row['strand_leadership']){
			if($progress_row['leadership_achieved']){
				$leadership_achieved = '<div class="achieved_badge"></div>';
			}
			$strand_list .= '<li>Leadership'.$leadership_achieved.'</li>';
		}
		
		if($row['outcome_1']){
			$outcome_list .= '<li>'.getOutcomeDesc($dbc, 1).'</li>';
		}
		if($row['outcome_2']){
			$outcome_list .= '<li>'.getOutcomeDesc($dbc, 2).'</li>';
		}
		if($row['outcome_3']){
			$outcome_list .= '<li>'.getOutcomeDesc($dbc, 3).'</li>';
		}
		if($row['outcome_4']){
			$outcome_list .= '<li>'.getOutcomeDesc($dbc, 4).'</li>';
		}
		if($row['outcome_5']){
			$outcome_list .= '<li>'.getOutcomeDesc($dbc, 5).'</li>';
		}
		if($row['outcome_6']){
			$outcome_list .= '<li>'.getOutcomeDesc($dbc, 6).'</li>';
		}
		if($row['outcome_7']){
			$outcome_list .= '<li>'.getOutcomeDesc($dbc, 7).'</li>';
		}
		if($row['outcome_8']){
			$outcome_list .= '<li>'.getOutcomeDesc($dbc, 8).'</li>';
		}
		
		echo '
				
				<h3>Activity Status:</h3>
				<p class="info_p" id="activity_status">'.$activity_status.'</p>
				
				<h3>Activity ID:</h3>
				<p class="info_p">'.$row['activity_id'].'</p>
				
				<h3>Activity Type:</h3>
				<p class="info_p">'.$row['activity_type'].'</p>

				<h3>Description:</h3>
				<p class="info_p">'.$row['activity_description'].'</p>
				
				<h3>Objective:</h3>
				<p class="info_p">'.$row['activity_objectives'].'</p>
				
				<div class="strand_list_container">
					<h3>Strands:</h3>
					<ul>
						'.$strand_list.'
					</ul>
				</div>
				
				<div class="objective_list_container">
					<h3>Outcomes:</h3>
					<ul>
						'.$outcome_list.'
					</ul>
				</div>
				
				<div class="clear"></div>
				
					
		';
		
	}
	
	?>
	
	<?php
	
	/*
	
		$query = 'SELECT * FROM Users';
		$result = mysqli_query($dbc, $query);
		while($row = mysqli_fetch_array($result)){
			echo $row['user_id'] . '<br />';
		}
		
	*/
	
	?>

</div>