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
            {data: ({customer}) => customer['full_name'], name: 'customer'},
            {data: 'order_id', name: 'order_id'},
            {data: 'payment_type', name: 'payment_type', width:'15%'},
            {data: 'payment_ref', name: 'payment_ref'},
            {data: 'amount', name: 'amount', width:'15%'},
        ],
        columnDefs: [
            {targets: [ 2, 4], class: 'text-right'},
            {targets: [3], orderable: false}
        ]
    });

});
