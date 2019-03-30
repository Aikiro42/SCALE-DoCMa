<?php
	include('../config.php');
	session_start();
?>
<div class="moduleWrapper" id="profile_module">
	<h1>My Profile</h1>
	<div id="userInfo">
		<!--<a id="logout_button" href="logout.php">Log out</a>-->
		
		<?php
		
		$is_student = $_SESSION['ual_id'] > 3;
		
		if($is_student){
			echo '
				<div id="profile_info_button">Show Achieved Strands</div>
			';
		};
	
		$query = "SELECT * FROM persons WHERE persons.user_id = ".$_SESSION['user_id'];
		$result = mysqli_query($dbc, $query);
		$name = $email = $profile_pic = $user_id = $ual_id = '';
		while($row = mysqli_fetch_array($result)){
			$name = $row['firstName'] . ' ' . $row['lastName'];
			$email = $row['email'];
			$user_id = $row['user_id'];
			$ual_name = $_SESSION['ual_name'];
		}
		$query = "SELECT * FROM users WHERE users.user_id = ".$_SESSION['user_id'];
		$result = mysqli_query($dbc, $query);
		$profile_pic = '';
		while($row = mysqli_fetch_array($result)){
			$profile_pic = $row['profile_pic'];
		}
		
		
		
		?>
		<img id="profilePic" src="<?php echo $profile_pic;?>">
		<h2 id="fullName"><?php echo $name;?></h2>
		<p id="email"><span class="user_cred_label">Email: </span><?php echo $email;?></p>
		<p id="user_id"><span class="user_cred_label">User ID: </span> <?php echo $user_id;?></p>
		<p id="ual_name"><span class="user_cred_label">Access Level: </span> <?php echo $ual_name;?></p>
		<div class="clear"></div>
		<div id="profile_information">
		</div>
	</div>
	
	<?php
	
		if($is_student){
			echo '
				
				<div id="action_buttons">
					<div class="butt" id="propose_activity">Propose Activity</div>
					<!--<div class="butt" id="request_collab">Request Collab</div>-->
				</div>
				
			';
		}
	
	?>
	
	
	
	
	<!--loads pending_actions.php-->
	<?php
	
		if($_SESSION['ual_id'] < 2){
			echo '
				<div id="pendingActionsContainer">
				</div>
			';
		}
	
	?>
	
	<!--Load assoc_activities.php-->
	<?php
		if($_SESSION['ual_id'] < 5 && $_SESSION['ual_id'] != 1){
			echo '
				<div id="AssocActivitiesContainer">
				</div>
			';
		}
	?>
	
	<!--Load admin_assoc_activities.php-->
	<?php
		if($_SESSION['ual_id'] == 1){
			echo '
				<div id="AdminAssocActivitiesContainer">
				</div>
			';
		}
	?>
	
	<!--This was supposed to be for notifications-->
	<div id="latestUpdates"></div>
	
	<script src="js/module/profile.js"></script>
	<script src="js/module/submodule/pending_actions.js"></script>
	<script src="js/module/submodule/assoc_activities.js"></script>
	<?php
		if($_SESSION['ual_id'] < 5){
			echo '
				<script src="js/module/submodule/admin_assoc_activities.js"></script>
			';
		}
	?>

</div>