$(() => {
    // Override a few DataTable defaults
    jQuery.extend(jQuery.fn.dataTable.ext.classes, {
        sWrapper: "dataTables_wrapper dt-bootstrap4"
    });

    // Set default properties
    const toast = Swal.mixin({
        buttonsStyling: false,
        customClass: {
            confirmButton: 'btn btn-alt-success m-5',
            cancelButton: 'btn btn-alt-danger m-5',
            input: 'form-control'
        }
    });


    // ?Orders datatable
    const tbOrders = $('#tb-orders');
    const dtOrders = tbOrders.DataTable({
        scrollX: true,
        ajax: {
            url: `${baseURL}/admin/orders`,
            method: 'get',
            dataSrc: ''
        },
        columns: [
            {data: 'order_id'},
            {data: 'status_badge'},
            {data: order => order['customer']['full_name']},
            {data: 'total_amount'},
            {data: 'created_at'},
            {data: 'action'}
        ],
        columnDefs: [
            {targets: [0, 3], class: 'text-right'},
            {targets: [5], class: 'text-center'},
            {targets: [0, 1], width: "13%"},
            {targets: [2], width: "20%"},
            {targets: [4, 5], orderable: false},
        ]
    });

    // ?display order details
    const tbOrderDetails = $('#tb-order-items');
    const orderDetailsModal = $('#order-details-modal');
    const dtOrderDetails = tbOrderDetails.DataTable({
        paging: false,
        columns: [
            {
                data: record => record['product']['product_name'] ? record['product']['product_name'] : record['product']['domain_name']
            },
            {
                data: record => record['product']['product_type'] ? record['product']['product_type'].toUpperCase() : 'domain'.toUpperCase()
            },
            {data: 'expiry_date'},
            {
                data: record => {
                    switch (record['item_status']) {
                        case 'active':
                            return `<span class="badge badge-success">Active</span>`;
                        case 'expiring_soon':
                            return `<span class="badge badge-warning">Expiring Soon</span>`;
                        case 'expired':
                            return `<span class="badge badge-danger">Expired</span>`;
                    }
                }
            },
        ],
        columnDefs: [
            {targets: [1, 2], class: 'text-left'},
            {targets: [3], class: 'text-center'},
            {targets: [3], orderable: false},
        ]
    });

    tbOrders.on('click', '.show-order-items', event => {
        const _this = $(event.target);
        const rowData = dtOrders.row(_this.closest('tr')).data();
        const orderDetails = rowData['order_items'];
        const orderId = rowData['order_id'];
        orderDetailsModal.find('#order-id').text(orderId);

        dtOrderDetails.clear();
        dtOrderDetails.rows.add(orderDetails).draw();
        dtOrderDetails.columns.adjust().draw();

        orderDetailsModal.modal('show');
    });

    // ?Suspend order event
    tbOrders.on('click', '.btn-cancel-order', event => {
        event.preventDefault();
        const _this = $(event.target);
        const rowData = dtOrders.row(_this.closest('tr')).data();

        // ?Confirm cancel order
        toast.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, cancel order!',
            cancelButtonText: 'Don\'t cancel order'
        }).then(result => {
            if (result.value) {
                Codebase.blocks('#orders-block', 'state_loading');

                //? Cancel order
                axios.post(`${baseURL}/admin/orders/${rowData['order_id']}/cancel`)
                    .then(res => {
                        console.log(res);
                        if (res.data['success']) {
                            // Success
                            toast.fire(
                                'Cancelled!',
                                `Order: ${res.data['order']['order_id']} has been cancelled.`,
                                'success'
                            );
                            dtOrders.ajax.reload();
                        }
                    })
                    .catch(res => {
                        //console.log(res);
                        toast.fire(
                            'Error!',
                            `An unexpected error occurred, contact support.`,
                            'danger'
                        );
                    })
                    .finally(() => Codebase.blocks('#orders-block', 'state_normal'));
            }
        });
    });

    // ?Payment addition
    // ?Show modal
    const orderPaymentModal = $('#order-payment-modal');
    const orderPaymentForm = $('#order-payment-form');
    tbOrders.on('click', '.btn-add-payment', event => {
        event.preventDefault();
        const _this = $(event.target);
        const rowData = dtOrders.row(_this.closest('tr')).data();

        orderPaymentModal.find('#order-id').text(rowData['order_id']);
        orderPaymentForm.find('[name=order_id]').val(rowData['order_id']);
        orderPaymentModal.modal('show');
    });

    // ?On modal hide
    orderPaymentModal.on('hide.bs.modal', () => {
        orderPaymentForm[0].reset();
    });

    // ?Form submission
    orderPaymentForm.on('submit', event => {
        event.preventDefault();
        const _this = $(event.target);
        const data = new FormData(_this[0]);

        Codebase.blocks('#add-payment-block', 'state_loading');

        axios.post(`${baseURL}/admin/payments`, data)
            .then(res => {
                // Success
                toast.fire(
                    'Success!',
                    `Order: <span class="text-info">${res.data['payment']['order_id']}</span> has been paid.`,
                    'success'
                );
                dtOrders.ajax.reload();
                orderPaymentModal.modal('hide');
            })
            .catch(res => {
                if(res['data']) {
                    toast.fire(
                        'Error!',
                        `An unexpected error occurred, contact support.`,
                        'warning'
                    );
                }
            })
            .finally(() => {
                Codebase.blocks('#add-payment-block', 'state_normal');
                _this[0].reset();
            });


    });
});
