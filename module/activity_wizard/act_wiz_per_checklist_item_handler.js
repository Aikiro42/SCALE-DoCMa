$(function(){
	
	console.log('This script was called...');
		
	
	$('input.person_checkbox').parent().off().click(function(){
		
		var user_id = parseInt($(this).find('input.person_checkbox').val());
		
		if($(this).find('input.person_checkbox').checked){
			console.log('Pushing ' + user_id + ' to checkedlist...');
			checkedlist.push(user_id);
			console.log(checkedlist);
		}else{
			console.log('Popping ' + user_id + ' from checkedlist...');
			for(var i = 0; i < checkedlist.length; i++){
				if(checkedlist[i] == user_id){
					checkedlist.pop(i);
					break;	//because there can only be one user_id.
				}
			}
		}
		console.log('Success.');
		
	});
	
});