<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                            <div class="logo">
                                <a href="{{route('welcome')}}"><img src="{{asset('Images/logo.png')}}" style="height:50px; width:50px;" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-9 col-md-7 col-sm-5">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{route('welcome')}}">Home</a></li>
                                        <li><a href="{{route('list.category')}}">Categories</a></li>
                                        <li><a href="{{route('list.product')}}">Products</a></li>
                                        <li><a href="{{route('catering.products')}}">Catering</a></li>
                                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                                        <li><a href="{{route('faq')}}">FAQ</a></li>
                                        
                                        @guest
                                @if(Request::segment(1) != 'checkout')
                                <li > <a href="{{route('login')}}" style="font-size: 18px; color: blue; font-weight: 600;" >Sign in</a></li>
                                <li > <a href="{{route('register')}}" style="font-size: 18px; color: blue; font-weight: 600;" >Register</a></li>
                                @endif
                                @else
                                <li > <a href="{{route('dashboard')}}" style="font-size: 18px; color: blue; font-weight: 600;">Dashboard</a></li>

                                @endguest

                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-2 col-md-2 col-sm-2 fix-card">
                            <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                
                                <li>
                                    <div class="shopping-card">
                                        <a href="{{route('cart.view')}}"><i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                </li>
                               
                            </ul>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
