$(function(){
	
	$("div.delete_user_button").off().click(function(){
		
		if(confirm('Are you sure that you want to delete this user?')){
			
			var edit_tools_container = $(this).parent().find('div.edit_tools');
			var this_user_id = $(this).parent().find('input[name=user_id]').val();
			if(edit_tools_container.css('display') == 'none'){
				$.ajax({
					method: 'post',
					data: {user_id: this_user_id},
					url: "applications/admin/delete_user_process.php",
					success: function(data){
						alert('Successfully deleted user.');
					},
					error: onError
				});
			}else{
				edit_tools_container.slideUp(250);
			}
		}
		
	});
	
});