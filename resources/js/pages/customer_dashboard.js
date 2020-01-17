$(() => {
    // Override a few DataTable defaults
    jQuery.extend(jQuery.fn.dataTable.ext.classes, {
        sWrapper: "dataTables_wrapper dt-bootstrap4"
    });


    // ?Hosting packages datatable
    const tbHostingPackages = $('#tb-hosting-packages');
    const dtHostingPackages = tbHostingPackages.DataTable({
        columnDefs: [
            {targets: "_all", class: 'text-center'},
            {targets: 0, width: "15%"},
            {targets: [4], orderable: false}
        ]
    });

    // ?SSL certificates datatable
    const tbSslCertificates = $('#tb-ssl-certificates');
    const dtSslCertificates = tbSslCertificates.DataTable({
        columnDefs: [
            {targets: "_all", class: 'text-center'},
            {targets: 0, width: "15%"},
            {targets: [3], orderable: false}
        ]
    });

    // ?Customer domain datatable
    const tbCustomerDomains = $("#tb-customer-domains");
    const dtCustomerDomains = tbCustomerDomains.DataTable({
        columnDefs: [
            {targets: "_all", class: 'text-center'},
            {targets: 0, width: "15%"},
            {targets: [3,4], orderable: false}
        ]
    });
});
