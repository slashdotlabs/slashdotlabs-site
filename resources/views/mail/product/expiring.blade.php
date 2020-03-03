@component('mail::message')
# Dear {{ $customer->full_name }},

The following products are about to expire, you should renew them.

@component('mail::table')
| Product       | Expiry in        |
| ------------- |:-------------:|
@foreach($expiring_items as $item)
| {{ $item->product->product_name ?? $item->product->domain_name }} | {{ $item->datediff }} days |
@endforeach
@endcomponent

@component('mail::button', ['url' => "{{ $renew_url }}" ])
Renew Products
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
