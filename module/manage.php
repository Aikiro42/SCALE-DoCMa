<div class="moduleWrapper">

	<div class="manage_Section" id="activities">
		<h1>Activities</h1>
		<!-- list display -->
		<?php
		
		include('config.php');
		
		session_start();
		$query = "SELECT * FROM ActivityUserAssoc WHERE user_id = " . $_SESSION['user_id'];
		$result = mysqli_query($dbc, $query);
		while($row = mysqli_fetch_array($result)){
			$query = "SELECT * FROM Activities WHERE activity_id = " . $row['activity_id'];
			$result = mysqli_query($dbc, $query);
			$subrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
			
			echo '<div class="activity_button><span display="hidden">'.$subrow['activity_id'].'</span>'.$subrow['title'].'</div>';

		}
		
		?>
	</div>
	
	<div class="manage_section" id="people">
		<h1>People</h1>
		<!-- grid display -->
	</div>

</div>