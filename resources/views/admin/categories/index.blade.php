@extends('adminlte::page')

@section('title','Categories')


@section('content')
@include('admin.sharedViews.alertMessage')
    <div class="card">
        <div class="card-header card-primary">
            <div class="row">
                <div class="col-sm-11 card-title">
                    <h5 class="m-0 text-dark">Categories</h5>
                </div>
                <div class="col-sm-1 float-sm-right">
                        <a href="{{route('categories.create')}}">
                            <button class="btn btn-md btn-primary">Create</button>
                        </a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->name}} </td>
      <td>{{$category->status()}}</td>
      
      <td> 
            <a href="{{route('categories.edit',[$category])}}"
               class="btn btn-sm btn-info mb-1"><i class="fa fa-pen"></i></a>
             <a href="{{route('categories.show',[$category])}}"
                class="btn btn-sm btn-primary mb-1"><i class="fa fa-eye"></i></a>
                <form action="{{route('categories.destroy',[$category])}}" method="POST">
                @csrf
                @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger delete mb-1"><i class="fa fa-trash"></i></button>
                </form>


      </td>
      
    </tr>
    @endforeach
   

  </tbody>
  
</table>
{{$categories->links()}}
        </div>
    </div>

@endsection

