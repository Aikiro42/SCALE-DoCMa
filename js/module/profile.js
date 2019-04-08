$(function(){
	
	function loadActivityManager(container, activityID){
		container.load(URL, {activity_id : activityID}, function(responseTxt, statusTxt, xhr){
			if(statusTxt == 'success'){
				container.slideDown(500);
			}else if(statusTxt== 'error'){
				console.log("URL:" + URL + ' not loaded...');
			}
		});
	}
	
	//user information button
	$("#profile_info_button").click(function(){
		//activateWall(500);
		$.ajax({
			url: 'module/submodule/profile_information.php',
			success: function(data){
				activateWall(500);
				var info_cont = $("#profile_information");
				info_cont.html(data);
				deactivateWall(500);
			},
			error: onError
		});
	});
	
	$("div#propose_activity").click(function(){
		$.ajax({
			//method: 'post',
			url: 'module/activity_wizard/act_wiz_init.php',
			//data: {activity_id: ""+post_activity_id},
			success: function(data){
				$("div#act_wiz_wrapper").html(data);
				toggleActivityWizardVisibility();
			},
			error: onError
		});

	});	
	
	$.ajax({
		url: 'module/submodule/profile_information.php',
		success: function(data){
			var info_cont = $("#profile_information");
			info_cont.html(data);
		},
		error: onError
	});
		
});