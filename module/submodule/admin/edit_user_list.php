<?php

	include('../../../session.php');
	include('../../../ChromePhp.php');

	$search = $_POST['search'];
		
	$query = "SELECT * FROM persons WHERE persons.user_id != ".$_SESSION['user_id'] . ' ORDER BY lastName';
	$result = mysqli_query($dbc, $query);
	$name = $user_id = '';

	while($row = mysqli_fetch_array($result)){
		//getting data from Persons table
		$name = $row['lastName'] . ', ' . $row['firstName'];
		$user_id = $row['user_id'];

		/* 
		if($_SESSION['ual_id'] > 1){
			$credentials_string = '';
		}
		*/
		$echo_item = '
		
		<div class="edit_person">
			<img class="profile_pic"></img>
			<div class="edit_user_button">Edit User</div>
			<!--<div class="delete_user_button">Delete User</div>-->
			<h2 class="name">'.$name.'</h2>
			<div class="clear"></div>
			<div class="edit_tools">
				<!--ajax: edit_user_tools.php-->
			</div>
			<input type="hidden" name="user_id" value="'.$user_id.'">
		</div>
		
		';
		
		ChromePhp::log('[edit_user_list.php]:' . $user_id);
		
		if(strlen($search) > 0){
			if(strpos(strtolower($name), strtolower($search)) !== false){
				echo $echo_item;
			}
		}else{
			echo $echo_item;
		}
		
	}
		
	
?>

<!--
	<div class="edit_person sample">
		<img class="profile_pic"></img>
		<div class="edit_user_button">Edit User</div>
		<h2 class="name">Alvarado, Luis</h2>
		<div class="clear"></div>
		<div class="edit_tools">
		
		-->
		
			<!--ajax: edit_user_tools.php-->
			
		<!--
		</div>
	</div>
-->

	
	
	
	<script src="js/module/submodule/admin/per_edit_person_handler.js"></script>