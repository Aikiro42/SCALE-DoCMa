$(function(){
	
	var ual_id_var = -1;
	
	var are_there_errors = false;
	
	var default_image = "img/default.png";
	
	var autogen_id = true;
	
	$('input[name=ual]').click(function(){
		ual_id_var = parseInt($(this).val());
		console.log(ual_id_var);
	});
	
	
	$('input#username').change(function(){
		$.ajax({
			method: 'post',
			data: {username_check: $(this).val()},
			url: 'applications/check_duplicate_username.php',
			success: function(data){
				var warning_sign = $('p#duplicate_username_error');
				if(data == 'true'){
					warning_sign.slideDown();
					are_there_errors = true;
				}else{
					warning_sign.slideUp();
					are_there_errors = false;
				}
			}
		});
	});
	
	$('input#mobile_number').change(function(){
		
		var mobile_number_var = $(this).val();
		var nan_sign = $('p#nan_mobile_number_error');

		if(isNaN(parseInt(mobile_number_var))){
			nan_sign.slideDown();
		}else{
			nan_sign.slideUp();
		}

	});
	
	$('div#add_user_submit').click(function(){
		//validation
		var username_field = $('input#username');
		var password_field = $('input#password');
		var user_id_field = $('input#user_id');
		var firstName_field = $('input#firstName');
		var lastName_field = $('input#lastName');
		var email_field = $('input#email');
		var mobile_number_field = $('input#mobile_number');
		var residency_address_field = $('input#residency_address');

		var valid = true;
		if(username_field.val().length <= 0){
			valid = false;
		}
		console.log('pass 1: ' + valid);
		
		
		if(password_field.val().length <= 0){
			valid = false;
		}
		console.log('pass 2: ' + valid);
		
		if(firstName_field.val().length <= 0){
			valid = false;
		}
		console.log('pass 4: ' + valid);
		
		valid = lastName_field.val().length > 0;
		if(lastName_field.val().length <= 0){
			valid = false;
		}
		console.log('pass 5: ' + valid);		
		
		
		if(email_field.val().length <= 0){
			valid = false;
		}
		console.log('pass 6: ' + valid);	

		if(residency_address_field.val().length <= 0){
			valid = false;
		}
		console.log('pass 6: ' + valid);		
		
		var mobile_number_var = mobile_number_field.val();
		if(mobile_number_var < 0 && isNaN(parseInt(mobile_number_var))){
			valid = false;
		}
		console.log('pass 7: ' + valid);	
		
		if(ual_id_var == -1){
			valid = false;
		}
		console.log('pass 8: ' + valid);
		
		if(are_there_errors){
			valid = false;
		}
		console.log('pass 9: ' + valid);
		
		/*
		
		var fileVar = {};
		if(image_uploaded){
			fileVar = file_data;
			default_image = '';
		}
		
		*/
		
		
		if(valid){
			$.ajax({
				method: 'post',
				data: {
					username: username_field.val(),
					password_var:  password_field.val(),
					user_id:  user_id_field.val(),
					firstName:  firstName_field.val(),
					lastName:  lastName_field.val(),
					email:  email_field.val(),
					profile_pic: default_image,
					//file: fileVar;
					ual_id: ual_id_var,
					auto_id: autogen_id,
					mobile_number: mobile_number_var,
					residency_address: residency_address_field.val()
				},
				url: 'applications/admin/add_user_app.php',
				success: function(){
					alert('Successfully added new user!');
					$('div.admin_function#add_user div.func_container').slideUp();
				},
				error: onError
			});
		}else{
			alert('Please fill out all the fields.');
		}

		
	});
	
});