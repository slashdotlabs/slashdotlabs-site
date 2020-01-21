@extends('layouts.master_dashboard')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/additional-methods.js') }}"></script>
    <script src="{{ asset('/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

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
                <h3 class="block-title" id="domains">Registered Domains</h3>
            </div>
            <div class="block-content block-content-full">
                @if(empty($customer_domains))
                    <p>You have no registered domains yet.</p>
                @else
                    <table id="tb-customer-domains" class="table table-bordered table-striped table-vcenter w-100">
                        <thead class="text-uppercase text-center">
                        <tr>
                            <th>Order ID</th>
                            <th>Domain Name</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customer_domains as $domain)
                            <tr>
                                <td>{{ $domain['order_id'] }}</td>
                                <td>{{ $domain['product']['domain_name'] }}</td>
                                <td>{{ $domain['expiry_date'] }}</td>
                                <td>
                                    @switch($domain['item_status'])
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
                                <td>
                                    <a href="#" class="edit-nameserver" data-domain-id="{{ $domain['product']['id'] }}" data-nameservers="{{$domain['product']['nameservers']}}">Update nameservers</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <!-- SSL Certificates -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title" id="certificate">SSL Certificates</h3>
            </div>
            <div class="block-content block-content-full">
                @if(empty($ssl_certificates))
                    <p>You have no SSL Certificates yet.</p>
                @else
                    <table id="tb-ssl-certificates" class="table table-bordered table-striped table-vcenter">
                        <thead class="text-uppercase">
                        <tr>
                            <th class="ID">Order id</th>
                            <th>Certificate Name</th>
                            <th>Expiry Date</th>
                            <th>status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ssl_certificates as $certificate)
                            <tr>
                                <td>{{ $certificate['order_id'] }}</td>
                                <td>{{ $certificate['product']['product_name'] }}</td>
                                <td>{{ $certificate['expiry_date'] }}</td>
                                <td>
                                    @switch($certificate['item_status'])
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

        <!-- Packages -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title" id="packages">Hosting Packages</h3>
            </div>
            <div class="block-content block-content-full">
                @if(empty($hosting_packages))
                    <p>You have no packages yet.</p>
                @else
                    <table id="tb-hosting-packages" class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead class="text-uppercase">
                        <tr>
                            <th>order id</th>
                            <th>package name</th>
                            <th>package description</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hosting_packages as $package)
                            <tr>
                                <td>{{ $package['order_id'] }}</td>
                                <td>{{ $package['product']['product_name'] }}</td>
                                <td>{{ $package['product']['product_description'] }}</td>
                                <td>{{ $package['expiry_date'] }}</td>
                                <td>
                                    @switch($package['item_status'])
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
    </div>
@endsection

@section('modals')
    @include('dashboard.partials.modals.update_nameserver_modal')
@endsection
