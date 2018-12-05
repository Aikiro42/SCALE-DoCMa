$(function(){
	
	//Initial upload of file
	$('.file_upload').change(function(){
		console.log('.file_upload change is handled');
		var file_data = $(this).prop('files')[0];
		var formtype_id = $(this).parent().parent().find('input#formtype_id').val();
		var activity_id = $(this).parent().parent().find('input#activity_id').val();
		var form_data = new FormData();
			form_data.append('file', file_data);
			form_data.append('formtype_id', formtype_id);
			form_data.append('activity_id', activity_id);
		
		activateWall(500);
		
		$.ajax({
			method: 'post',
			data: form_data,
			url: 'applications/upload_file.php',
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