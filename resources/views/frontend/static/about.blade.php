@extends ('frontend.layout')
@section('content')
@section('css')
<style >
    .image-size
    {
        height: 850px;
            width: 100%;
    }

    @media(max-width: 700px){
        .image-size
    {
        height: 500px;
    }
    }
</style>
@endsection
<section class="container">
	
    <h2 style="text-align: center; padding-bottom: 50px; color: black;">About Us:</h2>

    <div class="container">
    <article class="row single-post no-gutters">
        <div class="col-md-12">

            <div class="image-wrapper float-left pr-3">
                <img class="image-size" src="{{asset('frontend/image/e-poster.JPG')}}" alt="">
            </div>
            <p>FoodMOOD, an online platform connecting the foodies with the home-based chefs who cook delicious and healthy home cuisine and deliver it to them via our own delivery service. FoodMOOD aims to provide job opportunities and empower people who are passionate about cooking and generate some revenue using this platform.
       </p>
            <p class="single-post-content-wrapper p-3">
                FoodMOOD is the first company in Australia that promotes home based chefs and delivers their food to the customers. As a pioneer home based chef’s food delivery service provider, we try our best in making peoples life convenient through an online ordering in such a pandemic.
                
            </p>
            <p>From the initial days of starting the project, the main aim of FoodMOOD was very clear and it was to connect the foodies with the healthy cuisines which are made by home based chefs. As we all know, food delivery is very popular among all of us and at some point of time we all think if it is really healthy as we would cook at home. There might be many things that customers might not know about how fast food industry works and how unhealthy their burger or fries might be. However, with FoodMOOD we aim to provide our customers with highly nutritious food items which obviously will be cooked in small batches as someone would cook at home. 
            </p>
            <p> Our home based Chef are always ready to serve you with their best dishes.</p>

            <p>To make an Order : Register with us and you will never regret the
                food that will make you feel home.
            </p>

        </div>
    </article>
</div>
    
    
	<br>
    
	<div class="row justify-content-center" style="padding-top: 100px;">

                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="{{asset('frontend/image/feature_icon_1.svg')}}" alt="#">
                        <h4>Credit Card Support</h4>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="{{asset('frontend/image/feature_icon_2.svg')}}" alt="#">
                        <h4>Online Order</h4>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="{{asset('frontend/image/feature_icon_3.svg')}}" alt="#">
                        <h4>Free Delivery</h4>
                    </div>
                </div>
            </div>
</section>
@endsection
