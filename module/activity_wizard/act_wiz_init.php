
<h1>Propose Activity</h1>
<br />

<div id="instructions">
	<h2>INSTRUCTIONS</h2>
	<br />
	<p>
		First, download <a href="forms/PSHS-00-F-DSA-13-Rev 0-12-05-16.pdf">this file</a> and save it in your storage device.
		You will print it later and fill it up - the form will serve as the official copy for the activity you are applying for.
	</p>
	<br />
	<p>
		Fill up all the fields that are given - every field is required. When you are done, click submit.
		Your new activity will be savedin the database and you will be able to manage it yourself via the interfaces provided by this system.
	</p>
</div>

<!--Activity name-->
<h3>What is the name of your activity?</h3>
<span class="propose_activity_require_field" id="name_require">This field is required. Please fill it up.</span>
<input type="text" name="activity_name" id="activity_name"></input>

<h3>Is the activity a solo or a group one?</h3>
<span class="propose_activity_require_field" id="type_require">Please select an option.</span>
<label class="custom_radio_container">Individual
	<input type="radio" id="type_individual" name="activity_type" value="Individual" />
	<span class="custom_radio"></span>
</label>
<label class="custom_radio_container">Group
	<input type="radio" id="type_group" name="activity_type" value="Group" />
	<span class="custom_radio"></span>
</label>
<div class="clear"></div>

<h3>Give a brief description of your activity.</h3>
<span class="propose_activity_require_field" id="description_require">This field is required. Please fill it up.</span>
<textarea name="activity_description" id="activity_description" maxlength="512"></textarea>


<h3>What is/are the objectives of your activity?</h3>
<span class="propose_activity_require_field" id="objectives_require">This field is required. Please fill it up.</span>
<textarea name="activity_objectives" id="activity_objectives" maxlength="512"></textarea>


<h3>Check the strands this activity targets.</h3>
<span class="propose_activity_require_field" id="strand_require">Please select at least one option.</span>
<label class="custom_checkbox_container"><span class="custom_checkbox_label">Service</span>
	<input type="checkbox" id="strand_service" name="target_strands" value="Service"/>
	<span class="custom_checkbox"></span>
</label>
<label class="custom_checkbox_container"><span class="custom_checkbox_label">Creativity</span>
	<input type="checkbox" id="strand_Creativity" name="target_strands" value="Creativity"/>
	<span class="custom_checkbox"></span>
</label>
<label class="custom_checkbox_container"><span class="custom_checkbox_label">Action</span>
	<input type="checkbox" id="strand_action" name="target_strands" value="Action"/>
	<span class="custom_checkbox"></span>
</label>
<label class="custom_checkbox_container"><span class="custom_checkbox_label">Leadership</span>
	<input type="checkbox" id="strand_leadership" name="target_strands" value="Leadership"/>
	<span class="custom_checkbox"></span>
</label>

<h3>Check the outcomes this activity targets.</h3>
<span class="propose_activity_require_field" id="outcome_require">Please select at least one option.</span>
<label class="custom_checkbox_container"> Increased awareness of their own strengths and areas for growth.
	<input type="checkbox" id="objective_1" name="target_objectives" value="o1"/>
	<span class="custom_checkbox"></span>
</label>
<label class="custom_checkbox_container"> Undertaken new challenges.
	<input type="checkbox" id="objective_2" name="target_objectives" value="o2"/>
	<span class="custom_checkbox"></span>
</label>
<label class="custom_checkbox_container"> Introduced and managed activities.
	<input type="checkbox" id="objective_3" name="target_objectives" value="o3"/>
	<span class="custom_checkbox"></span>
</label>
<label class="custom_checkbox_container"> Contributed actively in group activities.
	<input type="checkbox" id="objective_4" name="target_objectives" value="o4"/>
	<span class="custom_checkbox"></span>
</label>
<label class="custom_checkbox_container"> Demonstrated perseverance and commitment in their activities.
	<input type="checkbox" id="objective_5" name="target_objectives" value="o5"/>
	<span class="custom_checkbox"></span>
</label>
<label class="custom_checkbox_container"> Engaged with issues of global importance.
	<input type="checkbox" id="objective_6" name="target_objectives" value="o6"/>
	<span class="custom_checkbox"></span>
</label>
<label class="custom_checkbox_container"> Reflected on the ethical consequence of their actions.
	<input type="checkbox" id="objective_7" name="target_objectives" value="o7"/>
	<span class="custom_checkbox"></span>
</label>
<label class="custom_checkbox_container"> Developed new skills.
	<input type="checkbox" id="objective_8" name="target_objectives" value="o8"/>
	<span class="custom_checkbox"></span>
</label>

<div id="all_done">
	<h2>All done?</h2>
	<br />
	<p>If you haven't done it yet, download <a href="forms/PSHS-00-F-DSA-13-Rev 0-12-05-16.pdf">this file (the DSA13 Form)</a> print it, and fill it up. The copy will serve as the official master copy of the proposal for the activity you want to start.</p>
	<br />
	<p>If you don't want to download the file right now, you can download it (the DSA13 Form) from the < Downloadable Forms > tab.</p>
	<p>When you are done, click submit. It will register your activity in the database for you to manage in the future.</p>
</div>

<!--

<div id="step_7" class="step">
	<h3 id="finished">You're all set!</h3>
	<h2>Download <a id="dsa13_link" href="forms/PSHS-00-F-DSA-13-Rev 0-12-05-16.pdf">this file</a>, fill it up and submit a printed copy of it to the corresponding SCALE Adviser.</h2>
	<p>You may review your choices by using the navigation buttons below.</p>
	<p>Make sure you've filled up all the fields.</p>
	<p>You may also assign people to your activity later if it is a group activity.</p>
	<h3>Once you're done, click on Finish to submit the form information.</h3>
</div>

-->

<div id="submit_activity_button">Submit</div>

<script type="text/javascript" src="module/activity_wizard/act_wiz.js"></script>
