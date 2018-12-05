$(function(){
	
	function loadAssocActivitiesList(){
		$.ajax({
			url: 'module/submodule/assoc_activities.php',
			success: function(data){
				$('div#AssocActivitiesContainer').html(data);
			},
			error: onError
		});
	}
	
	//call function that loads the HTML before anything else
	//in order to let the following jQuery event handler
	//assignments do their job
	loadAssocActivitiesList();
});