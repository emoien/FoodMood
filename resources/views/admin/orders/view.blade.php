@extends('adminlte::page')

@section('title', 'Order view')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{'Order View'}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('orders')}}">Order</a></li>
                    <li class="breadcrumb-item">Details</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-blue">
                    <h3 class="card-title">Order ID: {{$order->id}}</h3>
                </div>
                <div class="card-body">
                    <h3></h3>
                    <hr>
                    <table class="table table-responsive table-striped">
                        <tr>
                            <td>Order By:</td>
                            <td>{{$order->user->username()}}</td>
                        </tr>

                        <tr>
                            <td>Delivery Date:</td>
                            <td>{{$order->delivery_date}}</td>
                        </tr>

                        <tr>
                            <td>Status:</td>
                            <td>{{$order->status() }}</td>
                        </tr>

                        <tr>
                            <td>Total:</td>
                            <td>{{$order->billing_total}}</td>
                        </tr>

                        <tr>
                            <td>Address Line 1:</td>

                            <td>{{$order->billing_address1}}</td>

                        </tr>
                        @if($order->billing_address2)
                        <tr>
                            <td>Address Line 2:</td>

                            <td>{{$order->billing_address2}}</td>

                        </tr>
                        @endif

                        <tr>
                            <td>City:</td>

                            <td>{{$order->billing_city}}</td>

                        </tr>

                        <tr>
                            <td>Postcode:</td>

                            <td>{{$order->billing_postcode}}</td>

                        </tr>

                        <tr>
                            <td>quantity:</td>

                            <td>{{$order->quantity}}</td>

                        </tr>
                        @if($order->note)
                        <tr>
                            <td>Note:</td>

                            <td>{{$order->note}}</td>

                        </tr>
                        @endif

                           @if($order->products->count())
                            <td>{{$order->products->count() == 1 ? 'Product Ordered :' : 'Products Ordered :'}}</td>
                            @foreach($order->products as $order)
                                <tr>
                                    <td>
                                        <span>{{'Name : '}}{{$order->name}}</span>
                                    </td>
                                    
                                    <td>
                                        <span>{{'Price : '}}{{$order->price}}</span>
                                    </td>
                                    <td>
                                        <span>{{'Quantity : '}}{{$order->pivot->quantity}}</span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                

                    </table>
                    <hr>
                    <br>
                    <div class="card-footer clearfix" style="">
                        <a href="{{route('orders')}}"
                           class="btn  btn-default pull-right">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
