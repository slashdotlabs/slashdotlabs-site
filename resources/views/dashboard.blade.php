@extends('layouts.master_dashboard')

@section('content')
<!-- Page Content -->
<div class="content content-full">
    @include('partials.hero')
    @include('partials.overview')

    <!-- Tables -->

    <!-- Domains -->
    <div class="block" >
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
                    <tr>
                        <td class="text-center">101101</td>
                        <td class="font-w600">allanvikiru.co.ke</td>
                        <td class="text-center">10 January 2020</td>
                        <td class="text-center">09 January 2021</td>
                        <td class="text-center">Savanna</td>
                        <td class="text-center"><span class="badge badge-success">Active</span></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#modal-edit" >
                                Edit Name Server
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">202202</td>
                        <td class="font-w600">allanvikiru.info</td>
                        <td class="text-center">12 October 2018</td>
                        <td class="text-center">11 October 2019</td>
                        <td class="text-center">Kilimanjaro</td>
                        <td class="text-center"><span class="badge badge-danger">Inactive</span></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#modal-edit" >
                                Edit Name Server
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">303303</td>
                        <td class="font-w600">allanvikiru.net</td>
                        <td class="text-center">22 May 2019</td>
                        <td class="text-center">22 May 2020</td>
                        <td class="text-center">Kenya</td>
                        <td class="text-center"><span class="badge badge-success">Active</span></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#modal-edit" >
                                Edit Name Server
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">404404</td>
                        <td class="font-w600">allanvikiru.me</td>
                        <td class="text-center">15 January 2019</td>
                        <td class="text-center">14 January 2020</td>
                        <td class="text-center">Indian Ocean</td>
                        <td class="text-center"><span class="badge badge-primary">Due soon for renewal</span></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#modal-edit" >
                                Edit Name Server
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">505505</td>
                        <td class="font-w600">allanvikiru.com</td>
                        <td class="text-center">1 April 2019</td>
                        <td class="text-center">31 March 2020</td>
                        <td class="text-center">Atlantic Ocean</td>
                        <td class="text-center"><span class="badge badge-success">Active</span></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#modal-edit" >
                                Edit Name Server
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <!-- SSL Certificates -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title" id="certificate" >My SSL Certificates</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                <thead>
                    <tr>
                        <th class="ID"></th>
                        <th>Name</th>
                        <th>Activation Date</th>
                        <th>Expiry Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="font-w600">Geotrust RapidSSL Essential Certificate</td>
                        <td class="text-center">1 April 2019</td>
                        <td class="text-center">31 March 2020</td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="font-w600">Sectigo Essential Certificate</td>
                        <td class="text-center">12 December 2019</td>
                        <td class="text-center">31 December 2020</td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td class="font-w600">Geotrust QuickSSL Premium Certificate</td>
                        <td class="text-center">22 September 2019</td>
                        <td class="text-center">31 September 2021</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Packages -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title" id="packages">My Packages</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                    <small class="block-title">You have no packages yet.</small>
            </table>
        </div>
    </div>

    <!-- User Settings Tables -->
    @include('partials.settings')

    <!-- END Tables -->
<!-- END Page Content -->
@endsection

