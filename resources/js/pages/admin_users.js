import { removeObserver } from "simplebar";

$(() => {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Override a few DataTable defaults
    jQuery.extend(jQuery.fn.dataTable.ext.classes, {
        sWrapper: "dataTables_wrapper dt-bootstrap4"
    });


    // Users datatable
    const suspendUserForm = $('#suspend-user-form');
    const restoreUserForm = $('#restore-user-form');
    const tbUsers = $('#tb-users');
    const dtUsers = tbUsers.DataTable({
        ajax: {
            url: `${baseURL}/admin/users`,
            method: 'GET',
            dataSrc: 'data'
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'user_type', name: 'user_type'},
            {data: 'suspended', name: 'suspended'},
            {data: 'action', name: 'action'},
        ],
        columnDefs: [
            {targets: [1,2,3,4], class: 'text-left'},
            {targets: 0, class: 'text-right'},
            {targets: [5,6], class: 'text-center'},
            {targets: 0, width: "10%"},
            {targets: 6, orderable: false},
            {targets: 5, render : function (data, type, row) {
                return data == '1' ? `<span class="badge badge-warning">Suspended</span>` :
                `<span class="badge badge-success">Active</span>`
            },
        },
        ]
    });

    //Show Add User Modal
    $('#createNewUser').click(function () {
        $('#btn-add-user').val("create-user");
        $('#user_id').val('');
        $('#add-user-form').trigger("reset");
        $('#modal-add-user').modal('show');
    });

    //Add User
    $('#btn-add-user').click(function (e) {
        e.preventDefault();
        var storeUrl = `${baseURL}/admin/users/`;
        $.ajax({
        data: $('#add-user-form').serialize(),
        url: storeUrl,
        type: "POST",
        dataType: 'json',
        success: function (response) {
            $('#add-user-form').trigger("reset");
            $('#modal-add-user').modal('hide');
            dtUsers.ajax.reload();
            if (response.success) {
                $('#success-msg').append('<div class="alert alert-success" role="alert">'+response.success+'</div>');
            }
            setTimeout(function(){
                $('#success-msg').html('');
            }, 5000);
        },
        error: function (response) {
                var i, x = "";
				var errors = response.responseJSON;
				console.log(errors);
				for (i in errors) {
                    x = errors[i];
				  	$('#add-error-msg').append(`<div class="alert alert-danger" role="alert">${x}</div>`);
				}
				setTimeout(function(){
			        $('#add-error-msg').html('');
			    }, 5000);
			}
    });
    });



    const suspendUserModal = $('#modal-suspend-user');
    // show suspend user modal
    tbUsers.on('click', '.suspend-user', event => {
        event.preventDefault();
        const _this = $(event.target);
        const rowData = dtUsers.row(_this.closest('tr')).data();

         // Fill modal with data
        suspendUserForm.find('[name=user_id]').val(rowData['id']);
        suspendUserForm.find('#suspend-user-name').val(rowData['first_name'].concat(' ').concat(rowData['last_name']));
        // Show modal
        suspendUserModal.modal('show');
    });

    const restoreUserModal = $('#modal-restore-user');
    // show restore user modal
    tbUsers.on('click', '.restore-user', event => {
        event.preventDefault();
        const _this = $(event.target);
        const rowData = dtUsers.row(_this.closest('tr')).data();

         // Fill modal with data
        restoreUserForm.find('[name=user_id]').val(rowData['id']);
        restoreUserForm.find('#restore-user-name').val(rowData['first_name'].concat(' ').concat(rowData['last_name']));
        // Show modal
        restoreUserModal.modal('show');
    });

    // Suspend the users account
    $('#btn-suspend-user').on('click',event => suspendUserForm.trigger('submit') );
    suspendUserForm.on('submit',event => {
        event.preventDefault();
        const _this = $(event.target);
        const userId = _this.find('input[name=user_id]').val();
        const targetURL = `${baseURL}/admin/users/suspend/${userId}`;
        const user_info = {};
        _this.serializeArray().filter(field => !['user_id','_method'].includes(field.name))
        .forEach(field => {
            user_info[field.name] = field.value;
        });

        console.log(targetURL);

        $.ajax({
            url: targetURL,
            method: 'put',
            data: user_info,
            success: Response => {
                dtUsers.ajax.reload();
                suspendUserModal.modal('hide');
            },
            error: Response => {
                //var i, x = "";
                var errors = Response.responseJSON;
                console.log(errors);
            }
        })
    });


    // Restore the users account
    $('#btn-restore-user').on('click',event => restoreUserForm.trigger('submit') );
    restoreUserForm.on('submit',event => {
        event.preventDefault();
        const _this = $(event.target);
        const userId = _this.find('input[name=user_id]').val();
        const targetURL = `${baseURL}/admin/users/restore/${userId}`;
        const user_info = {};
        _this.serializeArray().filter(field => !['user_id','_method'].includes(field.name))
        .forEach(field => {
            user_info[field.name] = field.value;
        });

        console.log(targetURL);

        $.ajax({
            url: targetURL,
            method: 'put',
            data: user_info,
            success: Response => {
                dtUsers.ajax.reload();
                suspendUserModal.modal('hide');
            },
            error: Response => {

                var errors = Response.responseJSON;
                console.log(errors);
            }
        })
    });
});
