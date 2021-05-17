@extends('frontend.layout')

@section('css')
    <style>

        .top-20 {
            padding-top: 30px;
        }

    </style>

@endsection

@section('content')

    <section class="product_list top-20">
        <div class="container">
            <div class="row">
                <div class="product_list">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{$product->getCover()}}" alt="" class="img-fluid">
                                    <h3><a href="{{route('single.product',[$product])}}">{{$product->name}}</a></h3>
                                    <p style="margin-top: -15px !important;"> $ {{$product->price}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
