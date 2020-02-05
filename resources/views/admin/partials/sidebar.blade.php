<div class="sidebar-content">
    <!-- Side Header -->
    <div class="content-header content-header-fullrow px-15 bg-black-op-10">
        <!-- Normal Mode -->
        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                <i class="fa fa-times text-danger"></i>
            </button>
            <!-- END Close Sidebar -->

            <!-- Logo -->
            <div class="content-header-item">
                <a class="font-w700 mr-5" href="#"> <img src="{{ asset('/media/favicons/favicon-32x31.png') }}" alt="">
                    <span class="font-size-l text-dual-primary-dark">Slash Dot Labs</span> </a>
            </div>
            <!-- END Logo -->
        </div>
        <!-- END Normal Mode -->
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li>
                <a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home"></i><span class="sidebar-mini-hide">Dashboard</span></a>
            </li>
            <li class="nav-main-heading">
                <span class="sidebar-mini-visible">MG</span><span class="sidebar-mini-hidden">MANAGE</span></li>
            <li>
                <a href="{{ url('/admin/products') }}"><i class="fa fa-tags"></i><span class="sidebar-mini-hide">Products</span></a>
            </li>
            <li>
                <a href="{{ url('/admin/orders') }}"><i class="fa fa-shopping-bag"></i><span class="sidebar-mini-hide">Orders</span></a>
            </li>
            <li>
                <a href="{{ url('/admin/payments') }}"><i class="fa fa-money"></i><span class="sidebar-mini-hide">Payments</span></a>
            </li>
            <li>
                <a href="{{ url('/admin/customers') }}"><i class="fa fa-user-o"></i><span class="sidebar-mini-hide">Customers</span></a>
            </li>

            @if (Auth::user()->user_type == 'admin')
                <li class="nav-main-heading">
                    <span class="sidebar-mini-visible">SU</span><span class="sidebar-mini-hidden">SYSTEM</span></li>
                <li>
                <li>
                    <a href="{{ url('/admin/users') }}"><i class="fa fa-users"></i><span class="sidebar-mini-hide">Users</span></a>
                </li>
                <li>
                    <a href="{{ url('/admin/domaincart_config') }}"><i class="fa fa-edit"></i><span class="sidebar-mini-hide">Domaincart Config</span></a>
                </li>
                <li>
                    <a href="{{ url('/admin/system_logs') }}"><i class="fa fa-list-alt"></i><span class="sidebar-mini-hide">Logs</span></a>
                </li>
            @endif
        </ul>
    </div>
    <!-- END Side Navigation -->
</div>

