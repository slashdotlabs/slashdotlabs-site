$(function() {
	// Customer profile form
	$('#form-profile').submit(function(e) {
		e.preventDefault();
		
		var route = $('#form-profile').data('route');
		var form_data = $(this);
		$('.alert').remove();
		$.ajax({
			type: 'POST',
			url: route,
			data:form_data.serialize(),
			success: function(Response) {

				//console.log(Response);
				if (Response.success) {
					$('#message-success').append('<p>'+Response.success+'</p>');
				}

				setTimeout(function(){
			        $('#message-success').html('');
			    }, 5000);
			}, 
			 
			error: response => {
				const errors = response.responseJSON;
				$('#message-danger').append(`<p>${errors.email[0]}</p>`);

				setTimeout(function(){
			        $('#message-danger').html('');
			    }, 5000);
			}
		});
	});


	// Bio data form
	$('#form-biodata').submit(function(e) {
		e.preventDefault();
		
		var route = $('#form-biodata').data('route');
		var form_data = $(this);
		$('.alert').remove();
		$.ajax({
			type: 'POST',
			url: route,
			data:form_data.serialize(),
			success: function(Response) {

				if (Response.success) {
					$('#bio-success').append('<p>'+Response.success+'</p>');
				}

				setTimeout(function(){
			        $('#bio-success').html('');
			    }, 5000);
			},
			error: function(Response) {
				var i, x = "";
				var errors = Response.responseJSON;
				//console.log(errors);
				for (i in errors) {
				  	x = errors[i];
				  	$('#bio-danger').append(`<p>${x}</p>`);
				}
				setTimeout(function(){
			        $('#bio-danger').html('');
			    }, 5000);
			}
		});
	});


	// Change password form
	$('#form-change-password').submit(function(e) {
		e.preventDefault();
		
		var route = $('#form-change-password').data('route');
		var form_data = $(this);
		$('.alert').remove();
		$.ajax({
			type: 'POST',
			url: route,
			data:form_data.serialize(),
			success: function(Response) {

				if (Response.success) {
					$('#password-success').append('<p>'+Response.success+'</p>');
				}
				setTimeout(function(){
			        $('#password-success').html('');
			    }, 5000);
			},
			error: function(Response) {
				
				var i, x = "";
				var errors = Response.responseJSON;
				//console.log(errors);
				for (i in errors) {
				  	x = errors[i];
				  	$('#password-danger').append(`<p>${x}</p>`);
				}
				setTimeout(function(){
			        $('#password-danger').html('');
			    }, 5000);
			}
		});
	});

});