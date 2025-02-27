	$('document').ready(function(){

		var username_state = false;
		var email_state = false;
	
		$('#username').on('blur', function(){
			var username = $('#username').val();

			if (username == '') {
				username_state = false;
				return;
			}

			$.ajax({
				url: "<?php echo SURL.'Login/register' ?>",
				type: 'post',
				data: {
					'username_check' : 1,
					'username' : username,
				},
				success: function(response){
					if (response == 'taken' ) {
						username_state = false;
						$('#username').parent().removeClass();
						$('#username').parent().addClass("form_error");
						$('#username').siblings("span").text('Sorry... Username already taken');
					}else if (response == 'not_taken') {
						username_state = true;
						$('#username').parent().removeClass();
						$('#username').parent().addClass("form_success");
						$('#username').siblings("span").text('Username available');
					}
				}
			});
		});		

		$('#email').on('blur', function(){
			var email = $('#email').val();

			if (email == '') {
				email_state = false;
				return;
			}

			$.ajax({
				url: "<?php echo SURL.'Login/register' ?>",
				type: 'post',
				data: {
					'email_check' : 1,
					'email' : email,
				},
				success: function(response){
					if (response == 'taken' ) {
						email_state = false;
						$('#email').parent().removeClass();
						$('#email').parent().addClass("form_error");
						$('#email').siblings("span").text('Sorry... Email already taken');
					}else if (response == 'not_taken') {
						email_state = true;
						$('#email').parent().removeClass();
						$('#email').parent().addClass("form_success");
						$('#email').siblings("span").text('Email available');
					}
				}
			});
		});

		$('#submit_reg').on('click', function(){
			var username = $('#username').val();
			var email = $('#email').val();
			var password = $('#password').val();

			if (username_state == false || email_state == false) {
				$('#error_msg').text('Fix the errors in the form first');
			}else{
				// proceed with form submission
				$.ajax({
					url: "<?php echo SURL.'Login/register' ?>",
					type: 'post',
					data: {
						'save' : 1,
						'email' : email,
						'username' : username,
						'password' : password,
					},
					success: function(response){
						alert('user saved');
						$('#username').val('');
						$('#email').val('');
						$('#password').val('');
					}
				});
			}

		});
	});