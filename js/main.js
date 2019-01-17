//To be used in ajax processes
function onError(xhr, st, er) {
	console.log('Server Connection Error!');
};

//renders text < x > on top of the site
function loadDebug(x){
	$("div#debug_block").html(x);
}

//used in the file upload submodule
function resetFileInputValues(){
	$('.file_upload').each(function(){
		$(this).val('');
	});
	
	$('.version_upload').each(function(){
		$(this).val('');
	});
}

//visualizes an overlay over the system to prevent bug-inducing actions while processing any request
function activateWall(x){
	var wall = $('div#anti_interaction_wall');
	wall.finish();
	wall.fadeIn(x);
}

//removes overlay
function deactivateWall(x){
	var wall = $('div#anti_interaction_wall');
	wall.finish();
	wall.fadeOut(x);
}

function loadFormDownloadList(){
	$.ajax({
		method: 'post',
		url: "module/submodule/form_download_list.php",
		data: {activity_id: ""+post_activity_id},
		success: function(data){$("div#form_download_list" + post_activity_id).html(data);},
		error: onError
	});
}

//CHECK ME OUT
function toggleActivityWizardVisibility(){
	var popup_window = $("div#activity_wizard");
	if(popup_window.css("display") == "none"){
		popup_window.finish();
		popup_window.fadeIn(100);
	}else{
		popup_window.finish();
		popup_window.fadeOut(100);
	}
}

function trail_log(info){
	$.ajax({
		method: 'post',
		data: {entry_info: info},
		url: 'applications/log_to_audit_trail.php',
		success: function(data){
			console.log(data);
		},
		error: onError
	});
}

$(function(){
	
	//===================================================================================================>>> Hey! Debug activation over here~
	
	//$("#headerNav").slideUp(0);
	//$("#moduleContainer").slideUp(0);
	
	//initialize_page(isAdmin);
	//if isAdmin, then open the administrative page regardless of user type.
	//if not, open to profile as normal
	initialize_page(false);
	
	/*
	function assignButton(selector, URL){
		$(selector).click(function(){
			$("#headerNav").slideToggle(500);
			$("#navWrapper").slideToggle(500);
			loadModule(URL);
		});
	}
	*/
	
	function assignNavButton(selector, URL){
		$(selector).click(function(){
			loadModule(URL);
		});
	}
	
	//ASSIGN NAVIGATION HERE
	function assignNavClickHandlers(){
		//Profiles for each different UAL
		assignNavButton("#profile_administrator","module/profile_administrator.php");
		/*
		assignNavButton("#profile_adviser","module/profile_adviser.php");
		assignNavButton("#profile_supervisor","module/profile_supervisor.php");
		assignNavButton("#profile_student","module/profile_student.php");
		*/
		assignNavButton("#download","module/download.php");
		assignNavButton("#administrative","module/administrative.php");
		assignNavButton("#people","module/people.php");
		assignNavButton("#activities","module/activities.php");
		assignNavButton("#about","module/about.php");
		//assignNavButton("#module_name","module/module_name.php");
	}
	
	/*
	function assignButtonClickHandlers(){
		assignButton("#profileItem","module/profile.php");
		assignButton("#downloadItem","module/download.php");
	}
	*/
	
	/*
	function assignDescEffects(selector, target){
		$(selector).hover(function(){
			$(target).slideUp().finish();
			$(target).slideDown();
		});
		
		$(selector).mouseleave(function(){
			$(target).slideDown().finish();
			$(target).slideUp();
		});

	}
	*/
	
	//Code for initializing page
	function initialize_page(isAdmin){
		//change this anytime
		var moduleDir = "module/profile_administrator.php";
		if(isAdmin){
			moduleDir = "module/administrative.php";
		}
		
		activateWall(500);
		
		var moduleContainer = $("#moduleContainer");
		$("#moduleContainer").fadeOut(0);
		moduleContainer.load(moduleDir, function(responseTxt, statusTxt, xhr){
			if(statusTxt == 'success'){
				moduleContainer.css('visibility','visible');
				deactivateWall(500);
				moduleContainer.fadeIn(250);
			}else if(statusTxt== 'error'){
				console.log('An error has occured.');
			}
		});
	}
	
	/*
	
	Old code for loadModule()
	Replaced with Ajax function
	
	function loadModule(URL){
		activateWall(500);		
		$("#moduleContainer").fadeOut(250, function(){
			$("#moduleContainer").load(URL, function(responseTxt, statusTxt, xhr){
				if(statusTxt == 'success'){
					deactivateWall(500);
					$("#moduleContainer").fadeIn(250);
				}else if(statusTxt== 'error'){
					$("#headerNav").slideToggle(250);
					$("#navWrapper").slideToggle(250);
				}
			});
		});
	}
	*/
	
	function loadModule(URL){
		activateWall(500);
		$.ajax({
			url: URL,
			method: 'post',
			success: function(data){
				$("#moduleContainer").html(data);
				deactivateWall(500);
				$("#moduleContainer").fadeIn(250);
			},
			error: function(xhr, st, er){
				$("#headerNav").slideToggle(250);
				$("#navWrapper").slideToggle(250);
			}
		});
	}
	
	
	$("#home").click(function(){
		$("#headerNav").slideToggle(500);
		$("#navWrapper").slideToggle(500);
		$("#moduleContainer").slideUp(500);
	});
	assignNavClickHandlers();
	deactivateWall(0);
	/*
	assignButtonClickHandlers();
	assignDescEffects("#profileItem", "#profileDesc");
	assignDescEffects("#downloadItem", "#downloadDesc");
	assignDescEffects("#logoutItem", "#logoutDesc");
	*/
	
	$("div#close_popup").click(function(){
		toggleActivityWizardVisibility();
	});
	
	$("div#activity_wizard").fadeOut(0);
	
	
});