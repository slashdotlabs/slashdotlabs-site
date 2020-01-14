<!-- Order Modals -->

<!-- Confirm Delete Order Modal -->
<div class="modal fade" id="modal-delete-order" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Delete Order</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                <div class="form-group">
                    <div class="font-w600"> Are you sure you want to delete this order? </div>
                    <br/>
                    <div class="alert alert-warning" role="alert">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            Note: This action cannot be undone.
                     </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-danger" data-dismiss="modal">Delete</button>
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- END Confirm Delete Order Modal -->

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
                <div class="block-content">
                <div class="form-group">
                    <div class="form-group">
                        <label for="product-name">Product Name</label>
                        <input type="text" class="form-control form-control-m" id="product-name" name="product-name" placeholder="Enter the product name.." value="">
                    </div>
                    <div class="form-group">
                        <label for="product-description">Description</label>
                        <textarea class="form-control" id="product-description" name="product-description" rows="4" placeholder="Enter the product description.."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product-type">Type</label>
                        <select class="form-control form-control-m" id="product-type" name="product-type">
                            <option value="0">Select a product type</option>
                            <option value="1">Domain</option>
                            <option value="2">Hosting Package</option>
                            <option value="3">SSL Certificates</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product-price">Price</label>
                        <input type="text" class="form-control form-control-m" id="product-price" name="product-price" placeholder="Enter the price in KES" value="">
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-alt-success" data-dismiss="modal">Add Product</button>
            </div>
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
                <div class="form-group">
                    <div class="form-group">
                        <label for="product-name">Product Name</label>
                        <input type="text" class="form-control form-control-m" id="edit-product-name" name="product-name" placeholder="Enter the new product name.." value=".com Domain">
                    </div>
                    <div class="form-group">
                        <label for="product-description">Description</label>
                        <textarea class="form-control" id="product-description" name="edit-product-description" rows="4" placeholder="Enter the new product description..">Domain name with .com extension.</textarea>
                    </div>
                    <div class="form-group">
                        <label for="product-type">Type</label>
                        <select class="form-control form-control-m" id="product-type" name="edit-product-type">
                            <option value="0">Select a product type</option>
                            <option value="1">Domain</option>
                            <option value="2">Hosting Package</option>
                            <option value="3">SSL Certificates</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product-price">Price</label>
                        <input type="text" class="form-control form-control-m" id="edit-product-price" name="edit-product-price"  placeholder="Enter the new product price.." value="7500">
                    </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-alt-primary" data-dismiss="modal">Update</button>
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
                    <div class="form-group">
                        <div class="font-w600"> Are you sure you want to suspend this product? </div>
                        <br/>
                        <div class="alert alert-info" role="alert">
                            <i class="fa fa-info" aria-hidden="true"></i>
                            &ensp;This product will be hidden from your users but it will still be available in the database.
                         </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-alt-dark" data-dismiss="modal" data-toggle="modal" data-target="#modal-unsuspend-product" >Suspend</button>
            </div>
        </div>
    </div>
</div>
<!-- END Confirm Suspend Product Modal -->

<!-- Confirm Unsuspend Product Modal -->
<div class="modal fade" id="modal-unsuspend-product" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Unsuspend Product</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                <div class="form-group">
                    <div class="font-w600"> Are you sure you want to unsuspend this product? </div>
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
                    <button type="button" class="btn btn-alt-dark" data-dismiss="modal">Unsuspend</button>
            </div>
        </div>
    </div>
</div>
<!-- END Confirm Suspend Product Modal -->

<!-- Confirm Delete Product Modal -->
<div class="modal fade" id="modal-delete-product" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Delete Product</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                <div class="form-group">
                    <div class="font-w600"> Are you sure you want to delete this product? </div>
                    <br/>
                    <div class="alert alert-warning" role="alert">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            &ensp;Note: This action cannot be undone.
                     </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-danger" data-dismiss="modal">Delete</button>
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- END Confirm Delete Product Modal -->

<!-- END Product Modals -->
