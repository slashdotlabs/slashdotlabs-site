@extends('layouts.master_admin')

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('../media/photos/animals.jpg');">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Dashboard</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">Welcome, John Doe!</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Breadcrumb <a class="breadcrumb-item" href="be_pages_ecom_dashboard.html">Home</a> -->
    <div class="bg-body-light border-b">
        <div class="content py-5 text-center">
            <nav class="breadcrumb bg-body-light mb-0">
                <span class="breadcrumb-item active">Home</span>
            </nav>
        </div>
    </div>
    <!-- END Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <!-- Statistics -->
        <!-- CountTo ([data-toggle="countTo"] is initialized in Helpers.coreAppearCountTo()) -->
        <!-- For more info and examples you can check out https://github.com/mhuggins/jquery-countTo -->
        <div class="row gutters-tiny">
            <!-- Earnings -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-transparent bg-gd-elegance" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-area-chart text-white-op"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="2420" data-before="$">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-white-op">Domains</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Earnings -->

            <!-- Orders -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-transparent bg-gd-dusk" href="be_pages_ecom_orders.html">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-archive text-white-op"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="35">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-white-op">Orders</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Orders -->

            <!-- New Customers -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-transparent bg-gd-sea" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-users text-white-op"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="15">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-white-op">New Customers</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END New Customers -->

            <!-- Conversion Rate -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-transparent bg-gd-aqua" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-cart-arrow-down text-white-op"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-white">5.6%</div>
                            <div class="font-size-sm font-w600 text-uppercase text-white-op">Conversion</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Conversion Rate -->
        </div>
        <!-- END Statistics -->
    </div>
@endsection