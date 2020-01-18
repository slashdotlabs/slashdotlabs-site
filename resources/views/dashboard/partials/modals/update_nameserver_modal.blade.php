<!-- Edit Modal -->
<div class="modal fade" id="update-nameservers-modal" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="nameserver-form-block" class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Update Name Servers</h3>
                    <div class="block-options">
                        <button class="btn btn-alt-success add-nameserver-row">
                            <i class="si si-plus"></i> Add Row
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form id="update-nameservers-form" action="{{ route('nameservers.store')  }}" method="post">
                        <input type="hidden" name="domain_id">
                        <div class="empty-nameservers d-none">
                            <p class="text-center font-size-md">Why don't you add one now :)</p>
                        </div>
                        <div id="nameserver-fields-wrapper" class="d-flex flex-column">
                            {{-- Dynamically added in js --}}
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-alt-primary" id="btn-update-nameservers">Update</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- END Edit Modal -->
