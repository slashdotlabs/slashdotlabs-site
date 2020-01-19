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


    // Products datatable
    const tbProducts = $('#tb-products');
    const dtProducts = tbProducts.DataTable({
        processing: true,
        serverSide: true,
        url: "{{url('products.index')}}",
        columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'product_name', name: 'product_name'},
        {data: 'product_type', name: 'product_type'},
        {data: 'product_description', name: 'product_description'},
        {data: 'price', name: 'price'},
        {data: 'action', name: 'action'},
        ],
        columnDefs: [
            {targets: [1,2,3], class: 'text-left'},
            {targets: [0,4], class: 'text-right'},
            {targets: 5, class: 'text-center'},
            {targets: 0, width: "13%"},
            {targets: 4, width: "13%"},
            {targets: 5, width: "18%"},
            {targets: 5, orderable: false},
            {targets: 0 }
        ]
    });
});


