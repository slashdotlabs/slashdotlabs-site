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


    // Products datatable
    const updateProductsForm = $('#update-product-form');
    const tbProducts = $('#tb-products');
    const dtProducts = tbProducts.DataTable({
        ajax: {
            scrollX: true,
            url: `${baseURL}/admin/products`,
            method: 'GET',
            dataSrc: ''
        },
        columns: [
            {data: 'product_name', name: 'product_name'},
            {data: 'product_type', name: 'product_type', orderable: false},
            {data: 'product_description', name: 'product_description'},
            {data: 'price', name: 'price', class: 'text-nowrap'},
            {data: 'status_badge', name: 'status_badge'},
            {data: 'action', name: 'action', class: 'text-nowrap'},
        ],
        columnDefs: [
            {targets: [2, 3, 4], class: 'text-left'},
            {targets: [4, 5], class: 'text-center'},
            {targets: 5, orderable: false}
        ]
    });

    // Filtering products
    $("#product-type-filter-list input[type=checkbox]").on('click', event => {
        const _this = $(event.target);

        // get checked values
        let checked = _this.closest('#product-type-filter-list')
            .find('input[type=checkbox]:checked')
            .map((index, el) => el.value)
            .toArray();

        if (checked.length === 0) {
            //select all
            _this.closest('#product-type-filter-list')
                .find('input[type=checkbox]').each((index, el) => $(el).prop('checked', true));

            checked = _this.closest('#product-type-filter-list')
                .find('input[type=checkbox]:checked')
                .map((index, el) => el.value)
                .toArray();
        }
        dtProducts.column('product_type:name')
            .search(checked.join('|'), true)
            .draw();
    });

    //Show Add Product Modal
    $('#createNewProduct').click(function () {
        $('#btn-add-product').val("create-product");
        $('#product_id').val('');
        $('#add-product-form').trigger("reset");
        $('#modal-add-product').modal('show');
    });

    //Add Product
    $('#btn-add-product').click(function (e) {
        e.preventDefault();
        const storeUrl = `${baseURL}/admin/products`;
        $.ajax({
            data: $('#add-product-form').serialize(),
            url: storeUrl,
            type: "POST",
            dataType: 'json',
            success: function (response) {
                $('#productForm').trigger("reset");
                $('#modal-add-product').modal('hide');
                dtProducts.ajax.reload();
                if (response.success) {
                    $('#success-msg').append('<div class="alert alert-success" role="alert">' + response.success + '</div>');
                }
                setTimeout(function () {
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
                setTimeout(function () {
                    $('#add-error-msg').html('');
                }, 5000);
            }
        });
    });

    const editProductsModal = $('#modal-edit-product');
    // Show edit modal with details
    tbProducts.on('click', '.edit-product', event => {
        event.preventDefault();
        const _this = $(event.target);
        const rowData = dtProducts.row(_this.closest('tr')).data();

        // Fill modal with data
        updateProductsForm.find('[name=product_id]').val(rowData['id']);
        updateProductsForm.find('#edit-product-name').val(rowData['product_name']);
        updateProductsForm.find('#edit-product-description').val(rowData['product_description']);
        updateProductsForm.find('#edit-product-type').val(rowData['product_type']);
        updateProductsForm.find('#edit-product-price').val(rowData['price']);

        // Show modal
        editProductsModal.modal('show');
    });

    // Update product form submission
    $('#btn-update-product').on('click', event => updateProductsForm.trigger('submit'));
    updateProductsForm.on('submit', event => {
        event.preventDefault();
        const _this = $(event.target);
        const productId = _this.find('input[name=product_id]').val();
        const targetURL = `${baseURL}/admin/products/${productId}`;

        $.ajax({
            url: targetURL,
            method: 'POST',
            data: _this.serialize(),
            success: Response => {
                dtProducts.ajax.reload();
                editProductsModal.modal('hide');
                $('#success-msg').append('<div class="alert alert-success" role="alert">Product updated successfully.</div>');
                setTimeout(function () {
                    $('#success-msg').html('');
                }, 5000);
            },
            error: Response => {
                let i, x = "";
                let errors = Response.responseJSON;
                console.log(errors);
                for (i in errors) {
                    x = errors[i];
                    $('#update-error-msg').append(`<div class="alert alert-danger" role="alert">${x}</div>`);
                }
                setTimeout(function () {
                    $('#update-error-msg').html('');
                }, 5000);
            }
        });
    });

    //Fetch product to suspend modal.
    const suspendProductModal = $('#modal-suspend-product');
    const suspendProductForm = $('#suspend-product-form');

    tbProducts.on('click', '.suspend-product', event => {
        event.preventDefault();
        const _this = $(event.target);
        const rowData = dtProducts.row(_this.closest('tr')).data();

        suspendProductForm.find('[name=product_id]').val(rowData['id']);
        suspendProductForm.find('#suspend-product-name').val(rowData['product_name']);

        suspendProductModal.modal('show');

    });

    //Suspend Product
    $('#btn-suspend-product').on('click', event => suspendProductForm.trigger('submit'));
    suspendProductForm.on('submit', event => {
        event.preventDefault();
        const _this = $(event.target);
        const productId = _this.find('input[name=product_id]').val();
        const targetURL = `${baseURL}/admin/products/suspend/${productId}`;

        $.ajax({
            url: targetURL,
            method: 'POST',
            data: _this.serialize(),
            success: resp => {
                dtProducts.ajax.reload();
                suspendProductModal.modal('hide');
                $('#success-msg').append('<div class="alert alert-success" role="alert">Product has been suspended.</div>');
                setTimeout(function () {
                    $('#success-msg').html('');
                }, 5000);

            },
            error: resp => {
                $('#suspend-error-msg').append(`<div class="alert alert-danger" role="alert">An error occurred. Please try again</div>`);
                setTimeout(function () {
                    $('#suspend-error-msg').html('');
                }, 5000);
            }
        });
    });

    //Fetch product to restore modal.
    const restoreProductModal = $('#modal-restore-product');
    const restoreProductForm = $('#restore-product-form');

    tbProducts.on('click', '.restore-product', event => {
        event.preventDefault();
        const _this = $(event.target);
        const rowData = dtProducts.row(_this.closest('tr')).data();

        restoreProductForm.find('[name=product_id]').val(rowData['id']);
        restoreProductForm.find('#restore-product-name').val(rowData['product_name']);

        restoreProductModal.modal('show');

    });

    //Restore Product
    $('#btn-restore-product').on('click', event => restoreProductForm.trigger('submit'));
    restoreProductForm.on('submit', event => {
        event.preventDefault();
        const _this = $(event.target);
        const productId = _this.find('input[name=product_id]').val();
        const targetURL = `${baseURL}/admin/products/restore/${productId}`;

        $.ajax({
            url: targetURL,
            method: 'post',
            data: _this.serialize(),
            success: resp => {
                dtProducts.ajax.reload();
                restoreProductModal.modal('hide');
                $('#success-msg').append('<div class="alert alert-success" role="alert">Product has been restored successfully.</div>');
                setTimeout(function () {
                    $('#success-msg').html('');
                }, 5000);

            },
            error: resp => {
                $('#restore-error-msg').append(`<div class="alert alert-danger" role="alert">An error occurred. Please try again</div>`);
                setTimeout(function () {
                    $('#restore-error-msg').html('');
                }, 5000);
            }
        });
    });

});



