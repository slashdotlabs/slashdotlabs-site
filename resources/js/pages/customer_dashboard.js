$(() => {
    // Override a few DataTable defaults
    jQuery.extend(jQuery.fn.dataTable.ext.classes, {
        sWrapper: "dataTables_wrapper dt-bootstrap4"
    });


    // Hosting packages datatable
    const tbHostingPackages = $('#tb-hosting-packages');
    const dtHostingPackages = tbHostingPackages.DataTable({
        columnDefs: [
            {targets: "_all", class: 'text-center'},
            {targets: 0, width: "15%"}
        ]
    });
});
