$(function(){
	
	var person_list = $('div#person_list');
	
	function update_people_list(name_query){
		activateWall(500);
		$.ajax({
			method: 'post',
			data: {search: name_query},
			url: 'module/submodule/people_list.php',
			success: function(data){
				person_list.html(data);
				deactivateWall(500);
			},
			error: onError
		});
		
		console.log('hi');
		
	
	}
	
	$('input#person_search_bar').keypress(function(e){
		if(e.which == 13) {
			var search_val = $(this).val();
			if(search_val.length == 0){
				search_val = ',';
			}
			update_people_list(search_val);
		}
	});
	
	$('div#search_button').click(function(){
		search_val = $(this).parent().find('input#person_search_bar').val();
		if(search_val.length == 0){
			search_val = ',';
		}
		update_people_list(search_val);
	});
	
	update_people_list(',');
	
});