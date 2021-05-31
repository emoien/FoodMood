@extends('adminlte::page')

@section('title','Users')


@section('content')
@include('admin.sharedViews.alertMessage')
    <div class="card">
        <div class="card-header card-primary">
            <div class="row">
                <div class="col-sm-11 card-title">
                    <h5 class="m-0 text-dark">Users</h5>
                </div>
                @if(auth()->user()->isAdminOrStaff())
                <div class="col-sm-1 float-sm-right">

                        <a href="{{route('users.create')}}">
                            <button class="btn btn-md btn-primary">Create</button>
                        </a>
                </div>
                @endif
            </div>
        </div>
        <div class="card-body table-responsive">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $key => $user)
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$user->first_name}} {{$user->last_name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->userRole()}}</td>
      <td>{{$user->status()}}</td>
      <td> 
            <a href="{{route('users.edit',[$user])}}"
               class="btn btn-sm btn-info mb-1"><i class="fa fa-pen"></i>
               
            </a>
               
               
              <a href="{{route('users.show',[$user])}}"
              class="btn btn-sm btn-primary mb-1"><i class="fa fa-eye"></i>
              </a>
              
                @if(auth()->user()->isAdmin())
                <form action="{{route('users.destroy',[$user])}}" method="POST">
                 @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger delete mb-1"><i class="fa fa-trash"></i></button>
                </form>
                @endif


      </td>
    </tr>
    @endforeach

    

  </tbody>
</table>
        </div>
    </div>

@endsection

