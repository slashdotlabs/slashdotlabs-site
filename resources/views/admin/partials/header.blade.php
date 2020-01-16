<!-- Header Content -->
 <div class="content-header">
    <!-- Left Section -->
    <div class="content-header-section">
        <!-- Toggle Sidebar -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-navicon"></i>
        </button>
        <!-- END Toggle Sidebar -->
    </div>
    <!-- END Left Section -->

    <!-- Right Section -->
    <div class="content-header-section">
        <!-- User Dropdown -->
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user d-sm-none"></i>
                <span class="d-none d-sm-inline-block">{{ Auth::user()->get_name() }}</span>
                <i class="fa fa-angle-down ml-5"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">Settings</h5>
                <a class="dropdown-item" href= "javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                    <i class="si si-user mr-5"></i> My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="op_auth_signin.html">
                    <i class="si si-logout mr-5"></i> Sign Out
                </a>
            </div>
        </div>
        <!-- END User Dropdown -->
    </div>
    <!-- END Right Section -->
</div>
<!-- END Header Content -->