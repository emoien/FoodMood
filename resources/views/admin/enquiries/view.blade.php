@extends('adminlte::page')

@section('title', 'Enquiry view')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{'Enquiry View'}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('enquiries')}}">Enquiries</a></li>
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
                    <h3 class="card-title">{{$enquiry->name}}</h3>
                </div>
                <div class="card-body">
                    <h3></h3>
                    <hr>
                    <table class="table table-responsive table-striped">
                        <tr>
                            <td>Name</td>
                            <td>{{$enquiry->name}}</td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td>{{$enquiry->email}}</td>
                        </tr>

                        <tr>
                            <td>Phone</td>
                            <td>{{$enquiry->phone }}</td>
                        </tr>

                        <tr>
                            <td>Message</td>
                            <td>{{$enquiry->message}}</td>
                        </tr>

                        <tr>
                            <td>Read By</td>

                            <td>{{$enquiry->readBy()}}</td>

                        </tr>

                

                    </table>
                    <hr>
                    <br>
                    <div class="card-footer clearfix" style="">
                        <a href="{{route('enquiries')}}"
                           class="btn  btn-default pull-right">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
