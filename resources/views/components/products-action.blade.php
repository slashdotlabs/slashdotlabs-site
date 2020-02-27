<button type="button" class="btn btn-sm btn-outline-primary edit-product" data-id="{{ $product->id }}">
    Edit
</button>
@if($product->suspended)
    <button type="button" class="btn btn-sm btn-outline-dark restore-product" data-id="{{ $product->id }}">
        Restore
    </button>
@else
    <button type="button" class="btn btn-sm btn-outline-dark suspend-product" data-id="{{ $product->id }}">
        Suspend
    </button>
@endif
