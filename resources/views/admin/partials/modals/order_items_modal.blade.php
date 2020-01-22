<!-- Edit Modal -->
<div class="modal fade" id="order-details-modal" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">ORDER: # <span id="order-id"></span></h3>
                </div>
                <div class="block-content">
                    <table id="tb-order-items" class="table table-bordered table-striped table-vcenter w-100">
                        <thead class="text-center text-uppercase">
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Dismiss</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- END Edit Modal -->
