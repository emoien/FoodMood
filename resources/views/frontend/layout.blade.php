<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('Images/logo.png')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/flaticon.cs')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">


    @yield('css')

    <style>
      @if(count(cart()->items()) > 0)
    .header-bottom .header-right .shopping-card::before{
        content: "{{count(cart()->items())}}" !important;
    }
    @else
    .header-bottom .header-right .shopping-card::before{
        content: " " !important;
    }
    @endif
    
    </style>
    
  
</head>

<body>


@include('frontend.partials.header')
<main>
      @if (session()->has('message'))
      <div class="alert alert-primary">
              {{ session('message') }}
      </div>
    @endif
    @yield('content')
</main>
@include('frontend.partials.footer')

<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="{{asset('frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{asset('frontend/js/jquery.slicknav.min.js')}}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>

<!-- One Page, Animated-HeadLin -->
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/animated.headline.js')}}"></script>
<script src="{{asset('frontend/js/jquery.magnific-popup.js')}}"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.sticky.js')}}"></script>

<!-- contact js -->
<script src="{{asset('frontend/js/contact.js')}}"></script>
<script src="{{asset('frontend/js/jquery.form.js')}}"></script>
<script src="{{asset('frontend/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('frontend/js/mail-script.js')}}"></script>
<script src="{{asset('frontend/js/jquery.ajaxchimp.min.js')}}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{asset('frontend/js/plugins.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
@stack('scripts')

  <script>
        $(function () {
            setTimeout(function () {
                $('.alert').fadeOut('slow');
            }, 8000)
        })
    </script>

</body>
</html>
