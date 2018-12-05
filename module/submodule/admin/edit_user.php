
<input type="text" id="admin_user_search_bar" placeholder="Enter to search..."></input>
<div id="admin_user_search_button">Search</div>
<div class="clear"></div>

<!--<p style="color: red;">This admin function will be coming soon...	</p>-->

<div id="edit_user_list">
	<div class="edit_person">
		<img class="profile_pic"></img>
		<div class="edit_user_button">Edit User</div>
		<h2 class="name">Alvarado, Luis</h2>
		<div class="clear"></div>
		<div class="edit_tools">
				
			<!--username-->
			<div class="edit_info_block">
				<h3>Username</h3>
				<input type="text" name="new_username" value="Aikiro42"/>
				<div class="save_new_info">Save</div>
				<div class="clear"></div>
			</div>
			
			<!--password-->
			<div class="edit_info_block">
				<h3>Password</h3>
				<input type="password" name="new_password" value="13-01104"/>
				<div class="save_new_info">Save</div>
				<div class="clear"></div>
			</div>
			
			<!--first name-->
			<div class="edit_info_block">
				<h3>First Name</h3>
				<input type="text" name="new_firstName" value="Luis"/>
				<div class="save_new_info">Save</div>
				<div class="clear"></div>
			</div>
			
			<!--last name-->
			<div class="edit_info_block">
				<h3>Last Name</h3>
				<input type="text" name="new_lastName" value="Alvarado"/>
				<div class="save_new_info">Save</div>
				<div class="clear"></div>
			</div>
					
		</div>
	</div>
	<?php

		include ('../../../config.php');
		session_start();
		
		$query = "SELECT * FROM Users WHERE user_id != " . $_SESSION['user_id'];
		$result = mysqli_query($dbc, $query);
		while($row = mysqli_fetch_array($result)){
			
			$sub_query = "SELECT * FROM Persons WHERE user_id = " . $row['user_id'];
			$sub_result = mysqli_query($dbc, $sub_query);
			$sub_row = mysqli_fetch_array($sub_result);
			
			$username = $row['username'];
			$password = $row['password'];
			$profile_pic = $row['profile_pic'];
			$ual_id = $row['ual_id'];
			$firstName = $sub_row['firstName'];
			$lastName = $sub_row['lastName'];
			$email = $sub_row['email'];
			$mobile_number = $sub_row['mobile_number'];
			$residency_address = $sub_row['residency_address'];
			
		}
		

	?>
</div>

<!--FIXME: Security in this part of the program is bad - users can access the hidden ui via the developmental console of the browser.-->

