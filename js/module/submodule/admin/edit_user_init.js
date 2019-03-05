$(function(){
	$.ajax({
		method: 'post',
		data: {search: ','},
		url: 'module/submodule/admin/edit_user_list.php',
		success: function(data){
			$('div#edit_user_list').html(data);
		},
		error: onError
	});
});