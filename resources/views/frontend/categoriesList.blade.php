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
                    <div class="col-xl-4 col-lg-6">
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
@endsection