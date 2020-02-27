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
    <script src="{{ asset('js/pages/admin_users.js') }}"></script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('{{ asset('media/photos/users.jpg') }}');">
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
                <a class="breadcrumb-item" href="{{ url('admin/dashboard') }}">Home</a>
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
            <!-- All Customers -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-users fa-2x text-info-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-info" data-toggle="countTo" data-to="{{ $counts['customer'] ?? 0 }}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Customers</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Customers -->

            <!-- Employees -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-address-card-o fa-2x text-danger-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-warning" data-toggle="countTo" data-to="{{ $counts['employee'] ?? 0 }}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Employees</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Employees -->

            <!-- Admins -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-id-badge fa-2x text-warning-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-danger" data-toggle="countTo" data-to="{{ $counts['admin'] ?? 0 }}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Administrators</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Admins -->

            <!-- Add User -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" id="createNewUser">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-user fa-2x text-success-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-success">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">New User</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Add User -->
        </div>
        <!-- END Overview -->



        <!-- Users Table -->
        <h2 class="content-heading">Users</h2>
        <div class="block block-rounded">

            <div class="block-content">
                <!-- Success Alert Message -->
                    <div id="success-msg"></div>
                <!-- End of Success Alert Messages -->
                <!-- Products Table -->
                <table id="tb-users" class="table table-borderless table-striped table-vcenter" >
                    <thead class="text-uppercase">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            <!-- END Products Table -->
            </div>
        </div>
    </div>
@endsection
@section('modals')
    @include('admin.partials.modals.add_user_modal')
    @include('admin.partials.modals.suspend_user_modal')
    @include('admin.partials.modals.restore_user_modal')
@endsection


