@extends('layouts.master_admin')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/admin_orders.js') }}"></script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('{{ asset('media/photos/orders.jpg') }}');">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Product Orders</h1>
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
        <div class="block block-rounded" id="orders-block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Orders</h3>
            </div>
            <div class="block-content">
                @if(empty($orders))
                    <p>No orders are available in the database.</p>
            @else
                <!-- Orders Table -->
                    <table id="tb-orders" class="table table-borderless table-striped w-100 table-vcenter">
                        <thead class="text-uppercase">
                        <tr>
                            <th>Order ID</th>
                            <th>Status</th>
                            <th>Customer</th>
                            <th>Price (KES)</th>
                            <th>Purchase Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
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
    @include('admin.partials.modals.add_new_payment_modal')
@endsection
