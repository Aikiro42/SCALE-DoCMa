$(function(){
	
	console.log(achieve_activity_id);
	
	$('input[name=achieved_strands]').off().click(function(){
		activateWall(500);
		$.ajax({
			method: 'post',
			url: 'applications/update_activity_progress.php',
			data: {activity_id : achieve_activity_id, update_string : $(this).val()},
			success: function(){
				deactivateWall(500);
			}
		});
	});
	
	$('input[name=achieved_outcomes]').off().click(function(){
		activateWall(500);
		$.ajax({
			method: 'post',
			url: 'applications/update_activity_progress.php',
			data: {activity_id : achieve_activity_id, update_string : $(this).val()},
			success: function(){
				deactivateWall(500);
			}
		});
	});
	
	
});