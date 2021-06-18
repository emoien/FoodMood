@extends('adminlte::page')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="text: solid !important" class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Welcome to FoodMood portal.</p>
                    @if(auth()->user()->role==0)
                    <p>To start ordering go to:
                        <a href="{{route('welcome')}}">Homepage</a></p>
                   
                    @elseif(auth()->user()->role==3)
                    <p>You can view your orders and manage menu from this portal.<br><br>
                        Contact staff members or email us for help.
                        </p>
                    @else
                   
                    <p>This is backend of the website. You can manage users, products, categories, enquiries and chef requests.</p>
                    
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

