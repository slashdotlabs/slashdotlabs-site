@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
        <div class="content content-full">
            <!-- Hero -->
            <div class="block block-rounded block-transparent bg-primary">
                <div class="block-content bg-pattern bg-black-op-25" style="background-image: url('assets/media/various/bg-pattern.png');">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Dashboard</h1>
                        <h2 class="h4 font-w400 text-white-op">Hello, Allan Vikiru! </h2>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Overview -->
            <h2 class="h4 font-w300 mt-50">Overview</h2>
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <a class="block block-link-shadow">
                        <div class="block-content block-content-full text-center">
                            <div class="p-20 mb-5">
                                <i class="fa fa-3x fa-globe text-primary"></i>
                            </div>
                            <p class="font-size-lg font-w600 mb-0">
                                
                            </p>
                            <p class="font-size-sm text-uppercase font-w600 text-muted mb-0">
                                Active Domains
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full text-center">
                            <div class="p-20 mb-5">
                                <i class="fa fa-3x fa-server text-elegance"></i>
                            </div>
                            <p class="font-size-lg font-w600 mb-0">
                                
                            </p>
                            <p class="font-size-sm text-uppercase font-w600 text-muted mb-0">
                                Hosting
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-link-shadow">
                        <div class="block-content block-content-full text-center">
                            <div class="p-20 mb-5">
                                <i class="fa fa-3x fa-diamond text-pulse"></i>
                            </div>
                            <p class="font-size-lg font-w600 mb-0">
                                
                            </p>
                            <p class="font-size-sm text-uppercase font-w600 text-muted mb-0">
                                Package Details
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full text-center">
                            <div class="p-20 mb-5">
                                <i class="fa fa-3x fa-credit-card text-gray-dark"></i>
                            </div>
                            <p class="font-size-lg font-w600 mb-0">
                                
                            </p>
                            <p class="font-size-sm text-uppercase font-w600 text-muted mb-0">
                                Payments
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- END Overview -->

            <!-- Domains -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">My Domains</h3>
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
                    <h3 class="block-title">My SSL Certificates</h3>
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
                    <h3 class="block-title">My Packages</h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                            <h4 class="block-title"><small>You have no packages yet.</small></h3>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Settings -->
            <!-- Profile -->
            <h2 class="h4 font-w300 mt-50">Settings</h2>
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="fa fa-pencil fa-fw mr-5 text-muted"></i> Profile
                    </h3>
                </div>
                <div class="block-content">
                    <div class="row items-push">
                        <div class="col-lg-3">
                            <p class="text-muted">
                                Your account’s vital information.
                            </p>
                        </div>
                        <div class="col-lg-7 offset-lg-1">
                            <div class="form-group">
                                <label for="hosting-settings-profile-name">Name</label>
                                <input type="text" class="form-control form-control-lg" id="hosting-settings-name" name="hosting-settings-name" placeholder="Enter your name.." value="Allan Vikiru">
                            </div>
                            <div class="form-group">
                                <label for="hosting-settings-profile-email">Email Address</label>
                                <input type="email" class="form-control form-control-lg" id="hosting-settings-email" name="hosting-settings-email" placeholder="Enter your email.." value="hosting@example.com">
                            </div>
                            <div class="form-group">
                                <label for="hosting-settings-profile-email">Phone Number</label>
                                <input type="email" class="form-control form-control-lg" id="hosting-settings-phone" name="hosting-settings-phone" placeholder="Enter your phone number.." value="0712345678">
                            </div>
                            <div class="form-group">
                                <label for="hosting-settings-profile-email">Password</label>
                                <input type="password" class="form-control form-control-lg" id="hosting-settings-password" name="hosting-settings-password" placeholder="Enter your email.." value="password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-alt-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Address -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        <i class="fa fa-building fa-fw mr-5 text-muted"></i> Address
                    </h3>
                </div>
                <div class="block-content">
                    <div class="row items-push">
                        <div class="col-lg-3">
                            <p class="text-muted">
                                This information is only used for invoicing.
                            </p>
                        </div>
                        <div class="col-lg-7 offset-lg-1">
                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="hosting-settings-address-firstname">First Name</label>
                                        <input type="text" class="form-control form-control-lg" id="hosting-settings-address-firstname" name="hosting-settings-address-firstname" value="Allan" disabled>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="hosting-settings-address-lastname">Last Name</label>
                                        <input type="text" class="form-control form-control-lg" id="hosting-settings-address-lastname" name="hosting-settings-address-lastname" value="Vikiru" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hosting-settings-address-street-1">Organisation</label>
                                <input type="text" class="form-control form-control-lg" id="hosting-settings-organisation" name="hosting-settings-organisation" value="SDL">
                            </div>
                            <div class="form-group">
                                <label for="hosting-settings-address-street-2">Address</label>
                                <input type="text" class="form-control form-control-lg" id="hosting-settings-address" name="hosting-settings-address" value="Kilimani">
                            </div>
                            <div class="form-group">
                                <label for="hosting-settings-address-city">City</label>
                                <input type="text" class="form-control form-control-lg" id="hosting-settings-city" name="hosting-settings-city" value="Nairobi">
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="hosting-settings-address-postal">Country</label>
                                    <input type="text" class="form-control form-control-lg" id="hosting-settings-country" name="hosting-settings-country" value="Kenya">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-alt-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Settings -->
    <!-- END Page Content -->
@endsection


@section('modal')

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">Edit Name Server</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="si si-close"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
              <div class="form-group">
                  <label for="hosting-settings-profile-email">Name Server</label>
                  <input type="text" class="form-control form-control-lg" id="hosting-settings-nameserver" name="hosting-settings-nameserver" placeholder="Enter your new nameserver.." value="allanvikiru.org">
              </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-alt-primary" data-dismiss="modal">Update</button>
        </div>
    </div>
</div>

@endsection
