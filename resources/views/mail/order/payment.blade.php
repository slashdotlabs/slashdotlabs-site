@component('mail::message')
# Payment on order confirmed


A customer on {{ config('app.name') }} has made an order and made payment.

## Client Information:
@component('mail::table')
| Bio    |  Organization    |
| :---- | :-----|
{{ $payment->customer->full_name }} | {{ $payment->customer->customer_biodata->organization }},
{{ $payment->customer->email }} | {{ $payment->customer->customer_biodata->address }}, {{ $payment->customer->customer_biodata->city }}
{{ $payment->customer->customer_biodata->phone_number }}|  {{ $payment->customer->customer_biodata->country }}
@endcomponent

## Order Summary

Order No. : <strong>{{ $payment->order->order_id }}</strong>

@component('mail::table')
| Name          | Type          | Expiry Date  | Price ({{ $payment->order->currency }}) |
| :-----------: |:-------------:| :-----:| -----:|
@foreach($payment->order->order_items as $order_item)
| {{ get_product_name($order_item) }}      | {{ Str::title(get_product_type($order_item)) }} | {{ $order_item->expiry_date }} | {{ $order_item->price }} |
@endforeach
|               |           |  TOTAL |  {{ $payment->order->total_amount }} |
@endcomponent


## Payment Summary

@component('mail::table')
| Channel       | Reference         | Amount Paid  |
| :-------------: |:-------------:| --------:|
| {{ $payment->payment_type }}      | {{ $payment->payment_ref }}      | {{ $payment->amount }}     |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
