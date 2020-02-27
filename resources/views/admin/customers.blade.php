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
    {{--    <script src="{{ asset('js/pages/admin_customers.js') }}"></script>--}}
    <script>
        // Override a few DataTable defaults
        jQuery.extend(jQuery.fn.dataTable.ext.classes, {
            sWrapper: "dataTables_wrapper dt-bootstrap4"
        });

        //? Customers datatable
        const tbCustomers = $('#tb-customers');
        tbCustomers.DataTable();
    </script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('{{ asset('media/photos/users.jpg') }}');">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Customers</h1>
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
                <span class="breadcrumb-item active">Customers</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->

    <div class="content">
        <!-- Customers -->
        <div class="block block-rounded" id="customers-block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Customers</h3>
            </div>
            <div class="block-content">
                @if(empty($customers))
                    <p>No customers are available in the database.</p>
            @else
                <!-- Customers Table -->
                    <table id="tb-customers" class="table table-borderless table-striped table-vcenter table-responsive w-100">
                        <thead class="text-uppercase">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Organization</th>
                            <th>Address</th>
                            <th>City/Country</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td nowrap>{{ $customer['full_name'] }}</td>
                                <td nowrap>{{ $customer['email'] }}</td>
                                <td>{{ $customer['customer_biodata']['phone_number'] ?? 'N/A' }}</td>
                                <td>{{ $customer['customer_biodata']['organization'] ?? 'N/A' }}</td>
                                <td>{{ $customer['customer_biodata']['address'] ?? 'N/A' }}</td>
                                <td>{{ $customer['customer_biodata']['city'] ?? '' }} / {{ $customer['customer_biodata']['country'] ?? '' }} </td>
                                <td>
                                    @if($customer['suspended'])
                                        <span class="badge badge-warning">Suspended</span>
                                    @else
                                        <span class="badge badge-success">Active</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            @endif
            <!-- END Customers Table -->
            </div>
        </div>
        <!-- END Customers -->
    </div>
@endsection
