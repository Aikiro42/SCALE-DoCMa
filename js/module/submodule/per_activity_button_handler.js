$(function(){
	
	//"Manage" Button for each activity
	$(".manage_button").off().click(function(){
		console.log('.manage_button click is handled');
		var container = $(this).parent().find(".sub_module_container");
		var activityID = $(this).parent().find(".activity_id").val();
		var current_interface = container.find('#this_interface').val();
		
		container.finish();
		
		if(container.attr('style') == "display: none;"){
			$.ajax({
				method: 'post',
				data: {activity_id : activityID, parent_id : 'activity' + activityID},
				url: "module/submodule/activity_management.php",
				success: function(data){
					container.html(data);
					container.slideDown(500);
				},
				error: onError
			});
			/* 
			
			container.load(
				"module/submodule/activity_forms.php",
				{activity_id : activityID, parent_id : 'activity' + activityID},
				function(responseTxt, statusTxt, xhr){
					if(statusTxt == 'success'){
						container.slideDown(500);
					}else if(statusTxt== 'error'){
						console.log('URL not loaded...');
					}
				}
			);
			
			 */
		}else{
			container.slideUp();
			if(current_interface != 'manage'){
				$(this).click();
			}
		}
	});
	
	//"More Info" Button for each activity
	$(".more_info_button").off().click(function(){
		console.log('.more_info_button click is handled');
		var container = $(this).parent().find(".sub_module_container");
		var activityID = $(this).parent().find(".activity_id").val();
		var current_interface = container.find('#this_interface').val();
		if(container.attr('style') == "display: none;"){
			container.finish();
			container.load(
				"module/submodule/activity_information.php",	//url
				{activity_id : activityID, parent_id : 'activity' + activityID},	//data
				function(responseTxt, statusTxt, xhr){
					if(statusTxt == 'success'){
						container.slideDown(500);
					}else if(statusTxt== 'error'){
						console.log('URL not loaded...');
					}
				}
			);
		}else{
			container.finish();
			container.slideUp();
			if(current_interface != 'info'){
				$(this).click();
			}
		}
		
	});
	
	$(".progress_checklist_button").off().click(function(){
		console.log('.progress_checklist_button click is handled');
		var container = $(this).parent().find(".sub_module_container");
		var activityID = $(this).parent().find(".activity_id").val();
		var current_interface = container.find('#this_interface').val();
		if(container.attr('style') == "display: none;"){
			container.finish();
			container.load(
				"module/submodule/activity_progress_checklist.php",	//url
				{activity_id : activityID, parent_id : 'activity' + activityID},	//data
				function(responseTxt, statusTxt, xhr){
					if(statusTxt == 'success'){
						container.slideDown(500);
					}else if(statusTxt== 'error'){
						console.log('URL not loaded...');
					}
				}
			);
		}else{
			container.finish();
			container.slideUp();
			if(current_interface != 'progress'){
				$(this).click();
			}
		}
		
	});
	
	
	//Initial upload of file
	$('.file_upload').off().change(function(){
		console.log('.file_upload change is handled');
		var file_data = $(this).prop('files')[0];
		var formtype_id = $(this).parent().parent().find('input#formtype_id').val();
		var activity_id = $(this).parent().parent().find('input#activity_id').val();
		var form_data = new FormData();
			form_data.append('file', file_data);
			form_data.append('formtype_id', formtype_id);
			form_data.append('activity_id', activity_id);
		
		activateWall(500);
		
		$.ajax({
			method: 'post',
			data: form_data,
			url: 'applications/upload_file.php',
			cache: false,
			contentType: false,
			processData: false,
			success: function(data){
				resetFileInputValues();
				loadFormDownloadList();
				//loadDebug(data);
				deactivateWall(500);
			},
			error: onError
		});
	});
	
	$('.sub_module_container').slideUp(0);

	
	
});