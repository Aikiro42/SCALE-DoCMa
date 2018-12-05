$(function(){
	
	//Uploading a new file version
	$('.version_upload').change(function(){
		//console.log('blyat');
		var file_data = $(this).prop('files')[0];
		//console.log('js/module/submodule/upload_version.js, line 7: Please check me for bugs');
		var form_id = $(this).parent().parent().parent().find('input#form_id').val();
		var activity_id = $(this).parent().parent().parent().find('input#activity_id').val();
		var formtype_id = $(this).parent().parent().find('input#formtype_id').val();
		var form_data = new FormData();
			form_data.append('file', file_data);
			form_data.append('form_id', form_id);
			form_data.append('formtype_id', formtype_id);
			form_data.append('activity_id', activity_id);
		
		//Activate overlay to prevent bug-inducing actions from the user.
		activateWall(500);
		
		//Ajax function
		$.ajax({
			//Specify method to transfer data
			method: 'post',
			data: form_data,
			url: 'applications/upload_version.php',
			cache: false,
			contentType: false,
			processData: false,
			success: function(data){
				resetFileInputValues();
				loadFormDownloadList();
				//loadDebug(data);
				deactivateWall(500);
			},
			error: onError
		});
	});
	
	
});