@extends('layouts.master_admin')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('../media/photos/products.jpg');">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Site Products</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Breadcrumb  -->
    <div class="bg-body-light border-b">
        <div class="content py-5 text-center">
            <nav class="breadcrumb bg-body-light mb-0">
                <a class="breadcrumb-item" href="/admin/dashboard">Home</a>
                <span class="breadcrumb-item active">Products</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <!-- Overview -->
        <h2 class="content-heading">Overview</h2>
        <div class="row gutters-tiny">
            <!-- All Domains -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-globe fa-2x text-info-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-info" data-toggle="countTo" data-to="24">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Domains</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Domains -->

            <!-- Packages -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-diamond fa-2x text-danger-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-warning" data-toggle="countTo" data-to="15">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Hosting Packages</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Packages -->

            <!-- SSL Certificates -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-certificate fa-2x text-warning-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-danger" data-toggle="countTo" data-to="4">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">SSL Certificates</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Out of Stock -->

            <!-- Add Product -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" id="createNewProduct">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-archive fa-2x text-success-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-success">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">New Product</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Add Product -->
        </div>
        <!-- END Overview -->

        <!-- Products -->
        <div class="content-heading">
            Products
        </div>
        <div class="block block-rounded">
            <div class="block-content">
                <!-- Products Table -->
                <table class="table table-borderless table-striped table-vcenter js-dataTable-full" id="products-table">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell">Product ID</th>
                            <th class="d-none d-sm-table-cell">Name</th>
                            <th class="d-none d-sm-table-cell">Type</th>
                            <th class="d-none d-sm-table-cell">Description</th>
                            <th class="d-none d-sm-table-cell">Price (KES) </th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($products))
                        @foreach ($products as $product)
                        <tr>
                            <td class="d-none d-sm-table-cell">
                                {{ $product -> id }}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{ $product -> product_name }}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{ $product -> product_type }}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{ $product -> product_description }}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{ $product -> price }}
                            </td>
                            <td class="text-right">
                                <div class="form-group row">
                                    <div class= "col-sm-12 col-md-4">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit-product" >
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class= "col-sm-12 col-md-4">
                                        <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#modal-suspend-product" >
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class= "col-sm-12 col-md-4">
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-product" >
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <!-- END Products Table -->
            </div>
        </div>
        <!-- END Products -->
    </div>
@endsection

@section('products_ajax')
<!--Products AJAX Script -->

<script>
  $(document).ready(function() {
    $('#products-table').DataTable();
  });
 </script>

<script type="text/javascript">
$(function () {

    $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
    });

   /*var table = $('#products-table').DataTable({
       processing: true,
       serverSide: true,
       ajax: "{{ route('products.index') }}",
       columns: [
           {data: 'id', name: 'id'},
           {data: 'product_name', name: 'product_name'},
           {data: 'product_type', name: 'product_type'},
           {data: 'product_description', name: 'product_description'},
           {data: 'price', name: 'price'},
           {data: 'action', name: 'action', orderable: false, searchable: false},
       ]
    }); */

    $('#createNewProduct').click(function () {
        $('#saveBtn').val("create-product");
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#modal-add-product').modal('show');
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');

        $.ajax({
          data: $('#productForm').serialize(),
          url: "{{ route('products.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#productForm').trigger("reset");
              toastr.success('New Product Added Successfully.', {timeOut: 500})
              $('#modal-add-product').modal('hide');
              table.draw();

          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Add Product');
          }
      });
    });

});
</script>
@endsection
