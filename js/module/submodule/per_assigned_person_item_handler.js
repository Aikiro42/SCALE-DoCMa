$(function(){
	
	function update_assigned_people_list(cont){
		console.log('Warning: Redundant code in per_assigned_person_item_handler.js (Original code from: activity_management.js)');
		cont = $('div#assigned_people_container');
		$.ajax({
			method: 'post',
			data: {activity_id: post_activity_id},
			url: 'module/submodule/assigned_people_list.php',
			success: function(data){
				cont.html(data);
			},
			error: onError
		});
	}
	
	$('div.unassign_person_button').off().click(function(){
		var parent_cont = $(this).parent();
		if(confirm('Are you sure about this action? \nThis person will no longer be involved with your activity.')){
			var user_id_var = parseInt($(this).parent().find('input#user_id').val());
			$.ajax({
				method: 'post',
				data: {activity_id: post_activity_id, user_id: user_id_var},
				url: 'applications/disassoc_person_from_activity.php',
				success: function(){
					alert('Successfully dissociated person from activity.');
					//parent_cont.remove();
					update_assigned_people_list(parent_cont.parent());
				}
			});
		}
	});
	
	
});