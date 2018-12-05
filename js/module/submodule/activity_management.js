$(function(){
	
	function update_assigned_people_list(cont){
		cont = $('div#assigned_people_container');
		$.ajax({
			method: 'post',
			data: {activity_id: post_activity_id},
			url: 'module/submodule/assigned_people_list.php',
			success: function(data){
				cont.html(data);
			},
			error: onError
		});
	}
	
	$('h2#manage_people_button').click(function(){
		//console.log(post_activity_id);
		var cont = $(this).parent().find('div#manage_people_content');
		console.log(cont.css('display'));
		if(cont.css('display') == 'none'){
			$.ajax({
				method: 'post',
				data: {activity_id: post_activity_id},
				url: 'module/submodule/activity_people.php',
				success: function(data){
					cont.html(data);
					cont.slideDown();
					update_assigned_people_list($(this).parent().find('div#assigned_people_container'));
				},
				error: onError
			});
		}else{
			cont.slideUp();
		}
	});
	
	function loadFormDownloadList(){
		//make transition smoother? wait? callback function? anything?
		var form_download_list_cont = $("div#form_download_list" + post_activity_id);
		$.ajax({
			method: 'post',
			url: "module/submodule/form_download_list.php",
			data: {activity_id: ""+post_activity_id},
			success: function(data){
				form_download_list_cont.html(data);
			},
			error: onError
		});
		form_download_list_cont.slideDown();
	}
	
	
	loadFormDownloadList();
	
});