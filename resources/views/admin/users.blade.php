@extends('layouts.master_admin')

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('../media/photos/users.jpg');">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">System Users</h1>
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
                <span class="breadcrumb-item active">System Users</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->
    <!-- Page Content -->
    <div class="content">
        <!-- Overview -->
        <h2 class="content-heading">Overview</h2>
        <div class="row gutters-tiny">
            <!-- Orders -->
            <div class="col-md-6">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-line-chart fa-2x text-body-bg-dark"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0" data-toggle="countTo" data-to="11">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Customers</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Orders -->

            <!-- In Cart -->
           <!--  <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-shopping-cart fa-2x text-body-bg-dark"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0" data-toggle="countTo" data-to="3">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">In Cart</div>
                        </div>
                    </div>
                </a>
            </div> -->
            <!-- END In Cart -->

            <!-- Edit Customer -->
          <!--   <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-user fa-2x text-info-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-info">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Edit Customer</div>
                        </div>
                    </div>
                </a>
            </div> -->
            <!-- END Edit Customer -->

            <!-- Remove Customer -->
            <div class="col-md-6">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-user fa-2x text-danger-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Remove Customer</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Remove Customer -->
        </div>
        <!-- END Overview -->

        <!-- Cart -->
        <h2 class="content-heading">Users</h2>
        <div class="block block-rounded">
            <div class="block-content bg-body-light">

                <!-- Search -->
                <form action="#" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Users..">
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
                <!-- Orders Table -->
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell">ID</th>
                            <th class="d-none d-sm-table-cell">First Name</th>
                            <th class="d-none d-sm-table-cell">Last Name</th>
                            <th class="d-none d-sm-table-cell">Email</th>
                            <th class="d-none d-sm-table-cell">Organisation</th>
                            <th class="text-right">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="d-none d-sm-table-cell">
                                109403
                            </td>
                            <td class="d-none d-sm-table-cell">
                                Allan
                            </td>
                            <td class="d-none d-sm-table-cell">
                               Vikiru
                            </td>
                            <td class="d-none d-sm-table-cell">
                                Allan@gmail.com
                            </td>
                            <td class="d-none d-sm-table-cell">
                                General Motors
                            </td>
                            <td class="text-right">
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-order" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Orders Table -->

                <!-- Navigation -->
                <nav aria-label="Orders navigation">
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
                            <a class="page-link" href="javascript:void(0)">8</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0)">9</a>
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
        <!-- END Orders -->
        <!-- END Cart -->


    </div>
@endsection
