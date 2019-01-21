$(function(){
	
	$("div.edit_user_button").off().click(function(){
		var edit_tools_container = $(this).parent().find('div.edit_tools');
		var this_user_id = $(this).parent().find('input[name=user_id]').val();
		if(edit_tools_container.css('display') == 'none'){
			$.ajax({
				method: 'post',
				data: {user_id: this_user_id},
				url: "module/submodule/admin/edit_user_tools.php",
				success: function(data){
					edit_tools_container.html(data);
					edit_tools_container.slideDown(250);
				},
				error: onError
			});
		}else{
			edit_tools_container.slideUp(250);
		}
		
	});
	
});