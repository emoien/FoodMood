@component('mail::message')
Thank you for Ordering from {{ config('app.name') }}.<br>

Order Id : {{$order->id}} <br>
Price : {{$order->billing_total}} <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
