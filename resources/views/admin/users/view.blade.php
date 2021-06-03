@extends('adminlte::page')

@section('title', 'User view')

@section('content_header')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{'User View'}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
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
                    <h3 class="card-title">{{$user->username()}}</h3>
                </div>
                <div class="card-body">
                    <h3></h3>
                    <hr>
                    <table class="table table-responsive table-striped">
                        <tr>
                            <td>Username</td>
                            <td>{{$user->slug}}</td>
                        </tr>



                        <tr>
                            <td>Status</td>
                            <td>{{$user->status()}}</td>
                        </tr>

                        <tr>
                            <td>Role</td>
                            <td>{{$user->userRole()}}</td>
                        </tr>

                        <tr>
                            <td>Image</td>
                            <td><img style=' height: 100px ; width: 100px' src="{{asset($user->getImage())}}" alt=""></td>
                        </tr>


                    </table>
                    <hr>
                    <br>
                    <div class="card-footer clearfix" style="">
                        <a href="{{route('users.edit',[$user])}}"
                           class="btn btn-info  pull-left">
                            {{__('Edit')}}</a>

                        <a href="{{route('users.index')}}"
                           class="btn  btn-default pull-right">{{__('Back')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
