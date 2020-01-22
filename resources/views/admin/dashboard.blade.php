@extends('layouts.master_admin')

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/additional-methods.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/admin_settings.js') }}"></script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('../media/photos/animals.jpg');">
        <div class="bg-black-op-75">
            <div class="content content-top content-full text-center">
                <div class="py-20">
                    <h1 class="h2 font-w700 text-white mb-10">Dashboard</h1>
                    <h2 class="h4 font-w400 text-white-op mb-0">
                        Welcome,&nbsp;{{Auth::user()->first_name }}&nbsp;{{Auth::user()->last_name }}!
                    </h2>
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
            <!-- Products -->
            <div class="col-md-6 col-xl-4">
                <a class="block block-rounded block-transparent bg-gd-elegance" href="/admin/products">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-tags text-white-op"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{ $products->count() }}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-white-op">Products</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Earnings -->

            <!-- Orders -->
            <div class="col-md-6 col-xl-4">
                <a class="block block-rounded block-transparent bg-gd-dusk" href="/admin/orders">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-shopping-bag text-white-op"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{ $orders->count() }}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-white-op">Orders</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Orders -->

            <!-- New Customers -->
            <div class="col-md-6 col-xl-4">
                <a class="block block-rounded block-transparent bg-gd-sea" href="/admin/users">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-users text-white-op"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="{{ $users->count() }}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-white-op">System Users</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END System Users -->
        </div>
        <!-- END Statistics -->
    </div>
@endsection
