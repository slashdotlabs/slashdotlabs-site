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


    // Payments datatable
    const tbPayments = $('#tb-payments');
    const dtPayments = tbPayments.DataTable({
        ajax: {
            url: `${baseURL}/admin/payments`,
            method: 'GET',
            dataSrc: 'data'
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {
                data: entry => {
                    return entry['customer']['full_name'];
                },
                name: 'customer'
            },
            {data: 'order_id', name: 'order_id'},
            {data: 'payment_type', name: 'payment_type', width:'15%'},
            {data: 'payment_ref', name: 'payment_ref'},
            {data: 'amount', name: 'amount', width:'15%'},
        ],
        columnDefs: [
            {targets: [0, 2, 5], class: 'text-right'},
            {targets: 0, width: "1%"},
            {targets: [0, 4], orderable: false}
        ]
    });

});
