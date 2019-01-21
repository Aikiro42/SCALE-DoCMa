$(function(){
	
	$('div.save_new_info').off().click(function(){
		var this_user_id = $(this).parent().parent().parent().find('input[name=user_id]').val();
		var this_alter_column = $(this).parent().find('input[name=alter_column]').val();
		var this_new_value = $(this).parent().find('input.new_value').val();
		console.log('[per_edit_save_button_handler.js]:this_alter_column=' + this_alter_column);
		$.ajax({
			method: 'post',
			data: {user_id: this_user_id, alter_column: this_alter_column, new_value: this_new_value },
			url: 'applications/admin/edit_particular_user_info.php',
			success: function(data){
				//alert(data);
				alert('Edited user info successfully.');
			},
			error: onError
		});
		
	
		
	});
	
});