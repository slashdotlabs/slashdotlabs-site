@component('mail::message')
# Hello!

Thank you for making and order with {{ config('app.name') }}. <br>

Below is a summary of your order: <br>

@component('mail::table')
| Name          | Type          | Expiry Date  | Price ({{ $order->currency }}) |
| :-----------: |:-------------:| :-----:| -----:|
@foreach($order->order_items as $order_item)
| {{ get_product_name($order_item) }}      | {{ Str::title(get_product_type($order_item)) }} | {{ $order_item->expiry_date }} | {{ $order_item->price }} |
@endforeach
|               |           |  TOTAL |  {{ $order->total_amount }} |
@endcomponent



<div style="margin-top: 1rem; margin-bottom: 1rem;">
    Thanks,<br>
    {{ config('app.name') }}
</div>

<small>If you have any questions about this order you can contact Slash Dot Labs Ltd. on 01905 745339 or via email: info@slashdotlabs.com.</small>
@endcomponent
