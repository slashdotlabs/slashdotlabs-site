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
                @if(empty($users))
                    <p>No users are available in the database.</p>
                @else
                <table id="tb-users" class="table table-sm table-bordered table-striped table-vcenter">
                    <thead class="text-uppercase">
                        <tr>
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user['id'] }}
                            </td>
                            <td>
                                {{ $user['first_name'] }}
                            </td>
                            <td>
                               {{ $user['last_name'] }}
                            </td>
                            <td>
                                {{ $user['email']}}
                            </td>
                            <td>
                                {{ $user['user_type']}}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#modal-suspend-user" >
                                        Suspend
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
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

