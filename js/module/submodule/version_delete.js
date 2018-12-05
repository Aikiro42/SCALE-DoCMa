$(function(){
	
	
	
	$('div.version_delete_button').click(function(){
		
		var isDelete = confirm('Do you really want to delete this version of the form?');
		
		if(isDelete){
			
			var delFormID = $(this).find('input#del_form_id').val();
			var delVersionID = $(this).find('input#del_version_id').val();
			
			activateWall(500);
			
			$.ajax({
				method: 'post',
				data: {form_id : ""+delFormID, version_id : ""+delVersionID},
				url: 'applications/delete_version.php',
				success: function(data){
					loadFormDownloadList();
					loadDebug(data);
					deactivateWall(500);
				},
				//loadFormDownloadList();
				error: onError
			});
			
		}
	});
	
});