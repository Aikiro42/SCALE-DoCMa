$(function(){
	
	$('p.delete_button').click(function(){
		var isDelete = confirm('Do you really want to delete the form and all its versions?');
		if(isDelete){
			var delFormID = $(this).parent().find('input#del_form_id').val();
			activateWall(500);
			$.ajax({
				method: 'post',
				data: {form_id : ""+delFormID},
				url: 'applications/delete_file.php',
				success: function(data){
					resetFileInputValues();
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