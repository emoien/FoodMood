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
    <section class="category-area top-20">
        <div class="container-fluid">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center mb-85">
                        <h2>Categories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-xl-3 col-lg-6">
                        <div class="single-category mb-30">
                            <div class="category-img">
                                <a href="{{route('category.products',[$category])}}">
                                    <img src="{{asset($category->getImage())}}" alt="{{$category->name}}"
                                         class="image-size">
                                </a>
                                <a href="{{route('category.products',[$category])}}">
                                    <h1 style="text-align: center">{{$category->name}}</h1>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="category-area top-20">
        <div class="container-fluid">
            <div class="product-btn">
                <!-- Section Tittle -->
                <div class="section-tittle mb-30">
                    <h2 style="text-align:center">Products</h2>
                </div>
            </div>

                <div class="row">
                    @foreach($products as $product)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="single-product mb-60">
                                <div class="product-img">
                                    <a href="{{route('single.product',[$product])}}">
                                    <img src="{{$product->getCover()}}" alt="" class="image-size">
                                </a>
                                </div>
                                <div class="product-caption">
    
                                    <a href="{{route('single.product',[$product])}}" style="color: black !important;"><h1 >{{$product->name}} </h1></a>
                                    <div class="price">
                                        <ul>
                                            <li>${{$product->price}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>

    <section class="category-area top-20">
        <div class="container-fluid">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center mb-85">
                        <h2>Chefs</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($chefs as $chef)
                    <div class="col-xl-3 col-lg-6">
                        <div class="single-category mb-30">
                            <div class="category-img">
                                <a href="{{route('chef.products',[$chef])}}">
                                    <img src="{{asset($chef->getImage())}}" alt="{{$chef->name}}"
                                         class="image-size">
                                </a>
                                <a href="{{route('chef.products',[$chef])}}">
                                    <h1 style="text-align: center">{{$chef->first_name}} {{$chef->last_name}}</h1>

                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
