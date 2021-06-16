@extends('adminlte::page')
@section('content')
<div class="card">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Welcome to FoodMood portal.</h3>
                    @if(auth()->user()->role==0)
                    <h4>To start ordering go to:
                        <a href="{{route('welcome')}}">Homepage</a></h4>
                    @endif
                    @if(auth()->user()->role==3)
                    <h4>You can view your orders and manage menu from this portal.<br><br>
                        Contact staff members or email us for help.
                        </h4>
                    @endif
                    
                    <h4>This is backend of the website. You can manage users, products, categories, enquiries and chef requests.</h4>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

