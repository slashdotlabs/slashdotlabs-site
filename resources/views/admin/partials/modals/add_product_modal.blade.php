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
                @csrf
                <div class="block-content">
                    <!-- Error Alert Message -->
                        <div id="add-error-msg"> </div>
                    <!-- End of Error Alert Message -->
                    <input type="hidden" name="product_id" id="product_id"> <!-- Hidden Product ID -->
                <div class="form-group">
                    <div class="form-group">
                        <label for="product-name">Product Name</label>
                        <input type="text" class="form-control form-control-m" id="product_name" name="product_name" placeholder="Enter the product name.." value ="" required>
                    </div>
                    <div class="form-group">
                        <label for="product-description">Description</label>
                        <textarea class="form-control" id="product_description" name="product_description" rows="4" placeholder="Enter the product description.." required></textarea>
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
                        <input type="text" class="form-control form-control-m" id="product_price" name="product_price" placeholder="Enter the price in KES" value="" required>
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
