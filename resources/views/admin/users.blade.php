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
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

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

        <!-- Users Table -->
        <h2 class="content-heading">Users</h2>
        <div class="block block-rounded">
            <div class="block-content">
                <table class="table table-borderless table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell">User ID</th>
                            <th class="d-none d-sm-table-cell">First Name</th>
                            <th class="d-none d-sm-table-cell">Last Name</th>
                            <th class="d-none d-sm-table-cell">Email</th>
                            <th class="d-none d-sm-table-cell">User Type</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Users Table -->
    </div>
@endsection

@section('users_ajax')
<!--Products AJAX Script -->
<script type="text/javascript">
    $(document).ready(function(){

    });
    </script>
@endsection
