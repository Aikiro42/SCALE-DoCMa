$(function(){
	$('p#refresh_assoc_activities').unbind('click').click(function(){
		
		activateWall(500);
		
		$.ajax({
			url: 'module/submodule/assoc_activities.php',
			success: function(data){
				$('div#AssocActivitiesContainer').html(data);
				deactivateWall(500);
			},
			error: onError
		});
		
	});
});