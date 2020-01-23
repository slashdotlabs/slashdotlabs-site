$(function () {
    // Customer profile form
    $('#form-profile').on('submit', function (e) {
        e.preventDefault();
        const url = `${baseURL}/admin/user`;
        const formdata = {};
        $(this).serializeArray().forEach(entry => {
            formdata[entry.name] = entry.value;
        });
        const {_token, _method} = formdata;
        const user_details = {
          'email': formdata.email, 'first_name': formdata.first_name, 'last_name': formdata.last_name
        };

        $.ajax({
            type: 'post',
            url,
            data: { _token, _method, user_details}
        }).then(response => {
            if (response.msg) {
                $('#message-success').append('<div class="alert alert-success" role="alert">' + response.msg + '</div>');
            }
            setTimeout(function () {
                $('#message-success').html('');
            }, 4000);
        }).catch(response => {
            const error = response['responseJSON'];
            $('#message-danger').append(`<div class="alert alert-danger" role="alert">${error}</div>`);
            setTimeout(function () {
                $('#message-danger').html('');
            }, 4000);
        });
    });

    // Change password form
    $('#form-change-password').on('submit', function (e) {
        e.preventDefault();
        const url = `${baseURL}/admin/password`;
        const data = $(this).serializeArray();
        $.ajax({
            type: 'post',
            url,
            data
        }).then(response => {
            if (response.msg) {
                $('#password-success').append('<div class="alert alert-success" role="alert">' + response.msg + '</div>');
                $("#form-change-password")[0].reset();
            }
            setTimeout(function () {
                $('#password-success').html('');
            }, 4000);
        }).catch(response => {
            const error = response['responseJSON'];
            $('#password-danger').append(`<div class="alert alert-danger" role="alert">${error}</div>`);
            setTimeout(function () {
                $('#password-danger').html('');
            }, 4000);
        });
    });
});
