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
            {data: 'full_name', name: 'full_name'},
            {data: 'email', name: 'email'},
            {data: 'user_type', name: 'user_type'},
            {
                data: row => {
                    return row['suspended'] === "1" ? `<span class="badge badge-warning">Suspended</span>` :
                        `<span class="badge badge-success">Active</span>`;
                },
                name: 'suspended'
            },
            {data: 'action', name: 'action'},
        ],
        columnDefs: [
            {targets: 0, class: 'text-right', width: "1%"},
            {targets: 3, render: data => data.charAt(0).toUpperCase()+data.slice(1) },
            {targets: [0, 5], orderable: false},
        ]
    });

    //Show
    // User Modal
    $('#createNewUser').click(function () {
        $('#btn-add-user').val("create-user");
        $('#user_id').val('');
        $('#add-user-form').trigger("reset");
        $('#modal-add-user').modal('show');
    });

    //Add User
    $('#btn-add-user').click(function (e) {
        e.preventDefault();
        const storeUrl = `${baseURL}/admin/users`;
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
                    $('#success-msg').append('<div class="alert alert-success" role="alert">' + response.success + '</div>');
                }
                setTimeout(function () {
                    $('#success-msg').html('');
                }, 5000);
            },
            error: function (response) {
                let i, x = "";
                let errors = response.responseJSON;
                for (i in errors) {
                    x = errors[i];
                    $('#add-error-msg').append(`<div class="alert alert-danger" role="alert">${x}</div>`);
                }
                setTimeout(function () {
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
    $('#btn-suspend-user').on('click', event => suspendUserForm.trigger('submit'));
    suspendUserForm.on('submit', event => {
        event.preventDefault();
        const _this = $(event.target);
        const userId = _this.find('input[name=user_id]').val();
        const targetURL = `${baseURL}/admin/users/suspend/${userId}`;

        $.ajax({
            url: targetURL,
            method: 'post',
            data: _this.serialize(),
            success: Response => {
                dtUsers.ajax.reload();
                suspendUserModal.modal('hide');
            },
            error: Response => {
                const errors = Response.responseJSON;
                console.log(errors);
            }
        })
    });


    // Restore the users account
    $('#btn-restore-user').on('click', event => restoreUserForm.trigger('submit'));
    restoreUserForm.on('submit', event => {
        event.preventDefault();
        const _this = $(event.target);
        const userId = _this.find('input[name=user_id]').val();
        const targetURL = `${baseURL}/admin/users/restore/${userId}`;

        $.ajax({
            url: targetURL,
            method: 'post',
            data: _this.serialize(),
            success: Response => {
                dtUsers.ajax.reload();
                suspendUserModal.modal('hide');
            },
            error: Response => {
                const errors = Response.responseJSON;
                console.log(errors);
            }
        })
    });
});
