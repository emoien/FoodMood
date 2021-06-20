<footer>

    <!-- Footer Start-->
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>FoodMOOD, an online platform connecting the foodies with the home-based chefs.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Quick Links</h4>
                            <ul>
                                <li><a href="{{route('about')}}">About</a></li>
                               <li><a href="{{route('contact')}}">  Contact Us</a></li>
                               <li><a href="{{route('covid')}}">Response To Covid-19</a></li>

                               @guest
                               <li><a href="{{route('upgrade')}}">Become Chef?</a></li>
                               @endif
                               @if(auth()->user() && auth()->user()->role==0)
                               <li><a href="{{route('upgrade')}}">Become Chef?</a></li>
                              @endif
                              
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Support</h4>
                            <ul>
                                <li><a href="{{route('faq')}}">Frequently Asked Questions</a></li>
                                <li><a href="{{route('tnc')}}">Terms & Conditions</a></li>
                                <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer bottom -->
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-7">
                    <div class="footer-copy-right">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="{{route('welcome')}}" >FoodMood</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>                   </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5">
                    <div class="footer-copy-right f-right">
                        <!-- social -->
                        <div class="footer-social">
                            <a href="https://www.instagram.com/FoodMOOD.n"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.facebook.com/profile.php?id=100069619604759"><i class="fab fa-facebook-f"></i></a>
                            <a href="mailto:foodmoodstore@gmail.com"><i class="fab fa-google"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->

</footer>
