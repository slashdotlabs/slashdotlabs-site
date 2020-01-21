$(() => {
    // Override a few DataTable defaults
    jQuery.extend(jQuery.fn.dataTable.ext.classes, {
        sWrapper: "dataTables_wrapper dt-bootstrap4"
    });


    // Orders datatable
    const tbOrders = $('#tb-orders');
    const dtOrders = tbOrders.DataTable({
        columnDefs: [
            {targets: [1], class: 'text-left'},
            {targets: [0, 2], class: 'text-right'},
            {targets: [4, 5], class: 'text-center'},
            {targets: 0, width: "11%"},
            {targets: [4, 5], orderable: false},
        ]
    });

    // display order details
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
        const orderDetails = _this.data('order-items');
        const orderId = _this.data('order-id');
        orderDetailsModal.find('#order-id').text(orderId);

        dtOrderDetails.clear();
        dtOrderDetails.rows.add(orderDetails).draw();
        dtOrderDetails.columns.adjust().draw();

        orderDetailsModal.modal('show');
    });

});
