@extends('frontend.layout')

@section('css')
    <style>

        .image-size {
            height: 220px;
            width: 390px;
        }

        

        .top-20 {
            padding-top: 20px; 
        }

       

    </style>

@endsection

@section('content')

    <section class="product_list top-20">
        <div class="container">
            <div class="row">
                <div class="product_list">
                    <div class="row">
                        @foreach($productList->products as $product)
                        <div class="col-xl-4 col-lg-6">
                        <div class="single-category mb-30">
                            <div class="category-img">
                                <a href="{{route('single.product',[$product])}}">
                                    <img src="{{asset($product->getCover())}}" alt="{{$product->name}}"
                                         class="image-size">
                                </a>
                                <a href="{{route('single.product',[$product])}}">
                                    <h1 style="text-align: center">{{$product->name}}</h1>


                                </a>

                                <p style="margin-top: -10px !important;"> $ {{$product->price}}</p>

                            </div>
                        </div>
                    </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
