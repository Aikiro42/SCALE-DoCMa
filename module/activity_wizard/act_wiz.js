$(function(){
	
	var activity_name_var = '';
	var activity_type_var = '';
	var activity_description_var = '';
	var activity_objectives_var = '';
	
	var target_service = false;
	var target_creativity = false;
	var target_action = false;
	var target_leadership = false;
	
	var obj1 = false;
	var obj2 = false;
	var obj3 = false;
	var obj4 = false;
	var obj5 = false;
	var obj6 = false;
	var obj7 = false;
	var obj8 = false;
	
	var name_require = $('span#name_require');
	var type_require = $('span#type_require');
	var description_require = $('span#description_require');
	var objectives_require = $('span#objectives_require');
	var strand_require = $('span#strand_require');
	var outcome_require = $('span#outcome_require');

	
	function gather_data_from_textboxes(){
		activity_name_var = $('input[name=activity_name]').val();
		activity_description_var = $('textarea[name=activity_description]').val();
		activity_objectives_var = $('textarea[name=activity_objectives]').val();
	}
	
	function is_complete(){
		
		gather_data_from_textboxes();
		var completed = true;
		
		if(activity_name_var.length == 0){
			console.log('no activity name');
			completed = false;
			name_require.slideDown(100);
		}else{
			name_require.slideUp(100);
		}
		
		if(activity_type_var.length == 0){
			console.log('no activity type');
			completed = false;
			type_require.slideDown(100);
		}else{
			type_require.slideUp(100);
		}
		
		if(activity_description_var.length == 0){
			console.log('no activity description');
			completed = false;
			description_require.slideDown(100);
		}else{
			description_require.slideUp(100);
		}
		
		if(activity_objectives_var.length == 0){
			console.log('no objectives');
			completed = false;
			objectives_require.slideDown(100);
		}else{
			objectives_require.slideUp(100);
		}
		
		if(!target_service && !target_creativity && !target_action && !target_leadership){
			console.log('no strands');
			completed = false;
			strand_require.slideDown(100);
		}else{
			strand_require.slideUp(100);
		}
		
		if(!obj1 && !obj2 && !obj3 && !obj4 && !obj5 && !obj6 && !obj7 && !obj8){
			console.log('no objectives');
			completed = false;
			outcome_require.slideDown(100);
		}else{
			outcome_require.slideUp(100);
		}
		
		return completed;
	}
	
	//activity type radio button
	$('input[name=activity_type]').off().click(function(){
		activity_type_var = $(this).val();
		console.log(activity_type_var);
	});
	
	//target strands checkbox 
	$('input[name=target_strands]').off().click(function(){
		var click_val = $(this).val();
		console.log(click_val);
		if(click_val == 'Service'){
			target_service = !target_service;
		}else if(click_val == 'Creativity'){
			target_creativity = !target_creativity;
		}else if(click_val == 'Action'){
			target_action = !target_action;
		}else if(click_val == 'Leadership'){
			target_leadership = !target_leadership;
		}
	});
	
	//target objectives checkbox
	$('input[name=target_objectives]').off().click(function(){
		var click_val = $(this).val();
		console.log(click_val);
		if(click_val == 'o1'){
			obj1 = !obj1;
		}else if(click_val == 'o2'){
			obj2 = !obj2;
		}else if(click_val == 'o3'){
			obj3 = !obj3;
		}else if(click_val == 'o4'){
			obj4 = !obj4;
		}else if(click_val == 'o5'){
			obj5 = !obj5;
		}else if(click_val == 'o6'){
			obj6 = !obj6;
		}else if(click_val == 'o7'){
			obj7 = !obj7;
		}else if(click_val == 'o8'){
			obj8 = !obj8;
		}
	});
	
	
	//prev step
	
	$("div#prev_step").off().click(function(){		
		var stepnum = $("input#step_num");
		$("div#next_step").html("Next Step");
		if(stepnum.val() == 1){
			return;
		}else{
			$("div#step_"+stepnum.val()).finish();
			$("div#step_"+stepnum.val()).slideUp();
			var prevVal = parseInt(stepnum.val()) - 1;
			$("input#step_num").val(prevVal);
			$("div#step_"+stepnum.val()).slideDown();
		}
	});
	
	$("div#submit_activity_button").off().click(function(){
		//check if everything is filled up;
		gather_data_from_textboxes();
		if(is_complete()){
			activateWall(500);
			
			//php stuff
			$.ajax({
				method: 'post',
				data: {
					activity_name: activity_name_var,
					activity_type: activity_type_var,
					strand_service: target_service,
					strand_creativity: target_creativity,
					strand_action: target_action,
					strand_leadership: target_leadership,
					outcome_1: obj1,
					outcome_2: obj2,
					outcome_3: obj3,
					outcome_4: obj4,
					outcome_5: obj5,
					outcome_6: obj6,
					outcome_7: obj7,
					outcome_8: obj8,
					activity_description: activity_description_var,
					activity_objectives: activity_objectives_var
				},
				url: 'applications/add_activity.php',
				success: function(){
					alert('Successfully added activity!');
					toggleActivityWizardVisibility();
					deactivateWall(500);
				},
				error: onError
			});
			
		}else{
			alert("You haven't filled out all the fields yet...\nPlease fill out all the fields. You can go back and navigate using the navigation buttons at the bottom of the box.");
		}
		return;
	});
	
	

});