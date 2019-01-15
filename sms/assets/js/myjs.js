/*mao ni siya mo toggle side bar menu close and open*/
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});


/*
code below if login form e submit or e click and submit iya e process ang inside code
*/
$(document).on('submit', '#login_form', function(event) {
	event.preventDefault();
	/* Act on the event */
	var userName = $('input[id=username]');
	var password = $('input[id=pwd]');
	var status = true;

	$.ajax({
		url: base_url+'User/check_user',
		type: 'POST',
		dataType: 'json',
		data: {
			username: userName.val(),
			password: password.val()
		},
		success: function(event){
			if(event.status == status){
				window.location.href = base_url+'admin';
			}else{
				$('.msg').text('Invalid username or password!');
			}
		},
		error: function(event){
			alert('Error Ajax Request Login');
		}
	});

});