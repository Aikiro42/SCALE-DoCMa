$(function(){
	
	function loadModule(URL){
		$("#submoduleWrapper").load(URL, function(responseTxt, statusTxt, xhr){
			if(statusTxt == 'success'){
				$("#moduleContainer").slideDown(500);
			}else if(statusTxt== 'error'){
				$("#headerNav").slideToggle(500);
				$("#navWrapper").slideToggle(500);
			}
		});
	}
	
	$('#submit_form').click(function(){
		
	});
	
});