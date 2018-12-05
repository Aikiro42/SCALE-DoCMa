<p id="duplicate_username_error" class="validation_error">This username is already taken, sorry.</p>
<label class="generic_label"><span class="datatype_info">VARCHAR(255)</span>Username</label>
<input type="text" id="username" class="field" autocomplete="nu blin"/>

<label class="generic_label"><span class="datatype_info">VARCHAR(255)</span>Password</label>
<input type="password" id="password" class="field" autocomplete="nu blin"/>


<label class="generic_label"><span class="datatype_info">VARCHAR(255)</span>First Name</label>
<input type="text" id="firstName" class="field" autocomplete="nu blin"/>


<label class="generic_label"><span class="datatype_info">VARCHAR(255)</span>Last Name</label>
<input type="text" id="lastName" class="field" autocomplete="nu blin"/>


<label class="generic_label"><span class="datatype_info">VARCHAR(255)</span>Email</label>
<input type="text" id="email" class="field" autocomplete="nu blin"/>

<p id="nan_mobile_number_error" class="validation_error">The mobile number must be an integer.</p>
<label class="generic_label"><span class="datatype_info">INT</span>Mobile Number</label>
<input type="text" id="mobile_number" class="field" autocomplete="nu blin"/>

<label class="generic_label"><span class="datatype_info">VARCHAR(512)</span>Residency Address</label>
<input type="text" id="residency_address" class="field" autocomplete="nu blin"/>

	<label class="generic_label"><span class="datatype_info">INT</span>User Access Level</label>
		
	<div id="add_user_rb_container">
		<label class="custom_radio_container">Administrator
			<input type="radio" value="1" id="ual_admin" name="ual" />
			<span class="custom_radio"></span>
		</label>
		<div class="clear"></div>
		
		
		<label class="custom_radio_container">Adviser
			<input type="radio" value="2" id="ual_adviser" name="ual" />
			<span class="custom_radio"></span>
		</label>
		<div class="clear"></div>

		
		<label class="custom_radio_container">Supervisor
			<input type="radio" value="3" id="ual_supervisor" name="ual" />
			<span class="custom_radio"></span>
		</label>
		<div class="clear"></div>
		
		
		<label class="custom_radio_container">Student
			<input type="radio" value="4" id="ual_student" name="ual" />
			<span class="custom_radio"></span>
		</label>
		<div class="clear"></div>
		
		
		<label class="custom_radio_container">Guest
			<input type="radio" value="5" id="ual_viewer" name="ual" />
			<span class="custom_radio"></span>
		</label>
		<div class="clear"></div>
	</div>

	<div class="clear"></div>
	
	<!--
	
	Abandoned - just change profile pic in a separate setting/administrative function.
	
	<form enctype="multipart/form-data" action="submit.php" method="post">
			<img id="profile_pic_preview" src="img/default.png" />
			<label id="pic_submit_button">
				Submit Profile Pic
				<input type="file" id="profile_pic_upload" name="uploaded_file" />
			</label>
	</form>
	
	<div class="clear"></div>
	
	-->
	
	<div class="submit_button" id="add_user_submit">
		Submit
	</div>

	<script src="js/module/submodule/admin/add_user.js"></script>