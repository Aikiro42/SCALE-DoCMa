<?php

	include('../../../session.php');

	$is_admin = $_SESSION['ual_id'] == 1;
	
	$user_id = $_POST['user_id'];
	
	$query = "SELECT * FROM Persons WHERE user_id = " . $user_id;
	$result = mysqli_query($dbc, $query) or die("[edit_user_tools.php]: Error.");
	$row = mysqli_fetch_array($result);
	
	$firstName = $row['firstName'];
	$lastName = $row['lastName'];
	$email = $row['email'];
	$mobile_number = $row['mobile_number'];
	$residency_address = $row['residency_address'];
	
	$query = "SELECT * FROM Users WHERE user_id = " . $user_id;
	$result = mysqli_query($dbc, $query) or die("[edit_user_tools.php]: Error.");
	$row = mysqli_fetch_array($result);
	
	$username = $row['username'];
	$password = $row['password'];

	echo '
	
		<!--username-->
		<div class="edit_info_block">
			<h3>Username</h3>
			<input type="text" class="new_value" name="new_username" value="'.$username.'"/>
			<div class="save_new_info">Save</div>
			<div class="clear"></div>
			<input type="hidden" name="alter_column" value="username" />
		</div>

		<!--password-->
		<div class="edit_info_block">
			<h3>Password</h3>
			<input type="text" class="new_value" name="new_password" value="'.$password.'"/>
			<div class="save_new_info">Save</div>
			<div class="clear"></div>
			<input type="hidden" name="alter_column" value="password" />
		</div>
	
		<!--first name-->
		<div class="edit_info_block">
			<h3>First Name</h3>
			<input type="text" class="new_value" name="new_firstName" value="'.$firstName.'"/>
			<div class="save_new_info">Save</div>
			<div class="clear"></div>
			<input type="hidden" name="alter_column" value="firstName" />
		</div>

		<!--last name-->
		<div class="edit_info_block">
			<h3>Last Name</h3>
			<input type="text" class="new_value" name="new_lastName" value="'.$lastName.'"/>
			<div class="save_new_info">Save</div>
			<div class="clear"></div>
			<input type="hidden" name="alter_column" value="lastName" />
		</div>

		<!--mobile number-->
		<div class="edit_info_block">
			<h3>Mobile Number</h3>
			<input type="text" class="new_value" name="new_mobile_number" value="'.$mobile_number.'"/>
			<div class="save_new_info">Save</div>
			<div class="clear"></div>
			<input type="hidden" name="alter_column" value="mobile_number" />
		</div>

		<!--email-->
		<div class="edit_info_block">
			<h3>Email</h3>
			<input type="text" class="new_value" name="new_email" value="'.$email.'"/>
			<div class="save_new_info">Save</div>
			<div class="clear"></div>
			<input type="hidden" name="alter_column" value="email" />
		</div>

		<!--residency_address-->
		<div class="edit_info_block">
			<h3>Residency Address</h3>	
			<input type="text" class="new_value" name="new_residency_address" value="'.$residency_address.'"/>
			<div class="save_new_info">Save</div>
			<div class="clear"></div>
			<input type="hidden" name="alter_column" value="residency_address" />
		</div>

	';
	
?>

<script src="js/module/submodule/admin/per_edit_save_button_handler.js"></script>
