$(function(){
	
	function loadPendingActionsList(){
		$.ajax({
			url: 'module/submodule/pending_actions.php',
			success: function(data){
				$('div#pendingActionsContainer').html(data);
			},
			error: onError
		});
		
		$('p#refresh_pending_actions').click(function(){
			loadPendingActionsList();
		});
		
	}
	
	loadPendingActionsList();
	
});