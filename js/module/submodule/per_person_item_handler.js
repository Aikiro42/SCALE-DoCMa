$(function(){

	$('div#person_list div.person_item').off().click(function(){
		console.log('hi');
		var person_info = $(this).find('div.person_info');
		person_info.finish();
		if(person_info.css('display') == 'none'){
			person_info.slideDown();
		}else{
			person_info.slideUp();
		}
	});
	
});