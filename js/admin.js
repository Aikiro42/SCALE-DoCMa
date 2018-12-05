$(function(){
	$("div.admin_function h2").click(function(){
		
		var func_container = $(this).parent().find("div.func_container");
		var func_name = $(this).parent().attr('id');
		
		//this if function is to prevent form reset
		if(func_container.css('display') == "none"){
			
			$.ajax({
				url: 'module/submodule/admin/'+func_name+'.php',
				success: function(data){
					func_container.html(data);
					func_container.finish();
					func_container.slideDown();
				},
				error: onError
			});
		
		}else{
			func_container.finish();
			func_container.slideUp();
		}
		
	});
});