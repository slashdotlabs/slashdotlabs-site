@extends('layouts.master_admin')

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('../media/photos/animals.jpg');">
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
                <a class="breadcrumb-item" href="admin_dashboard.html">Home</a>
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
            <!-- Orders -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-line-chart fa-2x text-body-bg-dark"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0" data-toggle="countTo" data-to="39">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Orders</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Orders -->

            <!-- In Cart -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-shopping-cart fa-2x text-body-bg-dark"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0" data-toggle="countTo" data-to="3">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">In Cart</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END In Cart -->

            <!-- Edit Customer -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-user fa-2x text-info-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-info">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Edit Customer</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Edit Customer -->

            <!-- Remove Customer -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-user fa-2x text-danger-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-danger">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Remove Customer</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Remove Customer -->
        </div>
        <!-- END Overview -->

        <!-- Addresses -->
        <h2 class="content-heading">Addresses</h2>
        <div class="row row-deck gutters-tiny">
            <!-- Billing Address -->
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Billing Address</h3>
                    </div>
                    <div class="block-content">
                        <div class="font-size-lg text-black mb-5">John Smith</div>
                        <address>
                            5110 8th Ave<br>
                            New York 11220<br>
                            United States<br><br>
                            <i class="fa fa-phone mr-5"></i> (999) 111-222222<br>
                            <i class="fa fa-envelope-o mr-5"></i> <a href="javascript:void(0)">company@example.com</a>
                        </address>
                    </div>
                </div>
            </div>
            <!-- END Billing Address -->

            <!-- Shipping Address -->
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Shipping Address</h3>
                    </div>
                    <div class="block-content">
                        <div class="font-size-lg text-black mb-5">John Smith</div>
                        <address>
                            5110 8th Ave<br>
                            New York 11220<br>
                            United States<br><br>
                            <i class="fa fa-phone mr-5"></i> (999) 111-222222<br>
                            <i class="fa fa-envelope-o mr-5"></i> <a href="javascript:void(0)">company@example.com</a>
                        </address>
                    </div>
                </div>
            </div>
            <!-- END Shipping Address -->
        </div>
        <!-- END Addresses -->

        <!-- Cart -->
        <h2 class="content-heading">Cart</h2>
        <div class="block block-rounded">
            <div class="block-content">
                <!-- Products Table -->
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th style="width: 100px;">ID</th>
                            <th class="d-none d-sm-table-cell" style="width: 120px;">Status</th>
                            <th class="d-none d-sm-table-cell" style="width: 120px;">Submitted</th>
                            <th>Product</th>
                            <th class="d-none d-md-table-cell">Category</th>
                            <th class="text-right">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.424</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-danger">Out of Stock</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/09/27                        </td>
                            <td>
                                <a href="be_pages_ecom_product_edit.html">Product #24</a>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <a href="be_pages_ecom_products.html">Hobby</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$25</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.423</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-success">Available</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/09/26                        </td>
                            <td>
                                <a href="be_pages_ecom_product_edit.html">Product #23</a>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <a href="be_pages_ecom_products.html">Mobile Phones</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$71</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_product_edit.html">PID.422</a>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-success">Available</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/09/25                        </td>
                            <td>
                                <a href="be_pages_ecom_product_edit.html">Product #22</a>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <a href="be_pages_ecom_products.html">Auto - Moto</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$90</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Products Table -->
            </div>
        </div>
        <!-- END Cart -->

        <!-- Past Orders -->
        <h2 class="content-heading">Past Orders</h2>
        <div class="block block-rounded">
            <div class="block-content">
                <!-- Orders Table -->
                <table class="table table-borderless table-sm table-striped">
                    <thead>
                        <tr>
                            <th style="width: 100px;">ID</th>
                            <th style="width: 120px;">Status</th>
                            <th class="d-none d-sm-table-cell" style="width: 120px;">Submitted</th>
                            <th class="d-none d-sm-table-cell">Customer</th>
                            <th class="text-right">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_order.html">ORD.245</a>
                            </td>
                            <td>
                                <span class="badge badge-success">Completed</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/10/27                        </td>
                            <td class="d-none d-sm-table-cell">
                                <a href="be_pages_ecom_customer.html">John Smith</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$830</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_order.html">ORD.907</a>
                            </td>
                            <td>
                                <span class="badge badge-success">Completed</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/10/26                        </td>
                            <td class="d-none d-sm-table-cell">
                                <a href="be_pages_ecom_customer.html">John Smith</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$943</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_order.html">ORD.613</a>
                            </td>
                            <td>
                                <span class="badge badge-success">Completed</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/10/25                        </td>
                            <td class="d-none d-sm-table-cell">
                                <a href="be_pages_ecom_customer.html">John Smith</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$688</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_order.html">ORD.206</a>
                            </td>
                            <td>
                                <span class="badge badge-success">Completed</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/10/24                        </td>
                            <td class="d-none d-sm-table-cell">
                                <a href="be_pages_ecom_customer.html">John Smith</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$635</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="font-w600" href="be_pages_ecom_order.html">ORD.835</a>
                            </td>
                            <td>
                                <span class="badge badge-success">Completed</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                2017/10/23                        </td>
                            <td class="d-none d-sm-table-cell">
                                <a href="be_pages_ecom_customer.html">John Smith</a>
                            </td>
                            <td class="text-right">
                                <span class="text-black">$306</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Orders Table -->
            </div>
        </div>
        <!-- END Past Orders -->

        <!-- Private Notes -->
        <h2 class="content-heading">Private Notes</h2>
        <div class="block block-rounded">
            <div class="block-content">
                <div class="alert alert-info alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <p class="mb-0"><i class="fa fa-info-circle mr-5"></i> This note is only for internal use and will not be displayed to the customer.</p>
                </div>
                <form action="be_pages_ecom_customer.html" method="post" onsubmit="return false;">
                    <div class="form-group row mb-10">
                        <div class="col-12">
                            <textarea class="form-control" id="ecom-customer-note" name="ecom-customer-note" placeholder="Add a private note.." rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-alt-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Private Notes -->
    </div>
@endsection
