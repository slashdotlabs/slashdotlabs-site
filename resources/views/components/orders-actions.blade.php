<div class="btn-group" role="group">
    <button type="button" class="btn btn-sm btn-alt-info show-order-items">
        Order Items
    </button>
    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="dropdown">
        <i class="si si-arrow-down"></i>
    </button>
    <div class="dropdown-menu">
        @if($paid)
            <a class="dropdown-item" href="javascript:void(0)"> No Actions </a>
        @else
            <a class="dropdown-item btn-add-payment" href="javascript:void(0)"> Add payment </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item btn-cancel-order" href="javascript:void(0)"> Cancel Order </a>
        @endif
    </div>
</div>
