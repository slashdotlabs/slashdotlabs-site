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
    <script src="{{ asset('js/pages/admin_orders.js') }}"></script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('../media/photos/orders.jpg');">
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
                <a class="breadcrumb-item" href="{{ url('/admin/dashboard') }}">Home</a>
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
            End Sort Orders by Duration -->Orders
        </div>
        <div class="block block-rounded">
            <div class="block-content">
                @if(empty($orders))
                    <p>No orders are available in the database.</p>
            @else
                <!-- Orders Table -->
                    <table id="tb-orders" class="table table-sm table-bordered table-striped table-vcenter">
                        <thead class="text-uppercase">
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Price (KES)</th>
                            <th>Purchase Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{ $order['order_id'] }}
                                </td>
                                <td>
                                    {{ $order['customer']->get_fullname() }}
                                </td>
                                <td>
                                    {{ $order['total_amount'] }}
                                </td>
                                <td>
                                    {{ $order['created_at'] }}
                                </td>
                                <td>
                                    @if($order['paid'])
                                        <span class="badge badge-success">Paid</span>
                                    @else
                                        <span class="badge badge-warning">Not paid</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button data-order-id="{{ $order['order_id'] }}" data-order-items="{{ $order['order_items'] }}" type="button" class="btn btn-sm btn-alt-info show-order-items">
                                            Order Items
                                        </button>
                                        <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="dropdown">
                                            <i class="si si-arrow-down"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            @if(!$order['paid'])
                                                <a class="dropdown-item" href="javascript:void(0)"> Add payment </a>
                                                <div class="dropdown-divider"></div>
                                            @endif
                                            <a class="dropdown-item" href="javascript:void(0)"> Suspend Order </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            @endif
            <!-- END Orders Table -->
            </div>
        </div>
        <!-- END Orders -->
    </div>
@endsection

@section('modals')
    @include('admin.partials.modals.order_items_modal')
@endsection
