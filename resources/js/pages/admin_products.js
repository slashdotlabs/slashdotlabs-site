$(() => {
    // Override a few DataTable defaults
    jQuery.extend(jQuery.fn.dataTable.ext.classes, {
        sWrapper: "dataTables_wrapper dt-bootstrap4"
    });


    // Products datatable
    const tbProducts = $('#tb-products');
    const dtProducts = tbProducts.DataTable({
        columnDefs: [
            {targets: [1,2,3], class: 'text-left'},
            {targets: [0,4], class: 'text-right'},
            {targets: 5, class: 'text-center'},
            {targets: 0, width: "13%"},
            {targets: 4, width: "13%"},
            {targets: 5, orderable: false},
            {targets: 0 }
        ]
    });
});
