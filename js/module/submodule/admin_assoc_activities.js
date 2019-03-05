$(function(){
	
	function loadAssocActivitiesList(){
		$.ajax({
			url: 'module/submodule/admin_assoc_activities.php',
			success: function(data){
				$('div#AdminAssocActivitiesContainer').html(data);
			},
			error: onError
		});
	}
	
	//call function that loads the HTML before anything else
	//in order to let the following jQuery event handler
	//assignments do their job
	loadAssocActivitiesList();
});