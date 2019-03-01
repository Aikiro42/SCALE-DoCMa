<?php

	include("../../session.php");
	$user_id = $_SESSION['user_id'];
	
	$service_achieved =
	$creativity_achieved =
	$action_achieved =
	$leadership_achieved =
	$o1_achieved =
	$o2_achieved =
	$o3_achieved =
	$o4_achieved =
	$o5_achieved =
	$o6_achieved =
	$o7_achieved =
	$o8_achieved = "";
	
	
	
	$query = "SELECT * FROM ActivityUserAssoc WHERE user_id = " . $user_id;
	$result = mysqli_query($dbc, $query);
	while($row = mysqli_fetch_array($result)){
		$is_activity_leader = $row['aff_id'] == 5;
		$sub_query = "SELECT * FROM ActivityProgress WHERE activity_id = " . $row['activity_id'];
		$sub_result = mysqli_query($dbc, $sub_query);
		$sub_row = mysqli_fetch_array($sub_result);
		
		if($sub_row['service_achieved']) $service_achieved = "achieved";
		if($sub_row['creativity_achieved']) $creativity_achieved = "achieved";
		if($sub_row['action_achieved']) $action_achieved = "achieved";
		if($sub_row['leadership_achieved'] && $is_activity_leader) $leadership_achieved = "achieved";
		
		if($sub_row['o1_achieved']) $o1_achieved = "achieved";
		if($sub_row['o2_achieved']) $o2_achieved = "achieved";
		if($sub_row['o3_achieved']) $o3_achieved = "achieved";
		if($sub_row['o4_achieved']) $o4_achieved = "achieved";
		if($sub_row['o5_achieved']) $o5_achieved = "achieved";
		if($sub_row['o6_achieved']) $o6_achieved = "achieved";
		if($sub_row['o7_achieved']) $o7_achieved = "achieved";
		if($sub_row['o8_achieved']) $o8_achieved = "achieved";
		
		
	}

?>

<div id="profile_info_cont">
	<h2>Achieved Strands and Outcomes</h2>
	<div id="achieved_strands" class="achieved_box_container">
		<h3 id="achieved_strands_label" class="achieved_box_label">Strands</h3>
		<h3 class="achieved_box <?php echo $service_achieved;?>" id="service_box">S</h3>
		<h3 class="achieved_box <?php echo $creativity_achieved;?>" id="creativity_box">C</h3>
		<h3 class="achieved_box <?php echo $action_achieved;?>" id="action_box">A</h3>
		<h3 class="achieved_box <?php echo $leadership_achieved;?>" id="leadership_box">L</h3>
		<div class="clear"></div>
	</div>
	<div id="achieved_outcomes" class="achieved_box_container">
		<h3 id="achieved_outcomes_label" class="achieved_box_label">Outcomes</h3>
		<h3 class="achieved_box <?php echo $o1_achieved;?>" id="o1_box">1</h3>
		<h3 class="achieved_box <?php echo $o2_achieved;?>" id="o2_box">2</h3>
		<h3 class="achieved_box <?php echo $o3_achieved;?>" id="o3_box">3</h3>
		<h3 class="achieved_box <?php echo $o4_achieved;?>" id="o4_box">4</h3>
		<h3 class="achieved_box <?php echo $o5_achieved;?>" id="o5_box">5</h3>
		<h3 class="achieved_box <?php echo $o6_achieved;?>" id="o6_box">6</h3>
		<h3 class="achieved_box <?php echo $o7_achieved;?>" id="o7_box">7</h3>
		<h3 class="achieved_box <?php echo $o8_achieved;?>" id="o8_box">8</h3>
		<div class="clear"></div>
	</div>
</div>