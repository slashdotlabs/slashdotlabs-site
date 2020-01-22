<!-- TODO: Change Button Names on Suspend and Restore -->

<!-- Suspend User Modal -->
<div class="modal fade" id="modal-suspend-user" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Suspend User</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                      <form id="suspend-user-form" method="post">
                        @method('put')
                        <input type="hidden" name="user_id">
                        <div class="form-group">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material form-material">
                                        <input type="text" class="form-control form-control-sm" id="suspend-user-name" name="material-input-size-sm" disabled>
                                        <label for="material-input-size-sm">User Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="font-w600"> Are you sure you want to suspend this User? </div>
                        </div>
                        <div class="alert alert-info" role="alert">
                            <i class="fa fa-info" aria-hidden="true"></i>
                            &ensp;This user will be unable to access the system but their information will still be available in the database.
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-dark" data-dismiss="modal" id="btn-suspend-user">Suspend</button>
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- End Suspend User -->

<!-- Restore User Modal -->
<div class="modal fade" id="modal-restore-user" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Restore User</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                      <form id="restore-user-form" method="post">
                        @method('put')
                        <input type="hidden" name="user_id">
                        <div class="form-group">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material form-material">
                                        <input type="text" class="form-control form-control-sm" id="restore-user-name" name="material-input-size-sm" disabled>
                                        <label for="material-input-size-sm">User Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="font-w600"> Are you sure you want to restore this User? </div>
                        </div>
                        <div class="alert alert-info" role="alert">
                            <i class="fa fa-info" aria-hidden="true"></i>
                            &ensp;This user will be able to access the system again.
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-dark" data-dismiss="modal" id="btn-restore-user">Restore</button>
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- End Restore User -->


<!-- Order Modals -->
<!-- Confirm Suspend Order Modal -->
<div class="modal fade" id="modal-suspend-order" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Suspend Order</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="form-group">
                        <div class="font-w600"> Are you sure you want to suspend this order? </div>
                        <br/>
                        <div class="alert alert-info" role="alert">
                            <i class="fa fa-info" aria-hidden="true"></i>
                            &ensp;This order will be hidden from the customer but it will still be available in the database.
                         </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-dark" data-dismiss="modal" data-toggle="modal" data-target="#modal-restore-order" >Suspend</button>
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- END Confirm Suspend Order Modal -->

<!-- Confirm Restore Order Modal -->
<div class="modal fade" id="modal-restore-order" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Restore Order</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                <div class="form-group">
                    <div class="font-w600"> Are you sure you want to restore this order? </div>
                    <br/>
                    <div class="alert alert-info" role="alert">
                        <i class="fa fa-info" aria-hidden="true"></i>
                        &nbsp;This product will now be available to the customer.
                     </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-alt-dark" data-dismiss="modal">Restore</button>
            </div>
        </div>
    </div>
</div>
<!-- END Confirm Restore Order Modal -->
<!-- END Order Modals -->

<!-- Product Modals-->
<!-- Add Product Modal -->
<div class="modal fade" id="modal-add-product" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slideup" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Add New Product</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
            <form id="add-product-form">
                <div class="block-content">
                    <!-- Error Alert Message -->
                        <div id="add-error-msg"> </div>
                    <!-- End of Error Alert Message -->
                    <input type="hidden" name="product_id" id="product_id"> <!-- Hidden Product ID -->
                <div class="form-group">
                    <div class="form-group">
                        <label for="product-name">Product Name</label>
                        <input type="text" class="form-control form-control-m" id="product_name" name="product_name" placeholder="Enter the product name.." value="">
                    </div>
                    <div class="form-group">
                        <label for="product-description">Description</label>
                        <textarea class="form-control" id="product_description" name="product_description" rows="4" placeholder="Enter the product description.."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product-type">Type</label>
                        <select class="form-control form-control-m" id="product_type" name="product_type" required>
                            <option value="">Select a product type</option>
                            <option value="domain">Domain</option>
                            <option value="hosting">Hosting Package</option>
                            <option value="ssl_certificate">SSL Certificate</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product-price">Price</label>
                        <input type="text" class="form-control form-control-m" id="product_price" name="product_price" placeholder="Enter the price in KES" value="">
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-alt-success" id="btn-add-product">Add Product</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- END Add Product Modal -->

<!-- Edit Product Modal -->
<div class="modal fade" id="modal-edit-product" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slideup" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Edit Product</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <!-- Error Alert Message -->
                    <div id="update-error-msg"> </div>
                    <!-- End of Error Alert Message -->
                <form id="update-product-form" method="post">
                    @method('put')
                    <input type="hidden" name="product_id">
                    <div class="form-group">
                        <label for="product-name">Product Name</label>
                        <input type="text" class="form-control form-control-m" id="edit-product-name" name="product_name" placeholder="Enter the new product name.." required>
                    </div>
                    <div class="form-group">
                        <label for="product-description">Description</label>
                        <textarea class="form-control" id="edit-product-description" name="product_description" rows="4" placeholder="Enter the new product description.." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product-type">Type</label>
                        <select class="form-control form-control-m" id="edit-product-type" name="product_type" required>
                            <option value="">Select a product type</option>
                            <option value="domain">Domain</option>
                            <option value="hosting">Hosting Package</option>
                            <option value="ssl_certificate">SSL Certificate</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product-price">Price</label>
                        <input type="text" class="form-control form-control-m" id="edit-product-price" name="price"  placeholder="Enter the new product price.." required>
                    </div>
                </form>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-alt-primary" id="btn-update-product">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- END Edit Product Modal -->

<!-- Confirm Suspend Product Modal -->
<div class="modal fade" id="modal-suspend-product" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Suspend Product</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <!-- Error Alert Message -->
                    <div id="suspend-error-msg"> </div>
                    <!-- End of Error Alert Message -->
                    <form id="suspend-product-form" method="post">
                        @method('put')
                        <input type="hidden" name="product_id">
                        <div class="form-group">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material form-material">
                                        <input type="text" class="form-control form-control-sm" id="suspend-product-name" name="material-input-size-sm" disabled>
                                        <label for="material-input-size-sm">Product Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="font-w600"> Are you sure you want to suspend this product? </div>
                        </div>
                        <div class="alert alert-info" role="alert">
                            <i class="fa fa-info" aria-hidden="true"></i>
                            &ensp;This product will be hidden from your users but it will still be available in the database.
                        </div>
                    </form>
                </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-dark" id="btn-suspend-product" >Suspend</button>
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- END Confirm Suspend Product Modal -->

<!-- Confirm Restore Product Modal -->
<div class="modal fade" id="modal-restore-product" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Restore Product</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                <div class="form-group">
                    <div class="font-w600"> Are you sure you want to restore this product? </div>
                    <br/>
                    <div class="alert alert-info" role="alert">
                        <i class="fa fa-info" aria-hidden="true"></i>
                        &nbsp;This product will now be available to your users.
                     </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-alt-dark" data-dismiss="modal">Restore</button>
            </div>
        </div>
    </div>
</div>
<!-- END Confirm Restore Product Modal -->
<!-- END Product Modals -->

