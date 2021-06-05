@extends('frontend.layout')
@section('title', 'Thank You')

@section('content')
    

    <section class="container" style="height: 60vh">
        <div class="row mt-5" >
           
            <h1 class="text-center w-100 text-secondary mt-3 f-family-2">
                Thank You
            <div class="w-100 text-center ">
                <a href="/" class="btn btn-outline-dark rounded-pill ">Continue Shopping</a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // redirect to home after seconds
        window.setTimeout(function() {
            window.location.href = '{{route('welcome')}}';
        }, 10000);
    </script>
@endpush
