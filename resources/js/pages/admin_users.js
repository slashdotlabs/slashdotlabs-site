$(() => {
    // Override a few DataTable defaults
    jQuery.extend(jQuery.fn.dataTable.ext.classes, {
        sWrapper: "dataTables_wrapper dt-bootstrap4"
    });


    // Users datatable
    const tbUsers = $('#tb-users');
    const dtUsers = tbUsers.DataTable({
        columnDefs: [
            {targets: [1,2,3,4], class: 'text-left'},
            {targets: 0, class: 'text-right'},
            {targets: 5, class: 'text-center'},
            {targets: 0, width: "10%"},
            {targets: 5, orderable: false},
            {targets: 0 }
        ]
    });
});
