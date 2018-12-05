$(function(){
	
	
	function loadPendingActionsList(){
		$.ajax({
			url: 'module/submodule/pending_actions.php',
			success: function(data){
				$('div#pendingActionsContainer').html(data);
			},
			error: onError
		});
	}
	
	function response_handler(butt, confirmed){
		if(confirmed){
			var form_id_var = $(butt).parent().find('#eval_form_id').val();
			var pending_response_var = $(butt).find('#response_val').val();
			activateWall(500);
			$.ajax({
				method: 'post',
				data: {form_id : form_id_var, pending_response : pending_response_var},
				url: 'applications/pending_response.php',
				success: function(data){
					loadPendingActionsList();
					deactivateWall(500);
				},
				error: onError
			});
		}
	
	}
	
	$('.approve_button').click(function(){
		var confirmed = confirm('Are you sure of approving this form?');
		response_handler(this, confirmed);
	});
	
	$('.deny_button').click(function(){
		var confirmed = confirm('Are you sure of approving this form?');
		response_handler(this, confirmed);
	});
	
});