<!-- Add User Modal -->
<div class="modal fade" id="modal-add-user" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slideup" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Add New User</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
            <form id="add-user-form">
                <div class="block-content">
                    <!-- Error Alert Message -->
                        <div id="add-error-msg"> </div>
                    <!-- End of Error Alert Message -->
                    <input type="hidden" name="user_id" id="id"> <!-- Hidden User ID -->
                <div class="form-group">
                    <div class="form-group">
                        <label for="first-name"> First Name</label>
                        <input type="text" class="form-control form-control-m" id="first_name" name="first_name" placeholder="Enter the first name.." value ="" required>
                    </div>
                    <div class="form-group">
                        <label for="last-name"> Last Name</label>
                        <input type="text" class="form-control form-control-m" id="last_name" name="last_name" placeholder="Enter the last name.." value ="" required>
                    </div>
                    <div class="form-group">
                        <label for="email-address"> Email Address </label>
                        <input type="email" class="form-control form-control-m" id="email" name="email" placeholder="Enter the email address.." value ="" required>
                    </div>
                    <div class="form-group">
                        <label for="user-type">User Type</label>
                        <select class="form-control form-control-m" id="user_type" name="user_type" required>
                            <option value="">Select a user type</option>
                            <option value="customer">Customer</option>
                            <option value="employee">Employee</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password"> Password</label>
                        <input type="password" class="form-control form-control-m" id="password" name="password" placeholder="Enter the user password.." value ="" required>
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-alt-success" id="btn-add-user">Add User</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- END Add User Modal -->
