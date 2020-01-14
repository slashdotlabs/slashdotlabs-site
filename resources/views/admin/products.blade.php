@extends('layouts.master_admin')

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
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Domains Sold</div>
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
                <a class="block block-rounded block-link-shadow" data-toggle="modal" data-target="#modal-add-product">
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
            Products (43) <!--count of all products -->
        </div>
        <div class="block block-rounded">
            <div class="block-content bg-body-light">
                <!-- Search -->
                <form action="be_pages_ecom_products.html" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search products..">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END Search -->
            </div>
            <div class="block-content">
                <!-- Products Table -->
                <table class="table table-borderless table-striped">
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
                        <tr>
                            <td class="d-none d-sm-table-cell">
                                179203
                            </td>
                            <td class="d-none d-sm-table-cell">
                                .com Domain
                            </td>
                            <td class="d-none d-sm-table-cell">
                                Domain
                            </td>
                            <td class="d-none d-sm-table-cell">
                                Domain name with .com extension.
                            </td>
                            <td class="d-none d-sm-table-cell">
                                7500
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
                        <tr>
                            <td class="d-none d-sm-table-cell">
                                202429
                            </td>
                            <td class="d-none d-sm-table-cell">
                                Indian Ocean
                            </td>
                            <td class="d-none d-sm-table-cell">
                                Hosting Package
                            </td>
                            <td class="d-none d-sm-table-cell">
                                10 GB Storage with Domain plus ICDSoft hosting.
                            </td>
                            <td class="d-none d-sm-table-cell">
                                5500
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
                        <tr>
                            <td class="d-none d-sm-table-cell">
                                278464
                            </td>
                            <td class="d-none d-sm-table-cell">
								Geotrust QuickSSL Premium Certificate
                            </td>
                            <td class="d-none d-sm-table-cell">
                                SSL Certificate
                            </td>
                            <td class="d-none d-sm-table-cell">
                                For protecting online transactions and applications with SSL.
                            </td>
                            <td class="d-none d-sm-table-cell">
                                14900
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
                    </tbody>
                </table>
                <!-- END Products Table -->

                <!-- Navigation -->
                <nav aria-label="Products navigation">
                    <ul class="pagination justify-content-end">
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                <span aria-hidden="true">
                                    <i class="fa fa-angle-left"></i>
                                </span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0)">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0)">2</a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="javascript:void(0)">...</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0)">39</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0)">40</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                <span aria-hidden="true">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- END Navigation -->
            </div>
        </div>
        <!-- END Products -->
    </div>
@endsection
