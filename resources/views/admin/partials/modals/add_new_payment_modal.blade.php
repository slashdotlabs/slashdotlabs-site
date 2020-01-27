
<!-- Add new payment modal -->
<div class="modal fade" id="order-payment-modal" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0" id="add-payment-block">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">ORDER: # <span class="text-info" id="order-id"></span></h3>
                </div>
                <div class="block-content">
                    <form method="post" id="order-payment-form">
                        @csrf
                        <input type="hidden" name="order_id">
                        <input type="hidden" name="manual_payment" value="1">
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="payment_type">Payment Type</label>
                                <select name="payment_type" id="payment_type" class="form-control" required>
                                    <option value="">--Select payment type--</option>
                                    @foreach($payment_types as $payment_type)
                                        <option value="{{ $payment_type }}">{{ $payment_type }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="payment_ref">Reference</label>
                                <input type="text" name="payment_ref" id="payment_ref" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="amount">Amount (KES)</label>
                                <input type="number" min="1" name="amount" id="amount" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12 d-flex align-items-end justify-content-md-start justify-content-sm-end">
                                <button type="submit" class="btn btn-alt-primary">Add Payment</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Dismiss</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Add new payment modal -->
