$(function(){
	
	var activity_list = $('div#activity_list');
	
	//this code does not ensure bug-free operation
	function initial_startup(){
		$.ajax({
			method: 'post',
			data: {search: ''},
			url: 'applications/admin/delete_activity_list.php',
			success: function(data){
				activity_list.html(data);
			},
			error: onError
		});
	}
	
	function update_activity_list(name_query){
		activateWall(500);
		$.ajax({
			method: 'post',
			data: {search: name_query},
			url: 'applications/admin/delete_activity_list.php',
			success: function(data){
				activity_list.html(data);
				deactivateWall(500);
			},
			error: onError
		});
	
	}
	
	$('input#activity_search_bar').keypress(function(e){
		if(e.which == 13) {
			var search_val = $(this).val();
			if(search_val.length == 0){
				search_val = ',';
			}
			update_activity_list(search_val);
		}
	});
	
	$('div#search_button').click(function(){
		search_val = $(this).parent().find('input#activity_search_bar').val();
		if(search_val.length == 0){
			search_val = ',';
		}
		update_activity_list(search_val);
	});
	
	initial_startup();
	
});