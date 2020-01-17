$(() => {
    // Override a few DataTable defaults
    jQuery.extend(jQuery.fn.dataTable.ext.classes, {
        sWrapper: "dataTables_wrapper dt-bootstrap4"
    });


    // Hosting packages datatable
    const tbOrders = $('#tb-orders');
    const dtOrders = tbOrders.DataTable({
        columnDefs: [
            {targets: "_all", class: 'text-left'},
            {targets: [0], width: "15%"},
            {targets: [5], orderable: false},
            {targets: 0 }
        ]
    });
});
