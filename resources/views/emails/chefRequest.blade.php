@component('mail::message')
New Chef Request Recieved:

Name : {{$chefRequest->name}} <br>
Message : {{$chefRequest->message}} <br>
Phone : {{$chefRequest->phone}} <br>
Email : {{$chefRequest->email}} <br>



Thanks,<br>
{{ config('app.name') }}
@endcomponent
