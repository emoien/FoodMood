@extends('adminlte::page')

@section('title','Chef Enquiry')


@section('content')
   @include('admin.sharedViews.alertMessage')
<div class="card">
        <div class="card-header card-primary">
            <div class="row">
                <div class="col-sm-11 card-title">
                    <h5 class="m-0 text-dark">Chef Requests</h5>
                </div>
                
            </div>
        </div>
        <div class="card-body table-responsive">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Read by</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($chefRegisters as $key => $chefRegister)
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$chefRegister->name}} </td>
      <td>{{$chefRegister->email}} </td>
      <td>{{$chefRegister->phone}} </td>
      <td>{{$chefRegister->readBy()}} </td>
      <td> 
            <a href="{{route('chefRegister.view',[ $chefRegister])}}"
               class="btn btn-sm btn-info mb-1"><i class="fa fa-eye"></i></a>
        
      </td>
      
    </tr>
    @endforeach

  </tbody>
</table>
{{$chefRegisters->links()}}
        </div>
    </div>

@endsection

