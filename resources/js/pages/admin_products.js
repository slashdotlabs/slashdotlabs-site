$(() => {
    // Override a few DataTable defaults
    jQuery.extend(jQuery.fn.dataTable.ext.classes, {
        sWrapper: "dataTables_wrapper dt-bootstrap4"
    });


    // Hosting packages datatable
    const tbProducts = $('#tb-products');
    const dtProducts = tbProducts.DataTable({
        columnDefs: [
            {targets: "_all", class: 'text-center'},
            {targets: 0 }
        ]
    });
});
