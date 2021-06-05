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
                                <a href="{{route('welcome')}}"><img src="{{asset('images/logo.png')}}" style="height:50px; width:50px;" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{route('welcome')}}">Home</a></li>
                                        <li><a href="{{route('list.category')}}">Catagories</a></li>
                                        <li><a href="{{route('list.product')}}">Products</a></li>
                                        <li><a href="{{route('catering.products')}}">Catering</a></li>
                                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                                        <li><a href="{{route('faq')}}">FAQ</a></li>
                                        
                                       

                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                            <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                
                                <li>
                                    <div class="shopping-card">
                                        <a href="{{route('cart.view')}}"><i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                </li>
                                @guest
                                @if(Request::segment(1) != 'checkout')
                                <li class="d-none d-lg-block"> <a href="{{route('login')}}" class="btn header-btn">Sign in</a></li>
                                <li class="d-none d-lg-block"> <a href="{{route('register')}}" class="btn header-btn">Register</a></li>
                                @endif
                                @else
                                <li class="d-none d-lg-block"> <a href="{{route('dashboard')}}" class="btn header-btn">Dashboard</a></li>

                                @endguest
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
