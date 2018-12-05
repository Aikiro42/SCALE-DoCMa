$(function(){	
	
	$('div.version_list_button').click(function(){
		var form_id_var = $(this).parent().find('input#form_id').val();
		var activity_id_var = $(this).parent().find('input#activity_id').val();
		var version_list_cont = $(this).parent().find('div.version_list');
		version_list_cont.finish();
		if(version_list_cont.css('display') == 'none'){
			$.ajax({
				method: 'post',
				data: {form_id: form_id_var, activity_id: activity_id_var},
				url: 'module/submodule/version_list.php',
				success: function(data){
					version_list_cont.html(data);
					version_list_cont.slideDown();
				},
				error: onError
			});
		}else{
					version_list_cont.slideUp();
		}
		

		
	});
	
	
});