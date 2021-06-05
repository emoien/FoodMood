@component('mail::message')

You have received email from <br>

Name : {{$enquiry->name}} <br>
Email : {{$enquiry->email}} <br>
Message : {{$enquiry->message}} <br>
Phone : {{$enquiry->phone}} <br>

@endcomponent
