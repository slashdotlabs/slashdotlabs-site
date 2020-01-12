 <!-- User Settings Tables -->
            <!-- Profile -->
            <h2 class="h4 font-w300 mt-50" id="profile">Settings</h2>
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
