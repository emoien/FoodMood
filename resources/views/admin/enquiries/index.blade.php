@extends('adminlte::page')

@section('title','Enquiries')


@section('content')
   @include('admin.sharedViews.alertMessage')
<div class="card">
        <div class="card-header card-primary">
            <div class="row">
                <div class="col-sm-11 card-title">
                    <h5 class="m-0 text-dark">Enquiries</h5>
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
  @foreach($enquiries as $key => $enquiry)
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$enquiry->name}} </td>
      <td>{{$enquiry->email}} </td>
      <td>{{$enquiry->phone}} </td>
      <td>{{$enquiry->readBy()}} </td>
      <td> 
            <a href="{{route('enquiries.view',[$enquiry])}}"
               class="btn btn-sm btn-info mb-1"><i class="fa fa-eye"></i></a>
        
      </td>
      
    </tr>
    @endforeach

  </tbody>
</table>
{{$enquiries->links()}}
        </div>
    </div>

@endsection

