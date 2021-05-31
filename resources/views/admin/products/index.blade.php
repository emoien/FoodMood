@extends('adminlte::page')

@section('title','Products')


@section('content')
   @include('admin.sharedViews.alertMessage')
<div class="card">
        <div class="card-header card-primary">
            <div class="row">
                <div class="col-sm-11 card-title">
                    <h5 class="m-0 text-dark">Products</h5>
                </div>
                <div class="col-sm-1 float-sm-right">
                        <a href="{{route('products.create')}}">
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
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($products as $key => $product)
    <tr>
      <th scope="row">{{$key + 1}}</th>
      <td>{{$product->name}} </td>
      <td>{{$product->description}} </td>
      <td>{{$product->price}} </td>
      <td>{{$product->status()}}</td>
      <td> 
            <a href="{{route('products.edit',[$product])}}"
               class="btn btn-sm btn-info mb-1"><i class="fa fa-pen"></i></a>
             <a href="{{route('products.show',[$product])}}"
                class="btn btn-sm btn-primary mb-1"><i class="fa fa-eye"></i></a>
                @if(auth()->user()->isAdminOrStaff())
                <form action="{{route('products.destroy',[$product])}}" method="POST">
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
{{$products->links()}}
        </div>
    </div>

@endsection

