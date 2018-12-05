$(function(){

	$('div#activity_list div.activity_item').off().click(function(){
		console.log('hi');
		var activity_info = $(this).find('div.activity_info');
		activity_info.finish();
		if(activity_info.css('display') == 'none'){
			activity_info.slideDown();
		}else{
			activity_info.slideUp();
		}
	});
	
});