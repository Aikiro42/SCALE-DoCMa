$(function(){

	$('div.admin_activity_item div.activity_info_dropper_button').off().click(function(){
		
		//check if activity is associated with any person
		var validate_ActivityUserAssoc_activity_id = $(this).parent().find('p.activity_id').html();
		//alert('validate_ActivityUserAssoc_activity_id = ' + validate_ActivityUserAssoc_activity_id);
		
		var activity_info = $(this).parent().find('div.activity_info');
		activity_info.finish();
		if(activity_info.css('display') == 'none'){
			activity_info.slideDown();
		}else{
			activity_info.slideUp();
		}
		
		$.ajax({
			method: 'post',
			data: {activity_id: validate_ActivityUserAssoc_activity_id},
			url: 'applications/test_activity_user_assoc_for_activity.php',
			success: function(data){
				activity_info.find('span.warning').html(data);
			}
		});
		
	});
	
	$('div.admin_activity_item div.activity_info div.delete_button').off().click(function(){
		var this_activity_id = $(this).parent().parent().find('p.activity_id').html();
		var delete_positive = confirm('Are you sure you want to delete this activity?\nAll forms associated with this activity will be deleted.');
		if(delete_positive){
			activateWall(100);
			$.ajax({
				method: 'post',
				data: {activity_id: this_activity_id},
				url: 'applications/delete_activity_process.php',
				success: function(){
					//alert('Activity and all data involved with activity have been deleted.');
					deactivateWall(100);
				}
			});
		}
	});
	
});