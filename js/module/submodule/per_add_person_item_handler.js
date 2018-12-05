$(function(){
	
	var aff_id_var = 0;
	
	function update_assigned_people_list(cont){
		console.log('Warning: Redundant code in per_add_person_item_handler.js (Original code from: activity_management.js)');
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
	
	$('h3.add_people_item_button').off().click(function(){
		var affiliation_cont = $(this).parent().find('div.affiliation_cont');
		if(affiliation_cont.css('display') == 'none'){
			affiliation_cont.slideDown();
		}else{
			affiliation_cont.slideUp();
		}
	});
	
	$('div.add_people_item').find('label.custom_radio_container').off().click(function(){
		aff_id_var = parseInt($(this).find('input').val());
	});
	
	$('div.add_people_item').find('div.add_person_button').off().click(function(){
		var parent_cont = $(this).parent().parent();
		var ancestor_cont = $(this).parent().parent().parent().parent().parent().parent();
		if(aff_id_var != 0){	
			parent_cont.find('div.adding_person_notif').slideDown(100);
			parent_cont.find('*').off();
			var user_id_var = parseInt(parent_cont.find('input#user_id').val());
			$.ajax({
				method: 'post',
				data: {user_id: user_id_var, activity_id: post_activity_id, aff_id: aff_id_var},
				url: 'applications/assoc_person_with_activity.php',
				success: function(data){
					parent_cont.slideUp(250);
					parent_cont.remove();
					update_assigned_people_list(ancestor_cont.find('div#assigned_people_container'));
					alert('Assigned Person Successfully!');
				},
				error: onError
			});
		}else{
			alert('Please select a role the person will play in the activity.');
		}
	});
	
	
	
	
});