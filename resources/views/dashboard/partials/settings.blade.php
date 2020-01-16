 <!-- User Settings -->

 <!--User Account Settings -->
 <div class="block pull-r-l">
    <div class="block-header bg-body-light">
        <h3 class="block-title">
            <i class="fa fa-fw fa-pencil font-size-default mr-5"></i>Profile
        </h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
        </div>
    </div>
    <div class="block-content">
        <p class="text-muted">
            Your account’s vital information.
        </p>
        <form action="#" method="post" onsubmit="return false;">
            <div class="form-group mb-15">
                <label for="side-overlay-profile-name">First Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="user-settings-firstname" name="user-settings-firstname" placeholder="Enter your first name.." value="Allan">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-15">
                <label for="side-overlay-profile-name">Last Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="user-settings-lastname" name="user-settings-lastname" placeholder="Enter your last name.." value="Vikiru">
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
                    <input type="email" class="form-control" id="user-settings-email" name="user-settings-email" placeholder="Enter your email.." value="{{
                    Auth::user()->email }}">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6"> </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn-alt-primary">
                        <i class="fa fa-refresh mr-5"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
 </div>
<!--END User Account Settings -->

<!--User Password Settings -->
<div class="block pull-r-l">
    <div class="block-header bg-body-light">
        <h3 class="block-title">
            <i class="fa fa-fw fa-lock font-size-default mr-5"></i>Password
        </h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
        </div>
    </div>
    <div class="block-content">
        <p class="text-muted">
            Your account password.
        </p>
        <form action="#" method="post" onsubmit="return false;">
            <div class="form-group mb-15">
                <label for="side-overlay-profile-password">Current Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="user-current-password" name="user-current-password" placeholder="Current Password..">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-15">
                <label for="side-overlay-profile-password">New Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="user-settings-new-password" name="user-settings-new-password" placeholder="New Password..">
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
                    <input type="password" class="form-control" id="user-password-confirm" name="user-password-confirm" placeholder="Confirm New Password..">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6"> </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn-alt-primary">
                        <i class="fa fa-refresh mr-5"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
 </div>
<!--END User Password Settings -->

<!--User Address Settings -->
<div class="block pull-r-l">
    <div class="block-header bg-body-light">
        <h3 class="block-title">
            <i class="fa fa-fw fa-credit-card-alt font-size-default mr-5"></i>Billing Information
        </h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
        </div>
    </div>
    <div class="block-content">
        <p class="text-muted">
            This information is only used for invoicing.
        </p>
        <form action="#" method="post" onsubmit="return false;">
            <div class="block-content block-content-full block-content-sm">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="hosting-settings-address-firstname">First Name</label>
                            <input type="text" class="form-control form-control-lg" id="address-settings-firstname" name="address-settings-firstname" value="{{ $user->first_name }}" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="hosting-settings-address-lastname">Last Name</label>
                            <input type="text" class="form-control form-control-lg" id="address-settings-lastname" name="address-settings-lastname" value="{{ $user->last_name}}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-15">
                <label for="side-overlay-profile-name">Organisation</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="address-settings-organisation" name="address-settings-organisation" placeholder="e.g. Slash Dot Labs" value="">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-briefcase"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-15">
                <label for="side-overlay-profile-name">Address</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="address-settings-address" name="address-settings-address" placeholder="e.g. Kilimani" value="">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-map-marker"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-15">
                <label for="side-overlay-profile-name">City/Town</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="address-settings-city" name="address-settings-city" placeholder="e.g. Nairobi" value="">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-building"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-15">
                <label for="side-overlay-profile-name">Country</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="address-settings-country" name="address-settings-country" placeholder="e.g. Kenya" value="">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-flag"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6"> </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn-alt-primary">
                        <i class="fa fa-refresh mr-5"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END User Address Settings -->

<!-- END User Settings -->
