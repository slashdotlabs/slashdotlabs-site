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
