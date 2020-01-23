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
    <script src="{{ asset('js/pages/admin_payments.js') }}"></script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('../media/photos/payments.jpeg');">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Payments</h1>
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
                <span class="breadcrumb-item active">Payments</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <!-- Payments -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Payments</h3>
            </div>
            <div class="block-content">
                <!-- Payments Table -->
                    <table id="tb-payments" class="table table-bordered table-striped table-vcenter">
                        <thead class="text-uppercase">
                        <tr>
                            <th>Payment ID </th>
                            <th>Customer ID</th>
                            <th>Order ID</th>
                            <th>Payment Type</th>
                            <th>Reference no</th>
                            <th>Amount</th>
                            <th>Currency</th>
                        </tr>
                        </thead>
                        <tbody> 
                        </tbody>
                    </table>
            <!-- END Payments Table -->
            </div>
        </div>
        <!-- END Payments -->
    </div>
@endsection
