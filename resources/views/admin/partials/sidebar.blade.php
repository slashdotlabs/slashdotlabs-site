<div class="sidebar-content">
    <!-- Side Header -->
    <div class="content-header content-header-fullrow px-15">
        <!-- Mini Mode -->
        <div class="content-header-section sidebar-mini-visible-b">
            <!-- Logo -->
            <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                <img src="../media/favicons/favicon-32x31.png" alt="">
            </span>
            <!-- END Logo -->
        </div>
        <!-- END Mini Mode -->

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
                <a class="font-w700 mr-5" href="#">
                  <img src="../media/favicons/favicon-32x31.png" alt="">
                  <span class="font-size-l text-dual-primary-dark">Slash Dot Labs</span>
                </a>
            </div>
            <!-- END Logo -->
        </div>
        <!-- END Normal Mode -->
    </div>
    <!-- END Side Header -->

    <!-- Side User -->
    <div class="content-side content-side-full content-side-user px-10 align-parent">
        <!-- Visible only in mini mode -->
        <div class="sidebar-mini-visible-b align-v animated fadeIn">
            <img class="img-avatar img-avatar32" src="../media/avatars/avatar15.jpg" alt="">
        </div>
        <!-- END Visible only in mini mode -->

        <!-- Visible only in normal mode -->
        <div class="sidebar-mini-hidden-b text-center">
            <a class="img-link">
                <img class="img-avatar" src="../media/avatars/avatar15.jpg" alt="">
            </a>
            <ul class="list-inline mt-10">
                <li class="list-inline-item">
                    <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" data-toggle="layout" data-action="side_overlay_toggle">{{ Auth::user()->get_name() }}</a>
                </li>
            </ul>
        </div>
        <!-- END Visible only in normal mode -->
    </div>
    <!-- END Side User -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li>
                <a href="/admin/dashboard"><i class="fa fa-home"></i><span class="sidebar-mini-hide">Dashboard</span></a>
            </li>
            <li class="nav-main-heading"><span class="sidebar-mini-visible">PR</span><span class="sidebar-mini-hidden">Products</span></li>
            <li>
                <a href="/admin/products"><i class="fa fa-tags"></i><span class="sidebar-mini-hide">Manage Products</span></a>
            </li>
            <li class="nav-main-heading"><span class="sidebar-mini-visible">OD</span><span class="sidebar-mini-hidden">Orders</span></li>
            <li>
                <a href="/admin/orders"><i class="fa fa-shopping-bag"></i><span class="sidebar-mini-hide">Manage Orders</span></a>
            </li>
            <li class="nav-main-heading"><span class="sidebar-mini-visible">US</span><span class="sidebar-mini-hidden">Users</span></li>
            <li>
                <a href="/admin/users"><i class="fa fa-users"></i><span class="sidebar-mini-hide">Manage System Users</span></a>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</div>
