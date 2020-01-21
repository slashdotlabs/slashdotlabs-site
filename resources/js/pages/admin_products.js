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
            url: `${baseURL}/admin/products`,
            method: 'GET',
            dataSrc: 'data'
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'product_name', name: 'product_name'},
            {data: 'product_type', name: 'product_type'},
            {data: 'product_description', name: 'product_description'},
            {data: 'price', name: 'price'},
            {data: 'action', name: 'action'},
        ],
        columnDefs: [
            {targets: [1,2,3], class: 'text-left'},
            {targets: [0,4], class: 'text-right'},
            {targets: 5, class: 'text-center'},
            {targets: 0, width: "13%"},
            {targets: 4, width: "13%"},
            {targets: 5, width: "18%"},
            {targets: 5, orderable: false},
            {targets: 0 }
        ]
    });

    $('#createNewProduct').click(function () {
        $('#btn-add-product').val("create-product");
        $('#product_id').val('');
        $('#add-product-form').trigger("reset");
        $('#modal-add-product').modal('show');
    });

    $('#btn-add-product').click(function (e) {
        e.preventDefault();
        var storeUrl = `${baseURL}/admin/products/`;
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
				  	$('#error-msg').append(`<div class="alert alert-danger" role="alert">${x}</div>`);
				}
				setTimeout(function(){
			        $('#error-msg').html('');
			    }, 5000);
			}
    });
    });

    const editProductsModal = $('#modal-edit-product');
    // Show edit modal with details
    tbProducts.on('click','.edit-product',event =>{
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
    $('#btn-update-product').on('click',event => updateProductsForm.trigger('submit') );
    updateProductsForm.on('submit',event => {
        event.preventDefault();
        const _this = $(event.target);
        const productId = _this.find('input[name=product_id]').val();
        const targetURL = `${baseURL}/admin/products/${productId}`;
        const product_details = {};
        _this.serializeArray().filter(field => !['product_id','_method'].includes(field.name))
        .forEach(field => {
            product_details[field.name] = field.value;
        });

        $.ajax({
            url: targetURL,
            method: 'put',
            data: product_details,
            success: Response => {
                dtProducts.ajax.reload();
                editProductsModal.modal('hide');
                $('#success-msg').append('<div class="alert alert-success" role="alert">Product updated successfully.</div>');
                setTimeout(function(){
                    $('#success-msg').html('');
                }, 5000);
            },
            error: Response => {
                var i, x = "";
				var errors = Response.responseJSON;
				console.log(errors);
				for (i in errors) {
                    x = errors[i];
				  	$('#update-error-msg').append(`<div class="alert alert-danger" role="alert">${x}</div>`);
				}
				setTimeout(function(){
			        $('#update-error-msg').html('');
			    }, 5000);
			}
                // }).then(res => {
        //     console.log(res);
        //     dtProducts.ajax.reload();
        //     // remove modal
        //     editProductsModal.modal('hide');
        })
    });
});


