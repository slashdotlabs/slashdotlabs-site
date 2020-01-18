$(() => {
    // Override a few DataTable defaults
    jQuery.extend(jQuery.fn.dataTable.ext.classes, {
        sWrapper: "dataTables_wrapper dt-bootstrap4"
    });


    // Orders datatable
    const tbOrders = $('#tb-orders');
    const dtOrders = tbOrders.DataTable({
        columnDefs: [
            {targets: [1,2,4,5], class: 'text-left'},
            {targets: [0,3], class: 'text-right'},
            {targets: 6, class: 'text-center'},
            {targets: 0, width: "11%"},
            {targets: 5, orderable: false},
            {targets: 0 }
        ]
    });
});
