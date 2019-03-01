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
	$("#profile_information").slideUp(0);
	$("#profile_info_button").click(function(){
		//activateWall(500);
		$.ajax({
			url: 'module/submodule/profile_information.php',
			success: function(data){
				var info_cont = $("#profile_information");
				var toggle_button = $("#profile_info_button");
				info_cont.html(data);
				if(info_cont.css("display") == "none"){
					toggle_button.html("Hide Profile Info");
					info_cont.slideDown();
				}else{
					toggle_button.html("Show Profile Info");
					info_cont.slideUp();
				}
				
				//deactivateWall(500);
			},
			error: onError
		})
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
	
		
});