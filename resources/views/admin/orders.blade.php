@extends('layouts.master_admin')

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('assets/media/photos/animals.jpg');">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Product Orders
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
                <span class="breadcrumb-item active">Orders</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <!-- Orders -->

        <div class="content-heading">

            <!-- Sort Orders by Duration: Today, This Week, This Month, All Time
            <div class="dropdown float-right">
                <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" id="ecom-orders-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Today
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ecom-orders-drop">
                    <a class="dropdown-item active" href="javascript:void(0)">
                        <i class="fa fa-fw fa-calendar mr-5"></i>Today
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="fa fa-fw fa-calendar mr-5"></i>This Week
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="fa fa-fw fa-calendar mr-5"></i>This Month
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="fa fa-fw fa-calendar mr-5"></i>This Year
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="fa fa-fw fa-circle-o mr-5"></i>All Time
                    </a>
                </div>
            </div>
            End Sort Orders by Duration -->

            Orders (2) <!-- 35: count of all orders -->
        </div>
        <div class="block block-rounded">
            <div class="block-content bg-body-light">

                <!-- Search -->
                <form action="#" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search orders..">
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
                            <th class="d-none d-sm-table-cell">Order ID</th>
                            <th class="d-none d-sm-table-cell">Product</th>
                            <th class="d-none d-sm-table-cell">Customer</th>
                            <th class="d-none d-sm-table-cell">Amount</th>
                            <th class="d-none d-sm-table-cell">Currency</th>
                            <th class="d-none d-sm-table-cell">Expiry Date</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="d-none d-sm-table-cell">
                                109403
                            </td>
                            <td class="d-none d-sm-table-cell">
                                Kilimanjaro Package
                            </td>
                            <td class="d-none d-sm-table-cell">
                                Allan Vikiru
                            </td>
                            <td class="d-none d-sm-table-cell">
                                4500
                            </td>
                            <td class="d-none d-sm-table-cell">
                                KES
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2020-12-01
                            </td>
                            <td class="text-right">
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-order" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="d-none d-sm-table-cell">
                                295609
                            </td>
                            <td class="d-none d-sm-table-cell">
                                Geotrust RapidSSL Essential Certificate
                            </td>
                            <td class="d-none d-sm-table-cell">
                                Allan Vikiru
                            </td>
                            <td class="d-none d-sm-table-cell">
                                78
                            </td>
                            <td class="d-none d-sm-table-cell">
                                USD
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2020-09-01
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
    </div>
@endsection