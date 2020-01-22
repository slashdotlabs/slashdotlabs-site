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
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-alt-dark" id="btn-suspend-product" >Suspend</button>
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- END Confirm Suspend Product Modal -->


