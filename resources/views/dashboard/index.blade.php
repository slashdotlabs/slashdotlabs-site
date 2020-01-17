@extends('layouts.master_dashboard')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/customer_dashboard.js') }}"></script>
@endsection


@section('content')
    <!-- Page Content -->
    <div class="content content-full">
    @include('dashboard.partials.overview')

    <!-- Domains -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title" id="domains">My Domains</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Name Server</th>
                        <th>Activation Date</th>
                        <th>Expiry Date</th>
                        <th>Hosting Package</th>
                        <th>Status</th>
                        <th class="text-center" style="width: 15%;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($customer_domains) > 0)
                        @foreach($customer_domains as $domains)
                            <tr>
                                <td class="text-center">{{ $domains->id}}</td>
                                <td class="font-w600">{{ $domains->domain_name }}</td>
                                <td class="text-center">{{ $domains->created_at }}</td>
                                @if($order_items)
                                    <td class="text-center">{{ $order_items->expiry_date }}</td>
                                    <td class="text-center">{{ $order_items->product_type }}</td>
                                @else
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                @endif
                                <td class="text-center"><span class="badge badge-success">Active</span></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#modal-edit">
                                        Edit Name Server
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <span class="badge badge-danger">No Domains Purchased Yet</span>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- SSL Certificates -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title" id="certificate">My SSL Certificates</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                    <tr>
                        <th class="ID">ID</th>
                        <th>Name</th>
                        <th>Activation Date</th>
                        <th>Expiry Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center"></td>
                        <td class="font-w600"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Packages -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title" id="packages">Hosting Packages</h3>
            </div>
            <div class="block-content block-content-full">
                @if(empty($hosting_packages))
                    <p>You have no packages</p>
                @else
                    <table id="tb-hosting-packages" class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead class="text-uppercase">
                        <tr>
                            <td>order id</td>
                            <td>package name</td>
                            <td>package description</td>
                            <td>Expiry Date</td>
                            <td>Status</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hosting_packages as $package)
                            <tr>
                                <td>{{ $package['order_id'] }}</td>
                                <td>{{ $package['package_name'] }}</td>
                                <td>{{ $package['package_description'] }}</td>
                                <td>{{ $package['expiry_date'] }}</td>
                                <td>
                                    @switch($package['status'])
                                        @case('active')
                                        <span class="badge badge-success">Active</span>
                                        @break
                                        @case('expiring_soon')
                                        <span class="badge badge-warning">Expiring Soon</span>
                                        @break
                                        @case('expired')
                                        <span class="badge badge-danger">Expired</span>
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
        <!-- END Page Content -->
@endsection

