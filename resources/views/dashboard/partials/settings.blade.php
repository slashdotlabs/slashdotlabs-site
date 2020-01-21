<!-- User Settings -->
<!-- Handle form errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- End of error Handling -->

<!--User Account Settings -->
<div class="block pull-r-l">
    <div class="block-header bg-body-light">
        <h3 class="block-title">
            <i class="fa fa-fw fa-pencil font-size-default mr-5"></i>Profile </h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
        </div>
    </div>
    <div class="block-content">
        <p class="text-muted"> Your account’s vital information.</p>
        <!-- Alert Messages -->
        <div class="alert-success" id="message-success"></div>
        <div class="alert-danger" id="message-danger"></div>
        <!-- End of Alert Messages -->
        <!-- Profile Form -->
        <form id="form-profile" method="post">
            @csrf
            @method('patch')
            <div class="form-group mb-15">
                <label for="user-settings-firstname">First Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="user-settings-firstname" name="first_name" placeholder="Enter your first name.." value="{{ $user->first_name }}">
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
                    <input type="text" class="form-control" id="user-settings-lastname" name="last_name" placeholder="Enter your last name.." value="{{ $user->last_name }}">
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
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email.." value="{{ $user->email }}">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6"></div>
                <div class="col-6">
                    <button id="button" type="submit" class="btn btn-block btn-alt-primary">
                        <i class="fa fa-refresh mr-5"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div><!--END User Account Settings -->

<!--User Password Settings -->
<div class="block pull-r-l">
    <div class="block-header bg-body-light">
        <h3 class="block-title">
            <i class="fa fa-fw fa-lock font-size-default mr-5"></i>Password </h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
        </div>
    </div>
    <div class="block-content">
        <p class="text-muted">
            Your account password.
            <!-- Alert Messages -->
        <div class="alert-success" id="password-success"></div>
        <div class="alert-danger" id="password-danger"></div>
        <!-- End of Alert Messages --></p>
        <form id="form-change-password" method="post">
            <div class="form-group mb-15">
                @csrf
                @method('patch')
                <label for="current_password">Current Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password..">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-15">
                <label for="new_password">New Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password..">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-15">
                <label for="confirm_password">Confirm New Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirm_password" name="new_password_confirmation" placeholder="Confirm New Password..">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6"></div>
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn-alt-primary">
                        <i class="fa fa-refresh mr-5"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div><!--END User Password Settings -->

<!--User Address Settings -->
<div class="block pull-r-l">
    <div class="block-header bg-body-light">
        <h3 class="block-title">
            <i class="fa fa-fw fa-credit-card-alt font-size-default mr-5"></i>Billing Information </h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
        </div>
    </div>
    <div class="block-content">
        <p class="text-muted">This information is only used for invoicing. </p>
        <!-- Alert Messages -->
        <div class="alert-success" id="bio-success"></div>
        <div class="alert-danger" id="bio-danger"></div>

        <form id="form-biodata" method="post">
            @csrf
            @method('patch')
            <div class="form-group mb-15">
                <label for="organization">Organisation</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="organization" name="organization" placeholder="e.g. Slash Dot Labs" value="{{ $user->customer_biodata ? $user->customer_biodata->organization : '' }}">
                    <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-briefcase"></i>
                            </span>
                    </div>
                </div>
            </div>

            <div class="form-group mb-15">
                <label for="phone-number">Phone number</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="phone-number" name="phone_number" placeholder="2547xxxxxxxxxx" value="{{ $user->customer_biodata ? $user->customer_biodata->phone_number : '' }}">
                    <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-phone"></i>
                            </span>
                    </div>
                </div>
            </div>

            <div class="form-group mb-15">
                <label for="side-overlay-profile-name">Address</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="address" name="address" placeholder="e.g. Kilimani" value="{{ $user->customer_biodata ? $user->customer_biodata->address : '' }}">
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
                    <input type="text" class="form-control" id="city" name="city" placeholder="e.g. Nairobi" value="{{ $user->customer_biodata ? $user->customer_biodata->city : '' }}">
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
                    <input type="text" class="form-control" id="country" name="country" placeholder="e.g. Kenya" value="{{ $user->customer_biodata ? $user->customer_biodata->country : ''}}">
                    <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-flag"></i>
                            </span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6"></div>
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn-alt-primary">
                        <i class="fa fa-refresh mr-5"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div><!-- END User Address Settings -->
