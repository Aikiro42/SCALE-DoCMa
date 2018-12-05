$(function(){
	$('p#refresh_pending_actions').unbind('click').click(function(){
		activateWall(500);
		$.ajax({
			url: 'module/submodule/pending_actions.php',
			success: function(data){
				$('div#pendingActionsContainer').html(data);
				deactivateWall(500);
			},
			error: onError
		});
	});
});