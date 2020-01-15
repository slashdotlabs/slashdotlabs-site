<!-- Side Overlay-->
<aside id="side-overlay">
    <!-- Side Header -->
    <div class="content-header content-header-fullrow">
        <div class="content-header-section align-parent">
            <!-- Close Side Overlay -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                <i class="fa fa-times text-danger"></i>
            </button>
            <!-- END Close Side Overlay -->

            <!-- User Info -->
            <div class="content-header-item">
                <a class="img-link mr-5" href="javascript:void(0)">
                    <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
                </a>
                <a class="align-middle link-effect text-primary-dark font-w600" href="javascript:void(0)">{{ Auth::user()->get_name() }}</a>
            </div>
            <!-- END User Info -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Side Content -->
    <div class="content-side">
        <h3 class="block-title">
            My Profile
        </h3>
        <div class="block-content">
            <form action="be_pages_dashboard.html" method="post" onsubmit="return false;">
                <div class="form-group mb-15">
                    <label for="side-overlay-profile-name">Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="admin-settings-name" name="user-settings-name" placeholder="Enter your name.." value="Allan Vikiru">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-15">
                    <label for="side-overlay-profile-email">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="admin-settings-email" name="user-settings-email" placeholder="Enter your email.." value="hosting@example.com">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-15">
                    <label for="side-overlay-profile-password">New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="admin-settings-password" name="user-settings-password" placeholder="New Password..">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-asterisk"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-15">
                    <label for="side-overlay-profile-password-confirm">Confirm New Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="admin-password-confirm" name="user-password-confirm" placeholder="Confirm New Password..">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-asterisk"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-block btn-alt-primary">
                            <i class="fa fa-refresh mr-5"></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Side Content -->
</aside>
<!-- END Side Overlay -->
