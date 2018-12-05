$(function(){
	
	console.log('activity_people.js called...');
	
	function update_add_people_list(searchQuery, outputContainer){
		console.log(post_activity_type);
		$.ajax({
			method: 'post',
			data: {search: searchQuery, activity_id: post_activity_id, activity_type: post_activity_type},
			url: 'module/submodule/activity_people_list.php',
			success: function(data){
				outputContainer.html(data);
			},
			error: onError
		});
	}
	
	$('div.add_people_button').off().click(function(){
		$(this).parent().find('div.add_people_func_container').fadeIn();
		outputCont = $(this).parent().find('div.add_people_list');
		console.log('clicked');
		update_add_people_list(',', outputCont);
	});
	
	$('div.close_add_people_popup').off().click(function(){
		$(this).parent().parent().fadeOut();
	});
	
	$('p.add_person_search_button').off().click(function(){
		outputCont = $(this).parent().find('div.add_people_list');
		searchQuery = $(this).parent().find('input.add_person_search_bar').val();
		if(searchQuery.length == 0){
			searchQuery = ',';
		}
		update_add_people_list(searchQuery, outputCont);
	});
	
	$('input.add_person_search_bar').off().keypress(function(e){
		if(e.which == 13) {
			outputCont = $(this).parent().find('div.add_people_list');
			var searchQuery = $(this).val();
			if(searchQuery.length == 0){
				searchQuery = ',';
			}
			update_add_people_list(searchQuery, outputCont);
		}
	});
		
});