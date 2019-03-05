$(function(){
	$('p#refresh_assoc_activities').unbind('click').click(function(){
		
		activateWall(500);
		
		$.ajax({
			url: 'module/submodule/admin_assoc_activities.php',
			success: function(data){
				$('div#AdminAssocActivitiesContainer').html(data);
				deactivateWall(500);
			},
			error: onError
		});
		
	});
});