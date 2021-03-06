@extends('frontend.layout')

@section('css')
<style>
        .product_image_area {
        margin-top: 50px !important;

}


        .image-size {
            height: 300px;
            width: 390px;
        }

        .margin-left {
            margin-left: 210px;
        }

        .owl-carousel .owl-item img {
    
            width: 60% !important;
        }
</style>
@endsection

@section('content')
    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="product_img_slide owl-carousel">
                        @foreach($product->images as $image)
                            <div class="single_product_img">
                                <img src="{{asset($image->path())}}" alt="#" class="img-fluid image-size margin-left" >
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="single_product_text text-center">
                        <h3>{{$product->name}}</h3> <br>
                        <h4>Chef: <a href="{{route('chef.products',[$product->user])}}" style="color:black !important">{{$product->user->username()}}</a></h4>

                        <p>
                            {{$product->description}}
                        </p>

                        @if($product->status == 2)
                         <p style="color:red;">
                            This is available for catering only.
                        </p>
                        @endif

                        <form action="{{route('cart')}}" method="post">
                        @csrf 
                        <div class="card_area">
                            <div class="product_count_area">
                                <p>Quantity</p>
                                <div class="product_count d-inline-block">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input class="product_count_item input-number" type="text" value="1" min="0"
                                           name="product_quantity">
                                    <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                </div>
                                <p>$ {{$product->price}}</p>
                            </div>
                            <div class="add_to_cart">
                                <button class="btn_3">add to cart</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
