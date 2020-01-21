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
					$('#message-success').append('<div class="alert alert-success" role="alert">'+Response.success+'</div>');
				}

				setTimeout(function(){
			        $('#message-success').html('');
			    }, 5000);
			},

			error: response => {
				const errors = response.responseJSON;
				$('#message-danger').append(`<div class="alert alert-danger" role="alert">${errors.email[0]}</div>`);

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
					$('#bio-success').append('<div class="alert alert-success" role="alert">'+Response.success+'</div>');
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
				  	$('#bio-danger').append(`<div class="alert alert-danger" role="alert">${x}</div>`);
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
					$('#password-success').append('<div class="alert alert-success" role="alert">'+Response.success+'</div>');
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
				  	$('#password-danger').append(`<div class="alert alert-danger" role="alert">${x}</div>`);
				}
				setTimeout(function(){
			        $('#password-danger').html('');
			    }, 5000);
			}
		});
	});

});
