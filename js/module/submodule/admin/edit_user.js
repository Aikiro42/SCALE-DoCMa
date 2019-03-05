$(function(){
	
	var edit_user_list = $('div#edit_user_list');
	
	function update_people_list(name_query){
		activateWall(500);
		$.ajax({
			method: 'post',
			data: {search: name_query},
			url: 'module/submodule/admin/edit_user_list.php',
			success: function(data){
				edit_user_list.html(data);
				deactivateWall(500);
			},
			error: onError
		});
		
		console.log('hi');
	}
	
	$("input#admin_user_search_bar").keypress(function(e){
		if(e.which == 13) {
			var search_val = $(this).val();
			if(search_val.length == 0){
				search_val = ',';
			}
			update_people_list(search_val);
		}
	});
	
	$("div#admin_user_search_button").off().click(function(){
		var search_val = $("input#admin_user_search_bar").val();
		if(search_val.length == 0){
			search_val = ',';
		}
		console.log(search_val);
		update_people_list(search_val);
	});
	
});