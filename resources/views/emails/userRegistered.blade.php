@component('mail::message')
Thank you for Registering.


Email : {{$user->email}} <br>
Password : {{$password}} <br>

Please login to view your orders.

@component('mail::button', ['url' => '/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
